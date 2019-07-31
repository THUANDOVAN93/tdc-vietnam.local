/* フロント 物件詳細ページで使用 */
/*=============================================================================*
 googleマップ操作JS
*=============================================================================*/
$(document).ready(function(){

	var mapCanvasId      = '#map_canvas';
	var mapLatId         = '#map_lat';
	var mapLngId         = '#map_lng';

	initialize();

	function initialize() {

		//初期表示位置の取得
		var latVal = $(mapLatId).val();
		var lngVal = $(mapLngId).val();

		var latlng = new google.maps.LatLng(latVal, lngVal);
		var myOptions = {
			'zoom'              : 16,
			'center'            : latlng,
			'mapTypeId'         : google.maps.MapTypeId.ROADMAP,
			'streetViewControl' : true,
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
	}
});
