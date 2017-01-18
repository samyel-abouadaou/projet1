<?php
$prix = $_POST['prix'];
$client = $_POST['client'];

$bdd = new PDO('mysql:host=localhost;dbname=projet', 'root', '');
$bdd->exec("INSERT INTO `commande`(`id_statut`, `prix_total`, `id_client`) VALUES ('2','$prix','$client')");

?>
