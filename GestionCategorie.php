<HTML>
    <HEADER>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src='script.js'></script>
    </HEADER>
    <BODY>
        <FORM action='' method="POST">
            <LABEL for='nom'> Nom de la nouvelle categorie:<input type = 'text' name='nom' id='nom'> </LABEL>
            <INPUT type='submit'>
        </FORM>
    </BODY>
</HTML>

<?php
$bdd = new PDO('mysql:host=localhost;dbname=projet', 'root', '');

if (!empty($_POST['nom'])) {
    $nom = $_POST['nom'];
    $bdd->exec("INSERT INTO `categorie`(`nom`) VALUES ('$nom')")or die(print_r($bdd->errorInfo(), true));
}

$categorie = $bdd->query("SELECT categorie.nom FROM categorie")->fetchAll()or die(print_r($bdd->errorInfo(), true));

foreach ($categorie as $key => $value) {
    echo $value['nom'];
    ?> 
    <input type="submit" value="Supprimer" class="supprimer" id="<?php echo $value['nom']; ?>"/> 
    <input type="submit" value="Modification" class="modifier" id="<?php echo $value['nom']; ?>"/> </br> 
    <div id="ChampModif"> </div>
    <?php
}
?>
<DIV id='message'>

</DIV>
    