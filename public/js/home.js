$(function () {
    $(".arrow.bottom").on("click", function () {
        $("html, body").animate({
            scrollTop: $("#home").height() - 250
        }, 1000);
    });

    $(window).on("scroll", function (e) {
        if (window.scrollY < 500) {
            let value = (window.scrollY - window.scrollY % 2) / 2;
            $('.container').css("transform", `translateY(-${value}px)`);
        }
    });

    if (window.scrollY < 500) {
        let value = (window.scrollY - window.scrollY % 2) / 2;
        $('.container').css("transform", `translateY(-${value}px)`);
    } else {
        $('.container').css("transform", `translateY(-250px)`);
    }
});
