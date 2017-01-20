<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=projet', 'root', '');
?>

<HTML>
    <HEADER>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src='script6.js'></script>
    </HEADER>
    <BODY>

    </BODY>
</HTML>

<?php
$client = $bdd->query("SELECT id, id_statut
FROM `commande` 
WHERE id_client = '" . $_SESSION['droit'] . "'
")->fetchAll()or die(print_r($bdd->errorInfo(), true));

var_dump($client);

foreach ($client as $key => $value) {
    echo "<b>Commande numero: " . $value['id'] . "</b><br><br>";

    $produit = $bdd->query("SELECT produit.nom, produit.prix, produit.details
    FROM `commande` 
    JOIN ligne_commande ON commande.id = ligne_commande.id_commande
    JOIN produit ON produit.id = id_produit
    JOIN client ON client.id = id_client 
    JOIN statut ON statut.id = id_statut
    WHERE client.id = '" . $_SESSION['droit'] . "'
    AND commande.id =  '" . $value['id'] . "'
")->fetchAll()or die(print_r($bdd->errorInfo(), true));
    $prix = 0;
    foreach ($produit as $key1 => $value1) {
        echo "Nom produit: " . $value1[0] . "<br>Prix produit: " . $value1['prix'] . "<br>Details produit: " . "<br><br><br>";
    }
    
    if ($client[$key]['id_statut'] == 1) {
        ?> <input type="submit" value="Payer" id="expedier"/> <?php
    }
    else{
        echo "statut de la commande: ".$client[$key]['id_statut'];
    }
}
?>
<DIV id='message'>

</DIV>
