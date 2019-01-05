$(function () {
    $(".report").on("click", function (e) {
        e.preventDefault();
        if (confirm("Êtes-vous sûr de vouloir signaler ce commentaire ?")) {
            $.post(e.target.href, function (response) {
                let array = JSON.parse(response);
                
                switch (array[0]) {
                    case "success":
                        statusMessage("success", "Le commentaire a bien été signalé");
                        break;
                    case "idUndefined":
                        statusMessage("error", "L'id n'est pas définit");
                        console.error("Error: id is undefined");
                        break;
                    case "alreadyReport":
                        statusMessage("error", "Vous avez déjà signalé ce commentaire");
                        break;
                }
            });
        }
    });
});
