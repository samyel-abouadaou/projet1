<?php
session_start();
if (empty($_SESSION['droit'])) {
    header('Location: index.php');
}
elseif ($_SESSION['droit'] == 2)
{
    echo "vous etes admin!";
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