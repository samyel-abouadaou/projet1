<?php
session_start();

$prix = $_POST['prix'];
$id = $_POST['id'];

$bdd = new PDO('mysql:host=localhost;dbname=projet', 'root', '');
$bdd->exec("UPDATE `commande` SET `id_statut`=2,`prix_total`='$prix',`id_client`='".$_SESSION['droit']."' WHERE id = $id");
$bdd->exec("INSERT INTO `commande`(`id_client`) VALUES ('".$_SESSION['droit']."')")or die(print_r($bdd->errorInfo(), true));

?>
