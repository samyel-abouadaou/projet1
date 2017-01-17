$(document).ready(function () {

    $('.supprimer').click(function () {
        $.post(
                "ScriptSupression.php",
                {
                    nom: this.id,
                    table: "categorie"

                },
                function (data) {
                    $('#message').html('Supression effectue!');
                }
        );
    });

    $('.modifier').click(function () {
        this.append('<LABEL for="modif"> Nouveau nom de la categorie:<input type = "text" name="modif" id="modif"> </LABEL> <button id="validation"> Valider </button> </br> ');
        
        
    });

    $('#validation').click(function () {
        alert('hello');
    });

});