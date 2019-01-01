$(function () {
    $(".report").on("click", function (e) {
        e.preventDefault();
        if (confirm("Êtes-vous sûr de vouloir signaler ce commentaire ?")) {
            $.post(e.target.href, function (response) {
                switch (response) {
                    case "success":
                        let span = $(document.createElement("span"));
                        span.text("Ce commentaire a bien été signalé");
                        span.attr("class", "success");
                        $(e.target).after(span);

                        setTimeout(function () {
                            span.remove();
                        }, 3000);
                        break;
                    case "idUndefined":
                        console.error("Error: id is undefined");
                        break;
                    case "alreadyReport":
                        console.error("Error: you've already report this comment");
                        break;
                }
            });
        }
    });
});
