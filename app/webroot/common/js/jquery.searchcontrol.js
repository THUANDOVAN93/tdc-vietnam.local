/* フロント一覧系ページで使用 */
/*=============================================================================*
 プルダウンを物件タイプにより切り替え
*=============================================================================*/

$(document).ready(function(){

	pulldownHideShow('u_cat_types', 'u_switch');
	pulldownHideShow('b_cat_types', 'b_switch');


	$('.u_cat_types').click(function (){
		pulldownHideShow('u_cat_types', 'u_switch');
	});
	$('.b_cat_types').click(function (){
		pulldownHideShow('b_cat_types', 'b_switch');
	});

	function pulldownHideShow (typeKey, switchKey) {
		$('.' + switchKey + ' select').each(function () {
			var s_name = $(this).attr('name');
			if (s_name.slice(0, 1) != '_') {
				s_name = '_' + s_name;
			}
			$(this).attr('name', s_name);
		});
		$('.' + switchKey).hide();

		var checkId = $('.' + typeKey + ':checked').attr('id');
		$('.disp_'+checkId).each(function () {
			var s_name = $(this).find('select').attr('name');
			if (s_name.slice(0, 1) == '_') {
				s_name = s_name.slice(1);
			}
			$(this).find('select').attr('name', s_name);
		});
		$('.disp_'+checkId).show();
	}






});
