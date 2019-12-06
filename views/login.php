<!DOCTYPE html>


<?php
include_once 'fonctions.php';
//$msg = '';
 //login($msg);
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>login</title>
    <link href="styles.css?t=<? echo time(); ?>" rel = "stylesheet" src ="style.css">
    <a href="#"></a>
  </head>
  <body>
    <form  role = "form" method="post">
         <h4 class = "form-signin-heading"></h4>
         <h2><?php echo $msg; ?></h2>
         <input type = "text" class = "form-control"
            name = "identifiant" placeholder = "identifiant"
            required autofocus></br>
         <input type = "password" class = "form-control"
            name = "mdp" placeholder = "password" required>
         <button class = "btn btn-lg btn-primary btn-block" type = "submit" name = "login">Se connecter</button>
         <button type="submit" name="s'inscrire"><a href="inscription.php">S'inscrire</a></button>
      </form>
  </body>
</html>
