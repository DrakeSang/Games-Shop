$(document).ready(function () {
    $('.nav-menu-toggle').click(function () {
        if ($('.header-actions').hasClass('show')) {
            $('.header-actions').removeClass('show');
        }

        $('.header-nav').toggleClass('show');
    })

    $('.user-actions-toggle').click(function () {
        if ($('.header-nav').hasClass('show')) {
            $('.header-nav').removeClass('show');
        }

        $('.header-actions').toggleClass('show');
    })

    $("body").css("padding-top", $(".header-overlay").height());
})