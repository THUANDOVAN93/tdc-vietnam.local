// list.js

// accordion
// jQuery(document).ready(function($) {
// 	$('.search_nav_table').hide();
// 	$('.search_nav .imgbtn').click(function() {
// 		$(this).parent().next('.search_nav_table').slideToggle();
// 		return false;
// 	});
// 	$('.station_mapdetail').find('h4 img').click(function() {
// 		$('.station_mapdetail').find('p').slideToggle();

// 		var img = $(this);
// 		var src = img.attr('src');
// 		var new_src = '';
// 		var new_alt = '';
// 		if (src.lastIndexOf('_off.') > 0) {
// 			new_src = src.substr(0, src.lastIndexOf('_off.'))
// 				+ '_on'
// 				+ src.substring(src.lastIndexOf('.'));
// 		}
// 		else {
// 			new_src = src.substr(0, src.lastIndexOf('_on.'))
// 				+ '_off'
// 				+ src.substring(src.lastIndexOf('.'));
// 		}
// 		$(this).attr('src', new_src);
// 		return false;
// 	});

// 	$('.search_nav_detail select').change(function() {
// 		var id = $(this).closest('form').attr('id');
// 		if ($('#' + id + ' .search_nav_table').css('display') == 'none') {
// 			$('#' + id).find('.search_nav_table').slideToggle();
// 		}
// 		return false;
// 	});
// });
