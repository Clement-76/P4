$(function () {
    $(".delete").on("click", function (e) {
        e.preventDefault();
        if (confirm("Êtes-vous sûr de vouloir le supprimer ?")) {
            $.ajax({
                type: "DELETE",
                url: e.target.href,
                success: function (response) {
                    switch (response) {
                        case "success":
                            $(e.target).parents("tr").remove();

                            let div = $(document.createElement("div"));
                            div.text("Le commentaire a bien été supprimé");
                            div.attr("class", "success");
                            $("h1").after(div);
                            
                            setTimeout(function () {
                                div.remove();
                            }, 3000);
                            
                            break;
                        case "idUndefined":
                            console.error("Error: id is undefined");
                            break;
                        case "notConnected":
                            console.error("Error: you're not connected");
                            break;
                    }
                }
            });
        }
    });
});
