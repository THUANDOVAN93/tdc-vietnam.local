/* 管理ページで使用 */
/*=============================================================================*
 googleマップ操作JS
*=============================================================================*/
$(document).ready(function(){

	var defLatVal = 21.041568648883146;
	var defLngVal = 105.83988189697266;

	var mapCanvasId      = '#map_canvas';
	var mapLatId         = '#map_lat';
	var mapLngId         = '#map_lng';
	var mapLatClass      = '.map_lat';
	var mapLngClass      = '.map_lng';
	var mapAddressId     = '#map_address';
	var setLocationBtn   = '#set_location_btn';

	initialize();

	function initialize() {

		//初期表示位置の取得
		var latVal = $(mapLatId).val();
		var lngVal = $(mapLngId).val();
		if (latVal == '' && lngVal == '') {
			//取得できない場合は、タイ中心を指定
			latVal = defLatVal;
			lngVal = defLngVal;
			$(mapLatClass).val(latVal);
			$(mapLngClass).val(lngVal);
		}
		var latlng = new google.maps.LatLng(latVal, lngVal);
		var myOptions = {
			'zoom'              : 8,
			'center'            : latlng,
			'mapTypeId'         : google.maps.MapTypeId.ROADMAP,
			'streetViewControl' : false,
			'mapTypeControl'    : false,
			'overviewMapControl': false,
			'scrollwheel'       : false,
			'scaleControl'      : true
		};
		var map = new google.maps.Map($(mapCanvasId).get(0), myOptions);

		//初期表示時のピンを立てる
		marker = new google.maps.Marker({
			'position': latlng,
			'map'     : map,
			'title'   : ''
		});

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
				alert('位置情報取得用住所を入力してください。');
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
	}
});
