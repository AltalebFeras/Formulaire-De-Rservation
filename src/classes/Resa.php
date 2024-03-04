<?php

class Reservation {
    private $nombrePlaces;
    private $tarif;
    private $passSelection;
    private $options;
    private $enfants;
    private $nombreCasquesEnfants;
    private $NombreLugesEte;
    private $nom;
    private $prenom;
    private $email;
    private $password;
    private $telephone;
    private $adressePostale;

    public function __construct($nombrePlaces, $tarif, $passSelection, $options, $enfants, $nombreCasquesEnfants, $NombreLugesEte, $nom, $prenom, $email, $password, $telephone, $adressePostale) {
        $this->nombrePlaces = $nombrePlaces;
        $this->tarif = $tarif;
        $this->passSelection = $passSelection;
        $this->options = $options;
        $this->enfants = $enfants;
        $this->nombreCasquesEnfants = $nombreCasquesEnfants;
        $this->NombreLugesEte = $NombreLugesEte;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->password = $password;
        $this->telephone = $telephone;
        $this->adressePostale = $adressePostale;
    }

    public function getTotalPrice() {
        // Calcul du prix total en fonction des options choisies
        // Les tarifs sont définis dans les méthodes privées getTarifPriceReduced() et getTarifPriceNormal()
        $totalPrice = $this->getTarifPrice();

        // Ajouter le prix des options sélectionnées
        foreach ($this->options as $option) {
            $totalPrice += $option['price'];
        }

        return $totalPrice;
    }

    private function getTarifPrice() {
        // Calcul du prix en fonction du type de tarif choisi
        if ($this->tarif == "tarifNormal") {
            return $this->getTarifPriceNormal();
        } elseif ($this->tarif == "tarifReduit") {
            return $this->getTarifPriceReduced();
        }
    }

    private function getTarifPriceReduced() {
        // Définir les tarifs réduits en fonction des choix effectués dans le formulaire
        if ($this->passSelection == "pass1jour") {
            return 25;
        } elseif ($this->passSelection == "pass2jours") {
            return 50;
        } elseif ($this->passSelection == "pass3jours") {
            return 65;
        }
    }

    private function getTarifPriceNormal() {
        // Définir les tarifs normaux en fonction des choix effectués dans le formulaire
        if ($this->passSelection == "pass1jourNormal") {
            return 40;
        } elseif ($this->passSelection == "pass2joursNormal") {
            return 70;
        } elseif ($this->passSelection == "pass3joursNormal") {
            return 100;
        }
    }

    // Vous pouvez ajouter d'autres méthodes selon vos besoins

}

// Exemple d'utilisation de la classe
$reservation = new Reservation(
    $_POST['nombrePlaces'],
    $_POST['tarif'],
    $_POST['passSelection'],
    $_POST['options'], // suppose que les options sont envoyées sous forme de tableau
    $_POST['enfants'],
    $_POST['nombreCasquesEnfants'],
    $_POST['NombreLugesEte'],
    $_POST['nom'],
    $_POST['prenom'],
    $_POST['email'],
    $_POST['password'],
    $_POST['telephone'],
    $_POST['adressePostale']
);

// Obtention du prix total
$totalPrice = $reservation->getTotalPrice();

echo "Le prix total de la réservation est : $totalPrice €";
?>