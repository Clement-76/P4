/**
 * displays a block with a message, with the class success or error
 * @param {string} status  success or error
 * @param {string} message the message to display
 */
function statusMessage(status, message) {
    let div = $(document.createElement("div"));
    div.text(message);

    switch (status) {
        case "success":
            div.attr("class", "success");
            break;
        case "error":
            div.attr("class", "error");
            break;
        default:
            console.error("Error: bad status enter");
    }

    div.append($("<div class='close'><div></div><div></div></div>"));

    $("aside").before(div);

    div.animate({
        top: '15px'
    }, 300);

    $(".close").on("click", function () {
        div.animate({
            top: '-100px'
        }, 300, function () {
            div.remove();
        });
    });

    setTimeout(function () {
        div.animate({
            top: '-100px'
        }, 300, function () {
            div.remove();
        });
    }, 3000);
}
