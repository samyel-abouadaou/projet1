<?php
session_start();

$produit = $_POST['produit'];

$bdd = new PDO('mysql:host=localhost;dbname=projet', 'root', '');

$droit = $bdd->query("SELECT MAX(id)
FROM `commande` 
WHERE id_client = '".$_SESSION['droit']."'")->fetchAll();


$bdd->exec("INSERT INTO `ligne_commande`(id_commande, id_produit) VALUES ('".$droit[0][0]."','$produit')");

?>
