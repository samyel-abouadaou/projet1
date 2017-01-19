$(document).ready(function () {

    $('#expedier').click(function () {
        $.post(
                "ScriptExpedition.php",
                {
                    nom: this.name
                },
                function (data) {
                   $('#message').append('Payement reussis!');
                }
        );
    });

});


