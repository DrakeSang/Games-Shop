$(document).ready(function () {
    $('.products-toggle-button').click(function (){
        $('.products-sidebar').toggleClass('show');
    })

    $('.products-navigation li a').on('click', function(e){
        var consoleType = $('.products-sidebar ul li span.active').text();

        e.preventDefault();

        var targetPage = $(this).prop('href');

        $('.product-body').addClass('loading');

        $('.products-navigation li a').each(function() {            
            if($(this).prop('href') === targetPage){
                $('.products-navigation li a').removeClass('active');

                $(this).addClass("active");
            }
        })

        $.ajax({
            type: "post",
            url: targetPage,
            data: {
                consoleChoice: consoleType
            },
            success: function (html) {
                var htmlToLoad = $(`<div>${html}</div>`).find('.main').html();

                $('.main').html(htmlToLoad);

                $('.product-body').removeClass('loading');
            },
            error: function() {
                alert('the page has error......');
            },
            complete: function() {
                $('.product-body').removeClass('loading'); 
            }
        })
    })

    $('.products-sidebar ul li span').on('click', function() {
        if (!$(this).hasClass('active')) {
            $('.products-sidebar ul li span').removeClass('active');
                    
            $(this).addClass("active");
        }

        var consoleChoice = $(this).text();
        var activeUrl = $('.products-header .products-navigation li a.active').attr('href');

        $('.products-sidebar').toggleClass('show');
        $('.product-body').addClass('loading');

        $.ajax({
            type: 'post',
            url: activeUrl,
            data: {
                consoleChoice: consoleChoice
            },
            success: function(html){
                $('.main').html($(`<div>${html}</div>`).find('.main').html());

                $('.product-body').removeClass('loading');
            },
            error: function() {
                alert('the page has error......');
            },
            complete: function() {
                $('.product-body').removeClass('loading'); 
            }
        })
    })
})