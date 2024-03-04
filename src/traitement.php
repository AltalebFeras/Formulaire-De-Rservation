<?php
require 'config.php';
require 'classes/Database.php';
require 'classes/User.php';
require 'classes/Resa.php';

$Database = new Database();

if (
    isset($_POST['prenom']) && isset($_POST['nom'])
    && isset($_POST['email'])
    && isset($_POST['password']) && isset($_POST['password2'])
    && isset($_POST['adressePostale'])
    && isset($_POST['telephone'])
) {

    $prenom = htmlspecialchars($_POST['prenom']);
    $nom = htmlspecialchars($_POST['nom']);
    $adressePostale = htmlspecialchars($_POST['adressePostale']);

    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $email = htmlspecialchars($_POST['email']);
    } else {
        header('location:../index.php?erreur=' . ERREUR_EMAIL);
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

    if (filter_var($_POST['telephone'], FILTER_VALIDATE_INT)) {
        $telephone = $_POST['telephone'];
        if (strlen($telephone) >= 10) {
            $telephone = $telephone;
        } else {
            header('location:../index.php?erreur=' . ERREUR_NUMERO);
            die;
        }
    }
    // Tout s'est bien passé, on peut instancier notre utilisateur :
    $user = new User($nom, $prenom, $email, $password, $adressePostale, $telephone);

    $retour = $Database->saveUtilisateur($user);

    if ($retour) {
        header('location:../connexion.php?succes=inscription');
        die;
    } else {
        header('location:../index.php?erreur=' . ERREUR_ENREGISTREMENT);
        die;
    }

} else {
    header('location:../index.php?erreur=' . ERREUR_CHAMP_VIDE);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombrePlaces = $_POST['nombrePlaces'];
    $tarif = $_POST['tarif'];
    $passSelection = isset($_POST['passSelection']) ? $_POST['passSelection'] : '';
    $options = $_POST['options'];

    if (empty($nombrePlaces) || empty($tarif)) {
        header("Location: ../index.php?error=missing_fields");
        exit;
    }

    $resa = new Resa ($nombrePlaces, $tarif, $passSelection, $options /*add other variables here*/);

    // You can perform any necessary actions with $resa object here

    // Redirecting to reservations page with user info
    header('location:../reservations.php?prenom=' . $prenom . "&nom=" . $nom . "&email=" . $email . "&tarif" . $tarif);
    exit;
} else {
    header("location: ../index.php");
    exit;
}
