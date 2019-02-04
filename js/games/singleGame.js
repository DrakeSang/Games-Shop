$(document).ready(function() {
    $('.myImg').each(function() {
        $(this).on('click', function() {
            $('.modal').css('display', 'block');
            $('.modal-content').attr('src', $(this).attr('src'))
        })
    })

    $('.close').on('click', function() {
        $('.modal').css('display', 'none');
    })

    var cachedPages = {};

    $('.tabs a').on('click', function(e) {
        e.preventDefault();

        var targetPage = $(this).prop('href');

        $('.description').addClass('loading');
        $('.actions').addClass('loading');

        $('.tabs a').each(function() {            
            if($(this).prop('href') === targetPage){
                $('.tabs a').removeClass('active');

                $(this).addClass("active");
            }
        });

        if(cachedPages[targetPage]){
            $('.game').html(cachedPages[targetPage]);

            $('.description').removeClass('loading');
            $('.actions').removeClass('loading');

            return;
        };

        $.ajax({
            url: targetPage,
            success: function (html) {
                currentPage = targetPage;

                cachedPages[currentPage] = $(`<div>${html}</div>`).find('.game').html();

                $('.game').html(cachedPages[currentPage]);

                $('.description').removeClass('loading');
                $('.actions').removeClass('loading');
            },
            error: function() {
                alert('the page has error......');
            },
            complete: function() {
                $('.description').removeClass('loading'); 
            }
        })
    })

    $('.right .actions .shop_cart_game').on('click', function(e) {
        e.preventDefault();

        var activeUrl = $(this).attr('href');

        $.ajax({
            dataType: "json",
            url: activeUrl,
            success: function(response){ 
                if(response["message"] == "notLoggedIn"){
                    window.location.href = "login.php";
                }else if(response["message"] == "alreadyAdded"){
                    alert('You already addded this game to your shopping cart!');
                }else if(response["message"] == "addIt"){
                    alert('You successfully added this game to your shopping cart!');
                }
            }
        })
    })
})