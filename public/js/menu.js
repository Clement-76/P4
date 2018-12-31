$(function () {
    $(".hamburger_menu").on("click", function () {
        $("aside").addClass("open_menu");
        
        $("body").css("overflow", "hidden");
        
        $(".overlay").show(0, function () {
            $(".overlay").animate({
                opacity: 1
            }, 500);
        });
    });

    $(".close_menu, .overlay").on("click", function () {
        $("aside").removeClass("open_menu");
        
        $("body").css("overflow", "visible");

        $(".overlay").animate({
            opacity: 0
        }, 500, function () {
            $(".overlay").hide(0);
        });
    });
});
