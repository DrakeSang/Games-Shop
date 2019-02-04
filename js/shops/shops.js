$(document).ready(function (){
    var cachedPages = {};

    $('.shop-navigation ul li a').on('click', function(e){
        e.preventDefault();

        var targetPage = $(this).prop('href');

        $('.shop-main').addClass('loading');

        $('.shop-navigation ul li a').each(function() {            
            if($(this).prop('href') === targetPage){
                $('.shop-navigation ul li a').removeClass('active');

                $(this).addClass("active");
            }
        })

        if(cachedPages[targetPage]){
            $('.shop-body').html(cachedPages[targetPage]);

            $('.shop-main').removeClass('loading');

            return;
        }

        $.ajax({
            url: targetPage,
            success: function (html) {
                currentPage = targetPage;

                cachedPages[currentPage] = $(`<div>${html}</div>`).find('.shop-body').html();

                $('.shop-body').html(cachedPages[currentPage]);

                $('.shop-main').removeClass('loading');
            },
            error: function() {
                alert('the page has error......');
            },
            complete: function() {
                $('.shop-main').removeClass('loading'); 
            }
        })
    })

    $('.thumbnail-section').on('click', function(event) {  
        var targetElement = event.target;
        
        $('.main-image').attr('src', $(targetElement).attr('src'));
    })
})