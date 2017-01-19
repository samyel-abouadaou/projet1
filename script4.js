$(document).ready(function () {
    
    $('#rechercher').click(function () {
        $.post(
                "ScriptRecherche.php",
                {
                    recherche: $('#recherche').val(),
                    categorie: $('#categorie').val()
                },
                function (data1) {
                    $('#message').html(data1);
                }
        );
    });
    
         $('body').on('click','.ajout', function () {
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

