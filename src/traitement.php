<?php
require 'config.php';
require 'classes/Database.php';
require 'classes/User.php';

$Database = new Database();

if (isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['mail']) && isset ($_POST['password'])) {

    $prenom = htmlspecialchars($_POST['prenom']);
    $nom = htmlspecialchars($_POST['nom']);

    if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
        $mail = htmlspecialchars($_POST['mail']);
    } else {
        header ('location:.../index.php='.ERREUR_EMAIL);
    }

}





?>