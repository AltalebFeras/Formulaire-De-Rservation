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
<<<<<<< HEAD
      <?php if (isset($_SESSION['connecté'])) { ?>
        <a href="deconnexion.php">Déconnexion</a>
      <?php } else { ?>
        <a href="connexion.php">Connexion</a>
      <?php } ?>
    </div>
=======
  <?php if (isset($_SESSION['connecté'])) { ?>
    <a href="deconnexion.php">Déconnexion</a>
  <?php } else { ?>
    <header>
      <a href="https://www.vercorsmusicfestival.com/" class="header__logo">
        <img src="../logo.png" class="logo" alt="Vercors Music Festival">
      </a>
      <button><a href="connexion.php" class="link">Connexion</a></button>
      <button><a href="index.php" class="link">Inscription</a></button>
    </header>
  <?php } ?>
</div>
>>>>>>> a801064d35629e09dab3b00521b6c9da0202dc57
