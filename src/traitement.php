<?php
require 'config.php';
require 'classes/Database.php';
require 'classes/User.php';

$Database = new Database();

if (isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['mail']) && isset($_POST['password']) && isset($_POST['password2']) && isset($_POST['address']) && isset($_POST['numero'])) {

  $prenom = htmlspecialchars($_POST['prenom']);
  $nom = htmlspecialchars($_POST['nom']);
  $address = htmlspecialchars($_POST['address']);

  if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
    $mail = htmlspecialchars($_POST['mail']);
  } else {
    header('location:../index.php?erreur=' . ERREUR_EMAIL);
  }

  if (filter_var($_POST['numero'], FILTER_VALIDATE_INT)) {
    if (strlen($_POST['numero'] = $_POST['numero']) >= 10) {
      $numero = $_POST['numero'];
    } else {
      header('location:../index.php?erreur=' . ERREUR_NUMERO);
      die;
    }
  }

  if ($_POST['password'] === $_POST['password2']) {
    if (strlen($_POST['password']) >= 8) {
      $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    } else {
      header('location:../index.php?erreur=' . ERREUR_PASSWORD_LENGTH);
    }
  } else {
    header('location:../index.php?erreur=' . ERREUR_PASSWORD_IDENTIQUE);
  }

  // Tout s'est bien passé, on peut instancier notre utilisateur :
  $user = new User($nom, $prenom, $mail, $password, $address, $numero);

  $retour = $Database->saveUtilisateur($user);

  if ($retour) {
    header('location:../connexion.php?succes=inscription');
    die;
  } else {
    header('location:../index.php?erreur=' . ERREUR_ENREGISTREMENT);
    die;
  }

  var_dump($user);
} else {
  header('location:../index.php?erreur=' . ERREUR_CHAMP_VIDE);
}
