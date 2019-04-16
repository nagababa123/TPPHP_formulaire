<?php
session_start();
if (isset($_SESSION['loginok'])) {
    echo " Vous êtes identifié";
     echo '<p><a href="logout.php"> Se déconnecter</a></p>';
    
} else {
     echo " Vous n'avais pas le droit de voir cette page";
     echo '<p><a href="login.php">Login</a></p>';
 
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
        // put your code here
        ?>
    </body>
</html>
