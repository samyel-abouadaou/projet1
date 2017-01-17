<?php
$bdd = new PDO('mysql:host=localhost;dbname=projet', 'root', '');
?>

<HTML>
    <HEADER>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src='script2.js'></script>
    </HEADER>
    <BODY>
        <FORM action='' method="POST">
            <LABEL for='nom'> Nom du nouveau produit:<input type = 'text' name='nom' id='nom'> </LABEL><br>
            <LABEL for='prix'> Prix du nouveau produit:<input type = 'text' name='prix' id='nom'> </LABEL><br>

            <LABEL for='categorie'> Selectionner la categorie du nouveau produit:<SELECT name="categorie" id="categorie" size="1">
                    <?php
                    $categorie = $bdd->query("SELECT * FROM categorie")->fetchAll()or die(print_r($bdd->errorInfo(), true));
                    foreach ($categorie as $key => $value) {
                        echo '<OPTION value="' . $value['id'] . '">' . $value['nom'];
                    }
                    ?>
                </SELECT> </LABEL><br>

            <LABEL for='details'> Details sur le nouveau produit:<input type = 'text' name='details' id='nom'> </LABEL><br>
            <INPUT type='submit'>
        </FORM>
    </BODY>
</HTML>

<?php
if (!empty($_POST['nom']) || !empty($_POST['prix']) || !empty($_POST['categorie']) || !empty($_POST['details'])){

    $nom = $_POST['nom'];
    $prix = $_POST['prix'];
    $categorie = $_POST['categorie'];
    $details = $_POST['details'];

    $bdd->exec("INSERT INTO `produit`(`nom`, `prix`, `id_categorie`, `details`) VALUES ('$nom','$prix','$categorie','$details')")or die(print_r($bdd->errorInfo(), true));
    echo "Produit ajouté!<br>";
}
$produit = $bdd->query("SELECT produit.nom, produit.prix, produit.details, categorie.nom
FROM `produit` 
JOIN categorie ON id_categorie = categorie.id")->fetchAll()or die(print_r($bdd->errorInfo(), true));
foreach ($produit as $key => $value) {
    echo $value['nom']."<br>".$value['prix']."<br>".$value['nom']."<br>".$value['details']."<br>";
    ?> 
    <input type="submit" value="Supprimer" class="supprimer" id="<?php echo $value['nom']; ?>"/> 
    <input type="submit" value="Modification" class="modifier" id="<?php echo $value['nom']; ?>"/> </br> </br>
    <div id="ChampModif"> </div>
    <?php
}

?>
<DIV id='message'>

</DIV>
