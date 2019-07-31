// global.js

// RSS_Feed -> scrollbar
$(document).ready(function() {
	new WordpressFeed('/news/?page_id=16', $('.scrollbar'));
});

var WordpressFeed = function(url, target) {
	this.url = url;
	this.target = target;
	this.category_id = ['2', '3'];

	this.target.empty();
	this.getFeed();
}
WordpressFeed.prototype.getFeed = function() {
	$.ajax({
		async: true, 
		type: 'GET', 
		dataType: 'xml',
		url: this.url, 
		success: $.proxy(this.onSuccess, this)
	});
}
WordpressFeed.prototype.onSuccess = function(xml, status) {
	if(status != 'success') return;

	var items = $(xml).find('item');
	
	for (var i=0, max = items.length; i<max; i++) {
		this.disp($(items[i]));
	}

	for (var i=0, len=this.category_id.length; i<len; i++) {
		$(this.target[i]).jScrollPane();
	}
}
WordpressFeed.prototype.disp = function(item) {
	var disp_category_id = item.find('category_id').text();
	var index = null;
	
	index = this.category_id.indexOf(disp_category_id);
	
	if (index == null || index == -1) return;

	var xtitle = item.find('title').text();
	var xlink = item.find('url').text();
	var pubTitle = '<a href="' + xlink + '">' + xtitle + '<a/>';

	var xPubDate = item.find('date').text();
	var ctmPubDate = new Date(xPubDate);
	var pubDate = ctmPubDate.getFullYear() + '.' +  (ctmPubDate.getMonth() + 1) + '.' +  ctmPubDate.getDate();

	var nowDate = new Date();
	nowDate.setTime(nowDate.getTime() - (1 * 86400000));

	if (ctmPubDate >= nowDate) $(this.target[index]).append('<dl><dt class="new"><span>' + pubDate + '</span></dt><dd>' + pubTitle + '</dd></dl>');
	else $(this.target[index]).append('<dl><dt><span>' + pubDate + '</span></dt><dd>' + pubTitle + '</dd></dl>');
}

// click
$(document).ready(function(){
	$(document).bind("contextmenu",function(e){
		return false;
	});
});

// accordion
$(document).ready(function(){
/*
	$('.search_nav_table').hide();
	$('.search_nav .imgbtn').click(function() {
		$(this).parent().next('.search_nav_table').slideToggle();
		return false;
	});
*/
});

// rollover
jQuery(document).ready(function($) {
	var postfix = '_on';
	$('.imgbtn img, #tab a img, #selectNav img').not('[src*="'+ postfix +'."]').each(function() {
		var img = $(this);
		var src = img.attr('src');
		var src_on = src.substr(0, src.lastIndexOf('.'))
			+ postfix
			+ src.substring(src.lastIndexOf('.'));
		$('<img>').attr('src', src_on);
		img.hover(
			function() {
				img.attr('src', src_on);
			},
			function() {
				img.attr('src', src);
			}
		);
	});
});

// rollover input
jQuery(document).ready(function($) {
	var postfix = '_on';
	$('.imgbtn input').not('[src*="'+ postfix +'."]').each(function() {
		var input = $(this);
		var src = input.attr('src');
		var src_on = src.substr(0, src.lastIndexOf('.'))
			+ postfix
			+ src.substring(src.lastIndexOf('.'));
		$('<input>').attr('src', src_on);
		input.hover(
			function() {
				input.attr('src', src_on);
			},
			function() {
				input.attr('src', src);
			}
		);
	});
});

//--------------------- indexOf(IE only) ---------------------//
if (!Array.prototype.indexOf) {
	Array.prototype.indexOf = function(elt /*, from*/) {
	var len = this.length;
	
	var from = Number(arguments[1]) || 0;
	from = (from < 0) ? Math.ceil(from) : Math.floor(from);
	
	if (from < 0) from += len;
	
	for (; from < len; from++) 
		if (from in this && this[from] === elt) return from;
	
	return -1;
	};
}
//--------------------- indexOf(IE only) ---------------------//


/* デバッグ */
var trace = function() {
	for (var i=0; i<trace.arguments.length; i++)
		console.log(trace.arguments[i]);
}