$(document).ready(function () {

    $('.payer').click(function () {
        $.post(
                "ScriptPayement.php",
                {
                    prix: this.name,
                    id: this.id
                },
                function (data) {
                   $('#message').append('Payement reussis!'+data);
                }
        );
    });

});


