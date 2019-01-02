$(function () {
    $("#comments_selector").on("change", function (e) {
        if (e.target.value === "reports_comments") {
            $(".not_comment_report").css("display", "none");
        } else {
            $(".not_comment_report").css("display", "table-row");
        }
    });
});
