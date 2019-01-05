$(function () {
    function progress() {
        let postSectionHeight = $("#post").height();
        let scroll = $(window).scrollTop();
        let width = scroll / postSectionHeight * 100;
        $(".progress").css("width", `${width}%`);
    }

    progress();

    $(window).on("scroll", () => {
        progress();
    });
});
