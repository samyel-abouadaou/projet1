$(document).ready(function () {

    $('#payer').click(function () {
        $.post(
                "ScriptPayement.php",
                {
                    prix: this.name
                },
                function (data) {
                   $('#message').append('Payement reussis!');
                }
        );
    });

});


