<?php
$bdd = new PDO('mysql:host=localhost;dbname=projet', 'root', '');


$produit = $bdd->query("SELECT produit.id, produit.nom, produit.prix, produit.details, categorie.nom
FROM `produit` 
JOIN categorie ON id_categorie = categorie.id
WHERE categorie.id = '" . $_POST['categorie'] . "'
AND produit.nom LIKE '%" . $_POST['recherche'] . "%'
")->fetchAll()or die(print_r($bdd->errorInfo(), true));
echo '<div id="prod">';
foreach ($produit as $key => $value) {
    echo "Nom du produit: " . $value[0] . "<br> Prix :" . $value['prix'] . "€" . "<br> Categorie: " . $value['nom'] . "<br> Details sur le produit: " . $value['details'] . "<br>";
    ?> <input type="submit" value="Ajouter" class='ajout' id='<?php echo '1'; ?>' name='<?php echo $value['id']; ?>' /> <br> <br><?php
}
echo '</div>';
?>