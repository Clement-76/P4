$(function () {
    $(".delete").on("click", function (e) {
        e.preventDefault();
        if (confirm("Êtes-vous sûr de vouloir le supprimer ?")) {
            $.ajax({
                type: "DELETE",
                url: e.target.href,
                success: function (response) {
                    let array = JSON.parse(response);
                    
                    switch (array[0]) {
                        case "success":
                            $(e.target).parents("tr").remove();
                            
                            if (array[1] === "post") {
                                statusMessage("success", "L'article a bien été supprimé");
                            } else {
                                statusMessage("success", "Le commentaire a bien été supprimé");
                            }
                            break;
                        case "idUndefined":
                            statusMessage("error", "L'id n'est pas définit");
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
