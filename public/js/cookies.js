$(function () {
    $("#cookie button").on("click", function () {
        let date = new Date();
        date.setTime(date.getTime() + (365 * 24 * 3600 * 1000));
        let expire = "" + date.toGMTString();
        
        document.cookie = `acceptCookies = true; expires = ${expire} "; path=/`;
        
        $("#cookie").remove();
    })
})
