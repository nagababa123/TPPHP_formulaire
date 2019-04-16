<?php
session_start();
$config_bdd["server"] = "localhost";
$config_bdd["name"] = "livredor";
$config_bdd["login"] = "root";
$config_bdd["pass"] = "";
session_start();
if (isset($_SESSION['loginok'])) {
    echo " Vous êtes identifié";
} else {
     echo " Vous n'avais pas le droit de voir cette page";
 
}
try {
    $objBdd = new PDO(
            'mysql:host=' . $config_bdd["server"] . ';dbname=' . $config_bdd["name"] . '; charset=utf8', $config_bdd["login"], $config_bdd["pass"]
    );

    $objBdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $commentaires = $objBdd->query("select * from message"); //requète sql
} catch (Exception $prme) {
    $err_msg = "Attention, il y a problème d'accés à la base de donnée";
//    $err_msg ='Erreur : '.$prme->getMessage();
//    echo "$err_msg";
//    die('Erreur : '. $prme->getmessage());
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <style>
            table
            {
                border-collapse: collapse;
                width: 100%;
            }
            td, th /* Mettre une bordure sur les td ET les th */
            {
                border: 1px solid #357ab7;
                padding: 10px;
                width: auto;
            }
        </style>
        <table>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Commentaire</th>
                <th>Date</th>
            </tr>
            <div>
<?php while ($commentaire = $commentaires->fetch()) { ?>
                    <tr>
                        <td><?php echo $commentaire['nom']; ?></td>
                        <td><?php echo $commentaire['prenom']; ?></td>
                        <td><?php echo $commentaire['commentaire']; ?></td>
                        <td><?php echo $commentaire['date']; ?></td>
                    </tr>
<?php
}
$commentaires->closeCursor(); //fin du while  //libère les ressources de la bdd
$objBdd = null;
?>
        </table>
        <form method="POST" action="action_page.php">
            Nom:<br>
            <input type="text" name="nom" placeholder="Mickey">
            <br>
            Prénom:<br>
            <input type="text" name="prenom" placeholder="Mouse">
            <br>
            Commentaire:<br>
            <textarea name="commentaire" placeholder="ecrivez votre commentaire"></textarea>
            <br>
            <br><br>
            <input type="submit" value="Submit">

        </form> 
    </body>
</html>
