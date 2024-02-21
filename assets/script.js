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

console.log(choixJour13);

pass1jourNormal.addEventListener("change", function () {
  if (pass1jourNormal.checked) {
    pass1jourDateSection.style.display = "block";
    pass2joursDateSection.style.display = "none";
    pass3joursDateSection.style.display = "none";
  }
});

pass2joursNormal.addEventListener("change", function () {
  if (pass2joursNormal.checked) {
    pass1jourDateSection.style.display = "none";
    pass2joursDateSection.style.display = "block";
    pass3joursDateSection.style.display = "none";
  }
});

pass3joursNormal.addEventListener("change", function () {
  if (pass3joursNormal.checked) {
    pass1jourDateSection.style.display = "none";
    pass2joursDateSection.style.display = "none";
    pass3joursDateSection.style.display = "block";
  }
});

tarifReduit.addEventListener("change", function () {
  console.log(NombrePlaces.value);
  if (tarifReduit.checked) {
    alertOption.style.display = "none";
    popUpTarifReduit.style.display = "block";
    SectionTarifReduit.style.display = "block";
    SectionTarifNormal.style.display = "none";
  } else {
    SectionTarifNormal.style.display = "block";
    SectionTarifReduit.style.display = "none";
    popUpTarifReduit.style.display = "none";
  }
});
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
daccordBoutonTarifReduit.addEventListener("click", function () {
  popUpTarifReduit.style.display = "none";
  reservationBouton.style.display = "block";
});

function chooseTariff() {
  if (!tarifReduit.checked && !tarifNormal.checked) {
    alertOption.textContent = "Choisissez un tarif";
    return false;
  }
  return true;
}
reservationBouton.addEventListener("click", function () {
  if (
    chooseTariff() &&
    NombrePlaces.value > 0 &&
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
  } else {
    alertOption.style.display = "block";
    alertOption.textContent =
      "Veuillez indiquer le nombre de réservations et sélectionner un tarif ainsi qu'un pass.";
  }
});

optionBouton.addEventListener("click", function () {
  optionsSection.style.display = "none";
  coordonneesSection.style.display = "flex";
});

let nombrePlacesValue = 0;

NombrePlaces.addEventListener("change", function () {
  nombrePlacesValue = parseInt(NombrePlaces.value);
  console.log(nombrePlacesValue);
});

function toggleCheck(checkbox) {
  if (checkbox.checked) {
    document.querySelectorAll('input[type="checkbox"]').forEach(function (el) {
      if (el !== checkbox) {
        el.disabled = true;
        alertOption.textContent = "";
      }
    });
  } else {
    alertOption.textContent = "Choisissez un tarif";
    document.querySelectorAll('input[type="checkbox"]').forEach(function (el) {
      el.disabled = false;
    });
  }
}

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
