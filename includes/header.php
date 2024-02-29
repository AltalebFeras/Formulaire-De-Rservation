<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Formulaire de réservation Music Vercos Festival</title>
  <link rel="stylesheet" href="../assets/header.css" />
  <script src="./assets/script.js" async></script>
</head>
<div>
      <?php if (isset($_SESSION['connecté'])) { ?>
        <a href="deconnexion.php">Déconnexion</a>
      <?php } else { ?>
    <header>
      <a href="https://www.vercorsmusicfestival.com/" class="header__logo">
        <img src="../logo.png" class="logo" alt="Vercors Music Festival">
      </a>
      <button><a href="connexion.php" class="link">Connexion</a></button>
    </header>
  <?php } ?>
    </div>
