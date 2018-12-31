$(function () {
//    $(".arrow.bottom").on("click", function () {
//        $("html, body").animate({
//            scrollTop: $("#home").height()
//        }, 1000);
//    });    
    
    $(".arrow.bottom").on("click", function () {
        $("html, body").animate({
            scrollTop: $("#home").height() - 250
        }, 1000);
    });
        
    $(window).on("scroll", function (e) {
        if (window.scrollY < 500) {
            $('.container').css("transform", `translateY(-${window.scrollY / 2}px)`);
        }
    });
    
    if (window.scrollY < 500) {
        $('.container').css("transform", `translateY(-${window.scrollY / 2}px)`);
    } else {
        $('.container').css("transform", `translateY(-250px)`);
    }
});