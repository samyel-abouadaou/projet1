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
        this.append('');
        
        
    });

    $('#validation').click(function () {
        alert('hello');
    });

});