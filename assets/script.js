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

console.log(tarifNormal);

pass1jour.addEventListener("change", function () {
  if (pass1jour.checked) {
    pass2jours.style.display = "none";
    pass3jours.style.display = "none";

  } else {
    pass2jours.style.display = "block";
    pass3jours.style.display = "block";

  }
});
pass2jours.addEventListener("change", function () {
  if (pass2jours.checked) {
    pass1jour.style.display = "none";
    pass3jours.style.display = "none";
  } else {
    pass1jour.style.display = "block";
    pass3jours.style.display = "block";
  }
});
pass3jours.addEventListener("change", function () {
  if (pass3jours.checked) {
    pass2jours.style.display = "none";
    pass1jour.style.display = "none";
  } else {
    pass2jours.style.display = "block";
    pass1jour.style.display = "block";
  }
});

tarifReduit.addEventListener("change", function () {
  console.log(NombrePlaces.value);
  if (tarifReduit.checked) {
    alertOption.style.display = "none";
    popUpTarifReduit.style.display = "block";
    SectionTarifReduit.style.display = "block";
    SectionTarifNormal.style.display = "none";
    reservationBouton.style.display = "none";
  } else {
    SectionTarifNormal.style.display = "block";
    reservationBouton.style.display = "block";
    SectionTarifReduit.style.display = "none";
    popUpTarifReduit.style.display = "none";
  }
});
tarifNormal.addEventListener("change", function () {
  if (tarifNormal.checked) {
    alertOption.style.display = "none";
    popUpTarifReduit.style.display = "none";
    SectionTarifReduit.style.display = "none";
    SectionTarifNormal.style.display = "block";
  } else {
    SectionTarifNormal.style.display = "none";
    reservationBouton.style.display = "block";
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
  if (chooseTariff() && NombrePlaces.value > 0) {
    reservationSection.style.display = "none";
    optionsSection.style.display = "block";
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
      }
    });
  } else {
    alert("Veuillez selectionner la période correspondante.")
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
      }
    });
  } else {
    alert("Veuillez selectionner un Tarif.")
    document.querySelectorAll('input[type="radio"]').forEach(function (el) {
      el.disabled = false;
    });
  }
}
