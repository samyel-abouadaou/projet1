<?php
session_start();
if (empty($_SESSION['droit'])) {
    header('Location: index.php');
}
elseif ($_SESSION['droit'] == 'admin')
{
    echo "vous etes admin!";
}
$bdd = new PDO('mysql:host=localhost;dbname=projet', 'root', '');

$panier = $bdd->query("SELECT `id_statut`
FROM commande
WHERE id =
(
    SELECT  MAX(id)
    FROM commande
    )
    AND id_client = '".$_SESSION['droit']."'")->fetchAll() ;


if($panier[0]['id_statut'] == 2 || empty($panier[0]['id_statut']))
{
    $bdd->exec("INSERT INTO `commande`(`id_client`) VALUES ('".$_SESSION['droit']."')")or die(print_r($bdd->errorInfo(), true));
}



?>
<HTML>
    <HEADER>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src='script3.js'></script>
    </HEADER>
    <body>
        <input type="button" value="Deconnexion" id="deco" />
    </BODY>
</HTML>