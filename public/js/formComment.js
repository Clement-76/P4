$(function () {
    $("#newComment").on("submit", function () {
        localStorage.setItem("pseudo", $("#pseudo").val());
    });
    
    if (localStorage.getItem("pseudo")) {
        $("#pseudo").val(localStorage.getItem("pseudo"));
    }
});