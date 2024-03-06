<?php
$url = $_SERVER['REQUEST_URI'];
switch ($url) {
  case str_contains($url, 'tableau-de-bord'):
    $url = 'tableau-de-bord';
  break 1;
  case str_contains($url, 'tableau-admin'):
    $url = 'tableau-admin';
  break 1;

  default:
    $url = 'form';
  break 1;
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Formulaire de réservation Music Vercos Festival</title>
  <link rel="stylesheet" href="../assets/header.css" />
  <link rel="stylesheet" href="./assets/style.css" />

    <script src="./assets/script.js" defer> </script>

</head>
      <?php if (isset($_SESSION['connecté'])) { ?>
        <button> <a href="deconnexion.php" class="link" >Déconnexion</a></button>
      <?php } else { ?>
    <header>
      <a href="http://formulaire-de-rservation/" class="header__logo">
        <img src="../logo.png" class="logo" alt="Vercors Music Festival">
      </a>
      <button><a href="connexion.php" class="link">Connexion</a></button>
    </header>
  <?php } ?>
   
