$(function () {
    $(".delete").on("click", function (e) {
        e.preventDefault();
        if (confirm("Êtes-vous sûr de vouloir le supprimer ?")) {
            window.location.href = e.target.href;
        }
    })
})
