<div>
      <?php if (isset($_SESSION['connecté'])) { ?>
        <a href="deconnexion.php">Déconnexion</a>
      <?php } else { ?>
        <a href="connexion.php">Connexion</a>
      <?php } ?>
    </div>