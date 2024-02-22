<?php
require  'config.php';
require 'classes/Database.php';
require 'classes/User.php';

$Database = new Database();

if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['mail']) && isset($_POST['password']) && isset($_POST['adresse']) && isset($_POST['numero'])) {

    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $adresse = htmlspecialchars($_POST['adresse']);

    if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
        $mail = htmlspecialchars($_POST['mail']);
    } else {
        header('location:../index.php?erreur=' . ERREUR_EMAIL);
    }

    if (filter_var($_POST['numero'],FILTER_VALIDATE_INT)) {
        if (strlen($_POST['numero'] = $_POST['numero']) >=10) {
            $numero = $_POST['numero'];
        } else {
            header('location:../index.php?erreur=' . ERREUR_NUMERO);
            }
    }

    if (strlen($_POST['password']) >= 8) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    } else {
        header('location:../index.php?erreur='. ERREUR_PASSWORD_LENGTH); 
    } 

    $user =new User($nom, $prenom, $mail, $adresse, $numero, $password);
    
    $retour = $Database->saveUtlisateur($user);

    if ($retour) {
        header('location:../connexion.php?success=inscription');
        die;
    } else {
        header('location:../index.php?erreur=' . ERREUR_ENREGISTREMENT);
        die;
    }
    var_dump($user); {

    } else {
        header('location:../indexphp' . ERREUR_CHAMP_VIDE);
    }

}









?>