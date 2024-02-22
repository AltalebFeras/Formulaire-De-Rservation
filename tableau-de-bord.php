<?php
session_start();
require 'src/classes/User.php';

if (!isset($_SESSION['connecté']) && empty($_SESSION['user'])) {
  // abort
  header('location: connexion.php');
  die;
}
$user = unserialize($_SESSION['user']);

if (isset($_GET['section'])) {
  switch($_GET['section']){
    case 'compte':
      $section = 'compte';
    break 1;
    case 'reservation':
      $section = 'reservation';
    break 1;
    default:
      $section = null;
    break 1;
  }
} else {
  $section = null;
}
include 'includes/header.php';
?>
<main>
  <?php include 'includes/colonne.php'; ?>
  <div class="content">
    <?php if ($section == "compte") {
      include 'includes/section-compte.php';
    } else { ?>
      <p>Vous n'avez pas encore de réservation.</p>
    <?php } ?>
  </div>
</main>
