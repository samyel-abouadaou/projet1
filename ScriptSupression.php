<?php

$nom = $_POST['nom'];
$table = $_POST['table'];

$bdd = new PDO('mysql:host=localhost;dbname=projet', 'root', '');

$bdd->exec("DELETE FROM `$table` WHERE nom = '$nom'")or die(print_r($bdd->errorInfo(), true));
   
?>