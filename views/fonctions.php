<?php
const SQL_DSN = 'mysql:host=localhost;dbname=TP4;charset=utf8';
const SQL_USERNAME = 'root';
const SQL_PASSWORD = '';
$msg = '';
$identifiant='';



  $bdd = new PDO(SQL_DSN, SQL_USERNAME, SQL_PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
  session_start();
  error_reporting(E_ALL);
  ini_set("display_errors", 1);
  //echo 'avant if';
  if (!empty($_POST['identifiant']) && !empty($_POST['mdp'])) {

    $reponse = $bdd->query('SELECT  `psw`,`user` FROM `users`');
    while ($id = $reponse->fetch()){

      if ($id['user'] == $_POST['identifiant'] && password_verify($POST['mdp'],$id['psw'])){
          $_SESSION['identifiant'] = $id['user'];
          $msg ='you\'re connected';
          $identifiant=$id['user'];
          Header('Location: main.php');
      }
      else {

        $msg = 'Wrong password or username';
      }
    }
    $reponse->closeCursor(); // Termine le traitement de la requête
  }


function inscription(){
  $bdd = new PDO(SQL_DSN, SQL_USERNAME, SQL_PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
  $users = $bdd->query('SELECT  `mail`,`user` FROM `users`');
  $msg ='';
  while ($user = $users->fetch()){
    if(( isset($_POST['signup']) && !empty($_POST['id'])) && !empty($_POST['mdp1']) && !empty($_POST['mdp2']) && !empty($_POST['mail'])){
      //echo'zehfbnzkm';
      if($user['user'] == $_POST['id']){
        echo'identifiant deja utilise';
        $msg='false';
      }
      else if ($user['mail'] == $_POST['mail']){
        echo 'email deja utilise';
        $msg='false';
      }
      else if ($_POST['mdp1'] != $_POST['mdp2']){
        echo'les deux mots de passe sont différents';
      }
    }
  }
  if(( isset($_POST['signup']) && !empty($_POST['id'])) && !empty($_POST['mdp1']) && !empty($_POST['mdp2']) && !empty($_POST['mail'])){
    if ($_POST['mdp1'] == $_POST['mdp2'] && $msg==''){
      $hash = password_hash($POST['mdp1'], PASSWORD_DEFAULT);
    //echo 'vous etes inscrit';
      $req = $bdd->prepare('INSERT INTO `users`(`psw`, `mail`, `user`) VALUES (?, ?, ?)');
      $req->execute(array($hash,$_POST['mail'],$_POST['id']));
      echo 'vous etes inscrit';
        Header('Location: login.php');
    }
  }
}
