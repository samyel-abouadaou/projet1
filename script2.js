$(document).ready(function () {

    $('.supprimer').click(function () {
        $.post(
                "ScriptSupression.php",
                {
                    nom: this.id,
                    table: "produit"

                },
                function (data) {
                    $('#message').html('Supression effectue!');
                }
        );
    });

});