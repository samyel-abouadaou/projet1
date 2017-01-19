<?php
$bdd = new PDO('mysql:host=localhost;dbname=projet', 'root', '');
?>

<HTML>
    <HEADER>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src='script4.js'></script>
    </HEADER>
    <BODY>
        <form action="" method="POST">
            <label for="recherche">Rechercher: <input type="text" id="recherche" name="recherche"></LABEL><br>
            <LABEL for='categorie'> Selectionner la categorie du produit:<SELECT name="categorie" id="categorie" size="1">
                    <?php
                    $categorie = $bdd->query("SELECT * FROM categorie")->fetchAll()or die(print_r($bdd->errorInfo(), true));
                    foreach ($categorie as $key => $value) {
                        echo '<OPTION value="' . $value['id'] . '">' . $value['nom'];
                    }
                    ?>
                </SELECT> </LABEL><br>
            <INPUT type="button" value="Rechercher" id="rechercher"><br><br>
        </form>
    </BODY>
</HTML>


<DIV id='message'>

</DIV>
