<html>
    <header>

    </header>
    <body> 
        <form action="" method="POST">
            <label for="nom"> Nom : <input type="texte" name="nom" id="nom"></label><br>
            <label for="prenom"> Prenom : <input type="texte" name="prenom" id="prenom"></label><br>
            <label for="adresse"> Adresse : <input type="texte" name="adresse" id="adresse"></label><br>
            <label for="telephone"> Telephone : <input type="texte" name="telephone" id="telephone"></label><br>
            <label for="user"> Nom d'utilisateur : <input type="texte" name="user" id="user"></label><br>
            <label for="mdp"> Mot de passe : <input type="password" name="mdp" id="mdp"></label><br>
            <input type='submit' value='Valider'>
        </form>
    </body>
</html>


<?php
if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['adresse']) && !empty($_POST['telephone']) && !empty($_POST['user']) && !empty($_POST['mdp'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $adresse = $_POST['adresse'];
    $telephone = $_POST['telephone'];
    $pseudo = $_POST['user'];
    $mdp = $_POST['mdp'];

    $bdd = new PDO('mysql:host=localhost;dbname=projet', 'root', '');
    $bdd->exec("INSERT INTO `client`(`nom`, `prenom`, `telephone`, `adresse`, `pseudo`, `mdp`) VALUES ('$nom','$prenom','$telephone','$adresse','$pseudo','$mdp')")or die(print_r($bdd->errorInfo(), true));
}
?>

