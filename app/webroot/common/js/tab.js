// tab.js


$(document).ready(function() {
	var d = new Date(),

    n = d.getMonth();

	$('.area:eq('+n+')').show();
	// $('.area:data').show();
	
	$('#tab li:eq('+n+')').addClass('active');
	
	$('#tab li').click(function() {
		$('#tab li').removeClass('active');
		$(this).addClass('active');
		$('.area').hide();
	
		$($(this).find('a').attr('href')).fadeIn();
		return false;
	});
});

$(function(){
	$('.area').each(function(){
		$('td.country:contains("ブルネイ・ダルサラーム")').addClass('type01');
		$('td.country:contains("カンボジア")').addClass('type02');
		$('td.country:contains("インドネシア")').addClass('type03');
		$('td.country:contains("ラオス")').addClass('type04');
		$('td.country:contains("マレーシア")').addClass('type05');
		$('td.country:contains("ミャンマー")').addClass('type06');
		$('td.country:contains("フィリピン")').addClass('type07');
		$('td.country:contains("シンガポール")').addClass('type08');
		$('td.country:contains("タイ")').addClass('type09');
		$('td.country:contains("ベトナム")').addClass('type10');
	});
});