$(function () {
    $(".hamburger_menu").on("click", function () {
        $("header").addClass("open_menu");

        $(".overlay").show(0, function () {
            $(".overlay").animate({
                opacity: 1
            }, 500);
        });
    });

    $(".close_menu, .overlay").on("click", function () {
        $("header").removeClass("open_menu");

        $(".overlay").animate({
            opacity: 0
        }, 500, function () {
            $(".overlay").hide(0);
        });
    });

    $(".arrow.bottom").on("click", function () {
        $("html, body").animate({
            scrollTop: $("#home").height()
        }, 1000);
    });
});
