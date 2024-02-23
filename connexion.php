<?php
session_start();

if (isset($_SESSION['connecté']) && !empty($_SESSION['user'])) {
  // abort
  header('location:tableau-de-bord.php');
  die;
}

$succes = null;
$echec = null;
if (isset($_GET['succes']) && $_GET['succes'] === "inscription") {
  $succes = true;
}
if (isset($_GET['erreur'])) {
  $echec = true;
}

include "includes/header.php";
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Formulaire de réservation Music Vercos Festival</title>
  <link rel="stylesheet" href="./assets/connexion.css" />
</head>

<body>
  <form action="src/authentication.php" method="post" onsubmit=" return ValidationConnexion()">
    <?php if ($succes) { ?>
      <div class="message succes" id="messageSucces" >
        Votre inscription est validée !
      </div>
      <?php } ?>
      <h1>Connexion</h1>
    <div class="box-input">
      <div class="border">
        <input class="input" type="email" name="mail" id="mail" placeholder="Votre Email" required>
      </div>
    </div>
    <div class="box-input">
      <div class="border">
        <input type="password" name="password" id="password" class="input"  placeholder="Votre mot de pass" required>
      </div>
    </div>
   
    <div id="message"></div>
    <?php if ($echec) { ?>
      <div class="message echec" id="messageEchec" >
      Mot de passe ou email invalide.
    </div>
    <?php } ?>
    <input type="submit" value="Se connecter" class="login-button" >
  </form>
</body>

</html>