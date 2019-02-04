$(document).ready(function() {
    $('.products-toggle-button').click(function (){
        $('.products-sidebar').toggleClass('show');
    })

    $('.products-navigation li a').on('click', function(e) {
        $(this).addClass('active');
        $(this).parent().siblings().find('a').removeClass('active');

        var gameType = $('.products-sidebar ul li span.active').text();
        var consoleType = $('.products-navigation li a.active').text();

        e.preventDefault();

        var targetPage = $(this).prop('href');

        $('.product-body').addClass('loading');

        $.ajax({
            type: 'post',
            url: targetPage,
            data: {
                gameType: gameType,
                consoleType: consoleType 
            },
            success: function(html){
                var games = $(`<div>${html}</div>`).find('.main').html();
                var pagination = $(`<div>${html}</div>`).find('.pagination').html();

                $('.main').html(games);
                $('.pagination').html(pagination);

                $('.product-body').removeClass('loading');
            },
            error: function() {
                alert('the page has error......');
            },
            complete: function() {
                $('.product-body').removeClass('loading'); 
            }
        })

        $.ajax({
            type: 'post',
            url: './frontend/pagination/pagination_links.php',
            data: {
                gameType: gameType,
                consoleType: consoleType 
            }
        })
    })

    $('.products-sidebar ul li span').on('click', function(){
        if (!$(this).hasClass('active')) {
            $('.products-sidebar ul li span').removeClass('active');
                    
            $(this).addClass("active");
        }

        var gameType = $(this).text();
        var activeUrl = $('.products-header .products-navigation li a.active').attr('href');
        var consoleType = $('.products-navigation li a.active').text();

        $('.products-sidebar').toggleClass('show');
        $('.product-body').addClass('loading');

        $.ajax({
            type: 'post',
            url: activeUrl,
            data: {
                gameType: gameType,
                consoleType: consoleType
            },
            success: function(html){
                $('.main').html($(`<div>${html}</div>`).find('.main').html());
                $('.pagination').html($(`<div>${html}</div>`).find('.pagination').html());

                $('.product-body').removeClass('loading');
            },
            error: function() {
                alert('the page has error......');
            },
            complete: function() {
                $('.product-body').removeClass('loading'); 
            }
        })

        $.ajax({
            type: 'post',
            url: './frontend/pagination/pagination_links.php',
            data: {
                gameType: gameType,
                consoleType: consoleType 
            }
        })
    })

    $('.add_to_favourites').on('click', function(e) {
        e.preventDefault();

        var activeUrl = $(this).attr('href');

        $.ajax({
            dataType: "json",
            url: activeUrl,
            success: function(response){ 
                if(response["message"] == "notLoggedIn"){
                    window.location.href = "login.php";
                }else if(response["message"] == "alreadyAdded"){
                    alert('This game was already added to your favourites!');
                }else if(response["message"] == "addIt"){
                    alert('The game was successfully added to yoru favourites!');
                }
            }
        })
    })
})