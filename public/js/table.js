$(function () {
    $("td:first-child i").on("click", function (e) {
        $(e.target).toggleClass("fa-caret-down");
        $(e.target).toggleClass("fa-caret-up");
        
        $(e.target).parents("td").siblings("td").toggleClass("d_block");
        $(e.target).parents("td").siblings(".td_edit, .td_delete, td a").toggleClass("d_inline");
    });
});
