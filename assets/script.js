// Declaration tous les variables
let SectionTarifReduit = document.getElementById("SectionTarifReduit");
let SectionTarifNormal = document.getElementById("SectionTarifNormal");
let tarifReduit = document.getElementById("tarifReduit");
let tarifNormal = document.getElementById("tarifNormal");
let popUpTarifReduit = document.querySelector(".card");
let daccordBoutonTarifReduit = document.querySelector(".DaccordBouton");
let reservationBouton = document.getElementById("reservationBouton");
let alertOption = document.getElementById("alertOption");
let optionBouton = document.getElementById("optionBouton");
let pass1jour = document.getElementById("pass1jour");
let pass2jours = document.getElementById("pass2jours");
let pass3jours = document.getElementById("pass3jours");
let reservationSection = document.getElementById("reservation");
let optionsSection = document.getElementById("options");
let coordonneesSection = document.getElementById("coordonnees");
let NombrePlaces = document.getElementById("NombrePlaces");
let pass1jourNormal = document.getElementById("pass1jourNormal");
let pass2joursNormal = document.getElementById("pass2joursNormal");
let pass3joursNormal = document.getElementById("pass3joursNormal");
let pass1jourDateSection = document.getElementById("pass1jourDate");
let pass2joursDateSection = document.getElementById("pass2joursDate");
let pass3joursDateSection = document.getElementById("pass3joursDate");
let choixJour1 = document.getElementById("choixJour1");
let choixJour2 = document.getElementById("choixJour2");
let choixJour3 = document.getElementById("choixJour3");
let choixJour12 = document.getElementById("choixJour12");
let choixJour23 = document.getElementById("choixJour23");
let choixJour13 = document.getElementById("choixJour13");
let sectionEnfantOption = document.getElementById("sectionEnfantOption");
let venirAvecDesEnfants = document.getElementById("venirAvecDesEnfants");
let alertOptionEnfant = document.getElementById(" alertOptionEnfant");
let nombreCasquesEnfants = document.getElementById("nombreCasquesEnfants");
let NombreLugesEte = document.getElementById("NombreLugesEte");
let boutonPrecedentVersOption = document.getElementById(
  "boutonPrecedentVersOption"
);
let boutonPrecedentVersReservation = document.getElementById(
  "boutonPrecedentVersReservation"
);

//pour recuperer la valeur du input type number
let nombrePlacesValue = 0;
NombrePlaces.addEventListener("change", function () {
  nombrePlacesValue = parseInt(NombrePlaces.value);
});

//afficher et cacher les tarifs en choissisant les input type radio.
//afficher un alrt pour le tarif réduit.
// afficher le tarif réduit.
tarifReduit.addEventListener("change", function () {
  if (tarifReduit.checked) {
    popUpTarifReduit.style.display = "block";
    SectionTarifReduit.style.display = "flex";
    SectionTarifNormal.style.display = "none";
  } else {
    SectionTarifNormal.style.display = "block";
    SectionTarifReduit.style.display = "none";
    popUpTarifReduit.style.display = "none";
  }
});
//afficher un alrt pour le tarif réduit si l'utilisateur change  sa chois.
//afficher le tarif normal.
tarifNormal.addEventListener("change", function () {
  console.log(NombrePlaces.value);
  if (tarifNormal.checked) {
    popUpTarifReduit.style.display = "none";
    SectionTarifReduit.style.display = "none";
    SectionTarifNormal.style.display = "block";
  } else {
    SectionTarifNormal.style.display = "none";
    SectionTarifReduit.style.display = "block";
  }
});
//afficher et cacher les pass en choissisant les input type radio de tarif normal .

pass1jourNormal.addEventListener("change", function () {
  if (pass1jourNormal.checked) {
    pass1jourDateSection.style.display = "flex";
    pass2joursDateSection.style.display = "none";
    pass3joursDateSection.style.display = "none";
  }
});

pass2joursNormal.addEventListener("change", function () {
  if (pass2joursNormal.checked) {
    pass1jourDateSection.style.display = "none";
    pass2joursDateSection.style.display = "flex";
    pass3joursDateSection.style.display = "none";
  }
});

pass3joursNormal.addEventListener("change", function () {
  if (pass3joursNormal.checked) {
    pass1jourDateSection.style.display = "none";
    pass2joursDateSection.style.display = "none";
    pass3joursDateSection.style.display = "flex";
  }
});
// cacher l'alert pour le dorit de tarif réduit.
daccordBoutonTarifReduit.addEventListener("click", function () {
  popUpTarifReduit.style.display = "none";
  reservationBouton.style.display = "block";
});
// obliger l'utilisateur de choisir un tarif pour pass son reservation
function chooseTariff() {
  if (!tarifReduit.checked && !tarifNormal.checked) {
    alertOption.textContent = "Choisissez un tarif";
    return false;
  }
  return true;
}

