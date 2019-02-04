$(document).ready(function () {
    $('.header').click(function() {
        if($(window).width() < 768){
            $(this).parent().find('.content').animate({height: 'toggle'});
        
            $(this).parent().find('.content').addClass('opened');
    
            $(this).parent().siblings().each(function() {
                if($(this).find('.content').hasClass('opened')){
                    $(this).find('.content').removeClass('opened');
                    $(this).find('.content').hide();           
                }
            })
        }
    })
})