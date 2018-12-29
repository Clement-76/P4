$(function () {
    $(".delete_post").on("click", function (e) {
        e.preventDefault();
        if (confirm("Êtes-vous sûr de vouloir supprimer cet article ?")) {
            window.location.href = e.target.href;
        }
    })
})
