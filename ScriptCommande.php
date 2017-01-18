<?php
$commande = $_POST['commande'];
$produit = $_POST['produit'];

$bdd = new PDO('mysql:host=localhost;dbname=projet', 'root', '');
$bdd->exec("INSERT INTO `ligne_commande`(id_commande, id_produit) VALUES ('$commande','$produit')");

?>