//les conditions pour activer le bouton de reservation
reservationBouton.addEventListener("click", function () {
  if (
    chooseTariff() &&
    NombrePlaces.value > 0 && //j'ai indiqué en HTML que l'input type number a un min = 1 et un max = 50. //ces tous les checkbox de tarif normal qui sont cachés
    (pass1jour.checked ||
      pass2jours.checked ||
      pass3jours.checked ||
      choixJour1.checked ||
      choixJour2.checked ||
      choixJour3.checked ||
      choixJour12.checked ||
      choixJour23.checked ||
      choixJour13.checked) //these condition for activate the button
  ) {
    reservationSection.style.display = "none";
    optionsSection.style.display = "block";
    alertOption.style.display = "none";
    console.log("NombrePlaces est = " + NombrePlaces.value); // pour verfier la valeur du input type number aprés avoir passer à la prochaine section .
  } else {
    alertOption.textContent =
      "Veuillez indiquer le nombre de réservations et sélectionner un tarif ainsi qu'un pass.";
  }
});

boutonPrecedentVersReservation.addEventListener("click", function () {
  optionsSection.style.display = "none";
  reservationSection.style.display = "block";
});
boutonPrecedentVersOption.addEventListener("click", function () {
  optionsSection.style.display = "block";
  coordonneesSection.style.display = "none";
});
optionBouton.addEventListener("click", function () {
  optionsSection.style.display = "none";
  coordonneesSection.style.display = "flex";
});

// function pour limiter les mulitiplication de chocher les inputs type checkbox.
// modification ajoutée pour que on puisse cocher les autres inputs dns la section option.car en cliquant sur les input type check box
//la function va cocher un seul input et met les autres input in cochable.
function toggleCheck(checkbox) {
  let fieldset = document.getElementById("options"); // recuperer le fieldset
  let checkboxes = document.querySelectorAll('input[type="checkbox"]');

  if (checkbox.checked) {
    checkboxes.forEach(function (el) {
      if (el !== checkbox && !fieldset.contains(el)) {
        // Exclure  les checkboxes de ce  fieldset
        el.disabled = true;
        alertOption.textContent = "";
      }
    });
  } else {
    alertOption.textContent = "Choisissez un tarif";
    checkboxes.forEach(function (el) {
      if (!fieldset.contains(el)) {
        // Exclure  les checkboxes de ce  fieldset
        el.disabled = false;
      }
    });
  }
}

// function pour limiter les mulitiplication de chocher les inputs type checkbox.

function toggleRadio(radio) {
  if (radio.checked) {
    document.querySelectorAll('input[type="radio"]').forEach(function (el) {
      if (el !== radio) {
        el.disabled = true;
        alertOption.textContent = "";
      }
    });
  } else {
    alertOption.textContent = "Choisissez un tarif";
    document.querySelectorAll('input[type="radio"]').forEach(function (el) {
      el.disabled = false;
    });
  }
}
// pour afficher at cacher la section venir avec des enfants.
venirAvecDesEnfants.addEventListener("change", function () {
  if (venirAvecDesEnfants.value === "non") {
    sectionEnfantOption.style.display = "none";
    alertOptionEnfant.style.display = "none";
  } else if (venirAvecDesEnfants.value === "oui") {
    sectionEnfantOption.style.display = "block";
    alertOptionEnfant.style.display = "none";
  }
});

//pour recuperer la valeur du input type number
let nombreCasquesEnfantsValue = 0;
nombreCasquesEnfants.addEventListener("change", function () {
  nombreCasquesEnfantsValue = parseInt(nombreCasquesEnfants.value);
});
let NombreLugesEteValue = 0;
NombreLugesEte.addEventListener("change", function () {
  NombreLugesEteValue = parseInt(NombreLugesEte.value);
});

// pour s'assurer que la valeur de nombre de casque soit 0 en option non et cacher , si je marque j'en ai besoin 2 casques puis
//j'ai fait non je n'en ai pas besoin , alors le nombre de casque rest 2 c'est pour cela j'ai du le mettre a 0 en option non .
optionBouton.addEventListener("click", function () {
  if (venirAvecDesEnfants.value === "non") {
    nombreCasquesEnfantsValue = 0;
    console.log(" nombre de casque est = " + nombreCasquesEnfantsValue);
  } else if (venirAvecDesEnfants.value === "oui") {
    console.log(" nombre de casque est = " + nombreCasquesEnfantsValue);
  }
});
