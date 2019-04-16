<?php
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$commentaire = htmlspecialchars($_POST["commentaire"], ENT_QUOTES);

$config_bdd["server"] = "localhost";
$config_bdd["name"] = "livredor";
$config_bdd["login"] = "root";
$config_bdd["pass"] = "";
try {
    $objBdd = new PDO(
            'mysql:host=' . $config_bdd["server"] . ';dbname=' . $config_bdd["name"] . '; charset=utf8', $config_bdd["login"], $config_bdd["pass"]
    );

    $objBdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $objBdd->query("INSERT INTO message(nom,prenom,commentaire) VALUES ('$nom','$prenom','$commentaire');"); //requète sql
//    $serveur = $_SERVER['HTTP_HOST'];
//    $chemin = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
//    $page ='index.php';
//    header("Location: http://$serveur$chemin/$page");
    require 'index.php';
} catch (Exception $prme) {
    $err_msg = "Attention, il y a problème d'accés à la base de donnée";
//    $err_msg ='Erreur : '.$prme->getMessage();
//    echo "$err_msg";
//    die('Erreur : '. $prme->getmessage());
}

    ?>
    <!DOCTYPE html>
    <!--
    To change this license header, choose License Headers in Project Properties.
    To change this template file, choose Tools | Templates
    and open the template in the editor.
    -->
    <html>
        <head>
            <meta charset="UTF-8">
            <title></title>
        </head>
        <body>
    <?php
    echo $nom . "<br>";
    echo $prenom . "<br>";
    echo $commentaire . "<br>";
    ?>
    </body>
</html>
