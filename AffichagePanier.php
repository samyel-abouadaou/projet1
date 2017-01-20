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
$client = $bdd->query("SELECT commande.id, statut.nom, id_statut
FROM `commande` 
JOIN statut ON id_statut = statut.id
WHERE id_client = '" . $_SESSION['droit'] . "'
ORDER BY commande.id    
")->fetchAll()or die(print_r($bdd->errorInfo(), true));


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
ORDER BY commande.id
")->fetchAll();
    $prix = 0;
    foreach ($produit as $key1 => $value1) {
        echo "Nom produit: " . $value1[0] . "<br>Prix produit: " . $value1['prix'] . "<br>Details produit: " . $value1['details'] ."<br><br><br>";
        $prix += $value1['prix'] ;
    }
    echo "Prix total: ".$prix."<br>";
    if ($client[$key]['id_statut'] == 1 && $prix > 0) {
        ?> <input type="submit" value="Payer" class="payer" name="<?php echo $prix; ?>" id="<?php echo $value['id']; ?>" /> <?php
    }
    else{
        echo "statut de la commande: ".$client[$key]['nom']."<br><br><br><br>";
    }
}
?>
<DIV id='message'>

</DIV>