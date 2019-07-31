$(function (){

	$('.tab_area').each(function(){
		$(this).find('li:first').addClass('on');
		changeTab($(this));
		changeImage($(this));
	});

	$('.tab_area').find('li').hover(function() {
		var tabClassStr = $(this).attr('class');
		var tabClassSpl = tabClassStr.split(' ');
		var tabClass = tabClassSpl[0];
		var imgSrc = $('#' + tabClass + '_img_on').val();
		$(this).find('img').attr('src', imgSrc);
	}, function() {
		var tabClassStr = $(this).attr('class');
		var tabClassSpl = tabClassStr.split(' ');
		var tabClass = tabClassSpl[0];
		if (!$(this).hasClass('on')) {
			var imgSrc = $('#' + tabClass + '_img_off').val();
			$(this).find('img').attr('src', imgSrc);
		}
	});

	$(".index_detail_nav li").click(function() {
		$(this).parent().find('li').removeClass('on');
		$(this).addClass('on');
		changeTab($(this).closest('.tab_area'));
		changeImage($(this).closest('.tab_area'));
		return false;
	});

	function changeTab(obj) {
		var tabClassStr = $(obj).find('li.on').attr('class');
		var tabClassSpl = tabClassStr.split(' ');
		var tabClass = tabClassSpl[0];
		obj.find('.tab_contents').hide();
		obj.find('.' + tabClass + '_contents').show();
	}

	function changeImage(obj) {
		$(obj).find('li').each(function(){
			var tabClassStr = $(this).attr('class');
			var tabClassSpl = tabClassStr.split(' ');
			var tabClass = tabClassSpl[0];
			if ($(this).hasClass('on')) {
				var imgSrc = $('#' + tabClass + '_img_on').val();
				$(this).find('img').attr('src', imgSrc);
			} else {
				var imgSrc = $('#' + tabClass + '_img_off').val();
				$(this).find('img').attr('src', imgSrc);
			}
		});
	}
});