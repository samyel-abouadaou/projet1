<?php
$bdd = new PDO('mysql:host=localhost;dbname=projet', 'root', '');
?>

<HTML>
    <HEADER>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src='script4.js'></script>
    </HEADER>
    <BODY>

    </BODY>
</HTML>

<?php

$produit = $bdd->query("SELECT produit.id, produit.nom, produit.prix, produit.details, categorie.nom
FROM `produit` 
JOIN categorie ON id_categorie = categorie.id")->fetchAll()or die(print_r($bdd->errorInfo(), true));
foreach ($produit as $key => $value) {
    echo "Nom du produit: ".$value[0]."<br> Prix :".$value['prix']."€"."<br> Categorie: ".$value['nom']."<br> Details sur le produit: ".$value['details']."<br>";
    ?> <input type="submit" value="Ajouter" class='ajout' id='<?php echo '2'; ?>' name='<?php echo $value['id']; ?>' /> <br> <br><?php
}

?>
<DIV id='message'>

</DIV>
