$(document).ready(function () {

    $('.ajout').click(function () {
        $.post(
                "ScriptCommande.php",
                {
                    commande: this.id,
                    produit: this.name
                },
                function (data) {
                   $('#message').append('Le produit a bien été ajouté à votre panier!');
                }
        );
    });

});

