  <?php
  session_start();

  if (isset($_SESSION['connecté']) && !empty($_SESSION['user'])) {
    // abort
    header('location:tableau-de-bord.php');
    die;
  }

  $code_erreur = null;
  if (isset($_GET['erreur'])) {
    $code_erreur = (int) $_GET['erreur'];
  }
  include './includes/header.php';
  ?>
<div id="panier"></div>

  <form action="./src/traitement.php" id="inscription" method="POST" onsubmit="return Validation();">
    <fieldset id="reservation">
      <legend>Réservation</legend>
      <h3>Nombre de réservation(s) :</h3>
      <input type="number" name="nombrePlaces" id="NombrePlaces" required min="1" max="50" />
      <div id="alertBigNumber">Le Nombre de reservation est entre 1 mini et 50 maxi</div>

      <div class="lesTarifs">
        <h3>Réservation(s) en tarif réduit</h3>
        <input type="radio" name="tarif" id="tarifReduit" />
        <label for="tarifReduit">Ma réservation sera en tarif réduit</label>
      </div>
      <div class="card">
        <p class="small-desc">
          <b> Attention !</b>
          <br />
          Si vous choisissez cette option, vous devrez présenter une
          justification à l'entrée.
        </p>
        <p class="DaccordBouton">D'accord</p>
      </div>

      <div id="SectionTarifReduit">
        <!-- tarifs réduits : à n'afficher que si tarif réduit est sélectionné -->
        <div class="divPassReduit">
          <input type="checkbox" name="passSelection" aria-required="true" onchange="toggleCheck(this) , toggleRadio(this)" id="pass1jour" value="pass1jourreduit" />
          <label for="pass1jour">Pass 1 jour : 25€</label>
        </div>
        <div class="divPassReduit">
          <input type="checkbox" name="passSelection" aria-required="true" onchange="toggleCheck(this) , toggleRadio(this) " id="pass2jours" value="pass2joursreduit" />
          <label for="pass2jours">Pass 2 jours : 50€</label>
        </div>
        <div class="divPassReduit">
          <input type="checkbox" name="passSelection" aria-required="true" onchange="toggleCheck(this) , toggleRadio(this)" id="pass3jours" value="pass3joursreduit" />
          <label for="pass3jours">Pass 3 jours : 65€</label>
        </div>
      </div>

      <!-- tarifs normal -->

      <h3>Réservation(s) en tarif normal</h3>
      <input type="radio" name="tarif" id="tarifNormal" />
      <label for="tarifNormal">Ma réservation sera en tarif normal </label>

      <div id="SectionTarifNormal">
        <h3>Choisissez votre formule:</h3>
        <input type="radio" name="passSelection" id="pass1jourNormal" value="pass1jour" />
        <label for="pass1jourNormal">Pass 1 jour : 40€</label>

        <!-- Si case cochée, afficher le choix du jour -->
        <section id="pass1jourDate">
          <div class="divPassNormal">
            <input type="checkbox" name="pass1jour" id="choixJour1" value="choixJour1" aria-required="true" onchange="toggleCheck(this) , toggleRadio(this)" />
            <label for="choixJour1">Pass pour la journée du 01/07</label>
          </div>
          <div class="divPassNormal">
            <input type="checkbox" value="choixJour1" id="choixJour2" value="choixJour2" aria-required="true" onchange="toggleCheck(this) , toggleRadio(this)" />
            <label for="choixJour2">Pass pour la journée du 02/07</label>
          </div>
          <div class="divPassNormal">
            <input type="checkbox" value="choixJour1" id="choixJour3" value="choixJour3" aria-required="true" onchange="toggleCheck(this) , toggleRadio(this)" />
            <label for="choixJour3">Pass pour la journée du 03/07</label>
          </div>
        </section>

        <input type="radio" name="passSelection" id="pass2joursNormal" value="pass2joursNormal" />
        <label for="pass2joursNormal">Pass 2 jours : 70€</label>

        <!-- Si case cochée, afficher le choix des jours -->
        <section id="pass2joursDate">
          <div class="divPassNormal">
            <input type="checkbox" name="pass2jours" id="choixJour12" value="choixJour12" aria-required="true" onchange="toggleCheck(this) , toggleRadio(this)" />
            <label for="choixJour12">Pass pour deux journées du 01/07 au 02/07</label>
          </div>
          <div class="divPassNormal">
            <input type="checkbox" name="pass2jours" id="choixJour23" value="choixJour23" aria-required="true" onchange="toggleCheck(this) , toggleRadio(this)" />
            <label for="choixJour23">Pass pour deux journées du 02/07 au 03/07</label>
          </div>
        </section>

        <input type="radio" name="passSelection" id="pass3joursNormal" value="pass3joursNormal" />
        <label for="pass3joursNormal">Pass 3 jours : 100€</label>

        <section id="pass3joursDate">
          <div class="divPassNormal">
            <input type="checkbox" name="pass3joursNormal" id="choixJour13" value="choixJour13" aria-required="true" onchange="toggleCheck(this) , toggleRadio(this)" />
            <label for="choixJour13">Pass pour trois journées du 01/07 au 03/07</label>
          </div>
        </section>
      </div>
      <!-- FACULTATIF : ajouter un pass groupe (5 adultes : 150€ / jour) uniquement pass 1 jour -->

      <p id="reservationBouton" class="bouton" onclick="suivant('option')">
        Suivant
      </p>
      <p id="alertOption"></p>
    </fieldset>
    <fieldset id="options">
      <legend>Options</legend>
      <h3>Réserver un emplacement de tente :</h3>
      <input type="checkbox" id="tenteNuit1" name="tenteNuit1" />
      <label for="tenteNuit1">Pour la nuit du 01/07 (5€)</label>
      <input type="checkbox" id="tenteNuit2" name="tenteNuit2" />
      <label for="tenteNuit2">Pour la nuit du 02/07 (5€)</label>
      <input type="checkbox" id="tenteNuit3" name="tenteNuit3" />
      <label for="tenteNuit3">Pour la nuit du 03/07 (5€)</label>
      <input type="checkbox" id="tente3Nuits" name="tente3Nuits" />
      <label for="tente3Nuits">Pour les 3 nuits (12€)</label>

      <h3>Réserver un emplacement de camion aménagé :</h3>
      <input type="checkbox" id="vanNuit1" name="vanNuit1" />
      <label for="vanNuit1">Pour la nuit du 01/07 (5€)</label>
      <input type="checkbox" id="vanNuit2" name="vanNuit2" />
      <label for="vanNuit2">Pour la nuit du 02/07 (5€)</label>
      <input type="checkbox" id="vanNuit3" name="vanNuit3" />
      <label for="vanNuit3">Pour la nuit du 03/07 (5€)</label>
      <input type="checkbox" id="van3Nuits" name="van3Nuits" />
      <label for="van3Nuits">Pour les 3 nuits (12€)</label>

      <h3>Venez-vous avec des enfants ?</h3>
      <select name="enfants" id="venirAvecDesEnfants">
        <option value="non">Non</option>
        <option value="oui">Oui</option>
      </select>

      <!-- Si oui, afficher : -->
      <section id="sectionEnfantOption">
        <h4>
          Voulez-vous louer un casque antibruit pour enfants* (2€ / casque) ?
        </h4>
        <label for="nombreCasquesEnfants">Nombre de casques souhaités :</label>
        <div id="alertOptionEnfant" ><p class="alertOptionEnfant" >Veuillez indiquer le nombre de</p></div>
        <input type="number" name="nombreCasquesEnfants" id="nombreCasquesEnfants" min="1" max="5" />
        <div id="alertBigNumberHelmet" ></div>
        <p>*Dans la limite des stocks disponibles.</p>
      </section>

      <h3>Profitez de descentes en luge d'été à tarifs avantageux !</h3>
      <label for="NombreLugesEte">Nombre de descentes en luge d'été :</label>

      <input type="number" name="NombreLugesEte" id="NombreLugesEte" min="1" max="5" />

      <div class="boutonSuivantPrecedentDiv">
        <p class="bouton" id="boutonPrecedentVersReservation">Précédent</p>
        <p id="optionBouton" class="bouton" onclick="suivant('coordonnees')">
          Suivant
        </p>
      </div>
    </fieldset>
    <fieldset id="coordonnees">
      <legend>Coordonnées</legend>
      <label for="nom">Nom :</label>
      <input type="text" name="nom" id="nom" required />
      <label for="prenom">Prénom :</label>
      <input type="text" name="prenom" id="prenom" required />
      <label for="email">Email :</label>
      <input type="email" name="email" id="email" required />

      <label for="password">Mot de passe :</label>
      <input type="password" id="password" name="password" required>
      <label for="password2">Vérifier le Mot de passe :</label>
      <input type="password" id="password2" name="password2" required>

      <label for="telephone">Téléphone :</label>
      <input type="text" name="telephone" id="telephone" required />
      <label for="adressePostale">Adresse Postale :</label>
      <input type="text" name="adressePostale" id="adressePostale" required />

      <div class="boutonSuivantPrecedentDiv">
        <p class="bouton" id="boutonPrecedentVersOption">Précédent</p>
        <input type="submit" name="soumission" class="boutonSubmit" value="Réserver" />
      </div>
    </fieldset>
  </form>