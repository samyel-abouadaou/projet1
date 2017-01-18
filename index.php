<?php session_start(); ?>

<html>
    <header>

    </header>
    <body> 
        <form action="" method="POST">
            <label for="user"> Nom d'utilisateur : <input type="texte" name="user" id="user"></label><br>
            <label for="mdp"> Mot de passe : <input type="password" name="mdp" id="mdp"></label><br>
            <input type='submit' value='Valider'>
        </form>
    </body>
</html>


<?php
if (!empty($_POST['user']) && !empty($_POST['mdp'])) {

    $user = $_POST['user'];
    $mdp = $_POST['mdp'];

    $bdd = new PDO('mysql:host=localhost;dbname=projet', 'root', '');
    $mdp1 = $bdd->query("SELECT mdp, id FROM client WHERE pseudo = '$user'")->fetchAll();
    if ($mdp1[0][0]== $mdp)
    {
        $_SESSION['droit'] = $mdp1[0][1]; 
        header('Location: accueil.php');   
    }
    elseif($user == 'admin' && $mdp == 'admin')
    {
        $_SESSION['droit'] = 'admin'; 
        echo $_SESSION['droit'];
        header('Location: accueil.php');   
    }
    else
    {
        echo "mot de passe incorrecte";
    }
}
?>

