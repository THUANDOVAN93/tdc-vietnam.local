/* フロント一覧系ページで使用 */
/*=============================================================================*
 googleマップ操作JS
*=============================================================================*/
Array.prototype.in_array = function(val) {
	for(var i = 0, l = this.length; i < l; i++) {
		if(this[i] == val) {
			return true;
		}
	}
	return false;
}

$(document).ready(function(){

	// 指定なし時マップ初期表示情報
	var defLatVal        = 21.041568648883146;
	var defLngVal        = 105.83988189697266;

	var defZoomLevel     = 16;

	// 各パラメータid、class
	var mapCanvasId      = '#map_canvas';
	var navCheckboxClass = '.list_map_nav';

	var latVal           = $('#map_lat').val();
	var lngVal           = $('#map_lng').val();
	var zoomVal          = $('#map_zoom').val();
	var xmlUrl           = $('#xml_url').val();

	var iconPath         = $('#icon_path').val();
	var imagePath        = $('#image_path').val();
	var detailUrl        = $('#detail_url').val();

	// マップオブジェクト
	var map              = null;

	// マーカーIDリストおよびマーカーオブジェクトリスト、吹き出しオブジェクト
	var markerData       = [];
	var markerList       = [];
	var markerIdCurList  = [];
	var markerIdPrevList = [];
	var markerInfo       = null;

	// 現在の表示状況保存変数
	var map_center_lat   = null; // 中心のy
	var map_center_lng   = null; // 中心のx
	var map_top_lat      = null; // 上端のy
	var map_bottom_lat   = null; // 下端のy
	var map_right_lng    = null; // 右端のx
	var map_left_lng     = null; // 左端のx
	var map_zoom_level   = defZoomLevel; // ズームレベル

	initialize();

	function initialize () {
		// マップ出力
		map = writeMap();

		google.maps.event.addListener (map, 'idle', function() {
			displayAreaMarkersSet();
		});

		$(navCheckboxClass).click(function() {
			displayAreaMarkersSet();
		});

		// マップを出力する
		function writeMap () {

			//初期表示位置の取得
			if (latVal == '' && lngVal == '') {
				//取得できない場合はデフォルトを使用
				latVal = defLatVal;
				lngVal = defLngVal;
			}
			//初期ズームレベルの取得
			if (zoomVal == '') {
				//取得できない場合はデフォルトを使用
				zoomVal = defZoomLevel;
			}
			zoomVal = parseInt(zoomVal);
			var latlng = new google.maps.LatLng(latVal, lngVal);
			var myOptions = {
				'zoom'              : zoomVal,
				'minZoom'           : 10,
				'maxZoom'           : 19,
				'center'            : latlng,
				'mapTypeId'         : google.maps.MapTypeId.ROADMAP,
				'streetViewControl' : false,
				'mapTypeControl'    : false,
				'overviewMapControl': false,
				'scrollwheel'       : false,
				'scaleControl'      : true
			};
			map = new google.maps.Map($(mapCanvasId).get(0), myOptions);

			return map;
		}

		// マーカーセット処理一式
		function displayAreaMarkersSet() {
			// 表示範囲を取得
			setMapDisplayAreaLatLng();
			// URLを作ってXMLファイルを読み込む
			var xmlUrl = getXmlUrl();
			xmlRead(xmlUrl);
		}

		// 表示領域をセットする
		function setMapDisplayAreaLatLng () {
			//地図の範囲内を取得
			var bounds     = map.getBounds();
			map_top_lat    = bounds.getNorthEast().lat();
			map_bottom_lat = bounds.getSouthWest().lat();
			map_right_lng  = bounds.getNorthEast().lng();
			map_left_lng   = bounds.getSouthWest().lng();
			var center     = map.getCenter();
			map_center_lat = center.lat();
			map_center_lng = center.lng();
			map_zoom_level = map.getZoom();
		}

		// XML取得URL算出
		function getXmlUrl () {
			// マップ表示範囲をまとめる
			var top    = map_top_lat;
			var bottom = map_bottom_lat;
			var left   = map_left_lng;
			var right  = map_right_lng;
			if ((map_top_lat - map_bottom_lat) > 0.02) {
				// 縦幅を前後0.01
				top    = map_center_lat + 0.01;
				bottom = map_center_lat - 0.01;
			}
			if ((map_right_lng - map_left_lng) > 0.04) {
				// 横幅を前後0.02
				left  = map_center_lng - 0.02;
				right = map_center_lng + 0.02;
			}
			// カテゴリチェックをまとめる
			var checkList = [];
			$(navCheckboxClass + ':checked').each(function() {
				var checkVal = $(this).val();
				checkList.push(checkVal);
			});
			var checkStr = checkList.join(',');
			if (checkStr == '') {
				checkStr = '0';
			}
			// パラメータ整理
			var geoParams = '' + bottom + '/' + top + '/' + left + '/' + right + '/';
			var catParams = '' + checkStr + '/';
			// URL作成
			var retUrl = xmlUrl + geoParams + catParams;
			return retUrl;
		}

		// URLからXMLを取得する
		function xmlRead (url) {
			//XMLファイル読み込み開始
			$.ajax({
				'url'      : url,
				'cache'    : false,
				'dataType' : 'xml',
				'success'  : function(xml) {
					// XMLを配列に落とす
					markerData = xmlToArray(xml);
					// 配列をもとにマーカーをセットする
					markerSetting();
				}
			});
		}

		// XMLファイル読み込みマーカーへデータ格納
		function xmlToArray (xml) {
			var data=[];
			// XMLの内容を配列にまとめる
			$(xml).find('markers marker').each(function(){
				var dat     = {};
				dat.id      = $(this).find('id').text();
				dat.lat     = $(this).find('lat').text();
				dat.lng     = $(this).find('lng').text();
				dat.name    = $(this).find('name').text();
				dat.photo   = $(this).find('photo').text();
				dat.caption = $(this).find('caption').text();
				dat.icon    = $(this).find('icon').text();
				data.push(dat);
			});
			return data;
		}

		// 配列からマーカーをセットする
		function markerSetting () {
			markerIdPrevList = null;
			markerIdPrevList = markerIdCurList.slice(0);
			markerIdCurList = [];
			var markerId = '';
			for (i = 0; i < markerData.length; i++) {
				var markerObj = markerData[i];
				// マーカーIDを作成
				markerId = 'm_lat' + markerObj.lat + '_lng' + markerObj.lng;
				// 既にマーカーがあるかチェック
				if (!markerList[markerId]) {
					// マーカーセット
					markerList[markerId] = new google.maps.Marker({
						'position': new google.maps.LatLng(markerObj.lat, markerObj.lng),
						'map'     : map,
						'title'   : markerObj.name,
						'icon'    : new google.maps.MarkerImage(
							iconPath + markerObj.icon,
							new google.maps.Size(29,35),
							new google.maps.Point(0,0),
							new google.maps.Point(14,35)
						)
					});
					attachMessage(markerList[markerId], markerObj);
				}
				// マーカーIDリストに追加
				markerIdCurList.push(markerId);
			}
			for (i = 0; i < markerIdPrevList.length; i++) {
				markerId = markerIdPrevList[i];
				if (!markerIdCurList.in_array(markerId)) {
					if (markerList[markerId]) {
						markerList[markerId].setMap(null);
						markerList[markerId] = null;
					}
				}
			}
		}

		function attachMessage(marker, obj) {
			google.maps.event.addListener(marker, 'click', function(event) {
				if (markerInfo) {
					markerInfo.close();
				}
				var content = '';
				var html    = [];
				html[0] = '<a href="' + detailUrl + obj.id + '" target="blank">' + obj.name + '</a>';
				if (obj.photo != '') {
					html[1] = '<br /><a href="' + detailUrl + obj.id + '" target="blank"><img src="' + imagePath + 'tmb_list_' + obj.photo + '"></a>';
				}
				var content = html.join('');
				markerInfo = new google.maps.InfoWindow({
					'content': content
				});
				markerInfo.open(marker.getMap(), marker);
			});
		}

/*
		//初期表示時のピンを立てる

		google.maps.event.addListener(map, 'click', function(arg) {

			$(mapLatClass).val(arg.latLng.lat());
			$(mapLngClass).val(arg.latLng.lng());

			//クリックした場所にピンを立てる
			marker.setMap(null);
			marker = new google.maps.Marker({
				'position': arg.latLng,
				'map'     : map,
				'title'   : ''
			});
		});

		$(setLocationBtn).click(function() {

			var addressVal = $(mapAddressId).val();
			if (addressVal == '') {
				alert('住所を入力してください。');
				return false;
			}

			var geocoder = new google.maps.Geocoder();

			geocoder.geocode({
				'address': addressVal
			}, function(results, status) {

				if (status == google.maps.GeocoderStatus.OK) {

					var location = results[0].geometry.location;
					$(mapLatClass).val(location.lat());
					$(mapLngClass).val(location.lng());

					//住所からピンを立てる
					map.setCenter(location);
					marker.setMap(null);
					marker = new google.maps.Marker({
						'position': location,
						'map'     : map,
						'title'   : ''
					});
				} else {
					alert('「'+addressVal+'」の位置情報が見つかりませんでした。');
				}
			});
			return false;
		});
*/
	}
});
