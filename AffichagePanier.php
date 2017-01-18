<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=projet', 'root', '');
?>

<HTML>
    <HEADER>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src='script5.js'></script>
    </HEADER>
    <BODY>

    </BODY>
</HTML>

<?php

$produit = $bdd->query("SELECT produit.nom, produit.prix, produit.details, commande.id
FROM `ligne_commande` 
JOIN produit ON produit.id = id_produit
JOIN commande ON commande.id = id_commande
JOIN client ON client.id = id_client
WHERE client.id = '".$_SESSION['droit']."' ")->fetchAll()or die(print_r($bdd->errorInfo(), true));
$prix = 0;
foreach ($produit as $key => $value) {
    echo "Nom produit: ".$value['nom']."<br>Prix produit: ".$value['prix']."<br>Numero de commande:".$value['id']."<br>Details produit: ".$value['details']."<br><br><br>";
    $prix += $value['prix'];
}
echo "Le prix total: ".$prix."€.<br><br><br>";
?>
<input type="submit" value="Payer" id='payer' name='<?php echo $prix; ?>' />
<DIV id='message'>

</DIV>

