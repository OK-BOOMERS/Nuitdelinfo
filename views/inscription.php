<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
<link href="style0.css" rel = "stylesheet" src ="style0.css">
  </head>
  <body>
    <?php
    include_once 'fonctions.php';
    inscription();
     ?>
    <form class=""  method="post">
      <input type = "text" class = "form-control" name = "id" placeholder = "identifiant" required autofocus></br>
      <input type = "text" class = "form-control"  name = "mail" placeholder = "mail"  required autofocus></br>
      <input type = "password" class = "form-control"  name = "mdp1" placeholder = "mdp"  required autofocus></br>
      <input type = "password" class = "form-control"  name = "mdp2" placeholder = "confirmer le mdp"  required autofocus></br>
      <button type="input" name="signup">S'inscrire</button>
    </form>
  </body>
</html>
