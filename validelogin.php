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
        // Start the session
        session_start();
        $login = $_POST['login'];
        $password = $_POST['password'];

        if ($login == "toto" && $password == "titi") {
            $message = "Vous êtes authentifié ! Super";
            $_SESSION["loginok"] = true;
          
        } else {
            $message = "Domage ! on ne vous connait pas !";
        }
        ?>

        <h1><?php echo $message; ?></h1>
        <p><a href="proteger.php">page proteger</a></p>
    </body>
</html>
