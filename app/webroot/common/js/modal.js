// modal.js

$(function(){
    $('.btns').click(function(){
        var wn = '.' + $(this).attr('alt');
        var mW = $(wn).find('.modalBody').innerWidth() / 2;
        var mH = $(wn).find('.modalBody').innerHeight() / 2;
        $(wn).find('.modalBody').css({'margin-left':-mW,'margin-top':-mH});
        $(wn).css({'visibility':'visible'});
        $(wn).animate({'opacity':'1'},'fast')
    });
 
    $('.close,.modalBK').click(function(){
				$('.modal').css({'visibility':'hidden'});
    });
 
});

