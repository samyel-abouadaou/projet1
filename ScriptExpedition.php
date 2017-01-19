<?php
session_start();

$nom = $_POST['nom'];

$bdd = new PDO('mysql:host=localhost;dbname=projet', 'root', '');

$bdd->exec("UPDATE `categorie` SET `$nom`='$valeur' WHERE nom = '$nom'")or die(print_r($bdd->errorInfo(), true));
?>