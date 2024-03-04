<?php
require "./src/classes/Resa.php";
require "./src/classes/User.php"
?> 

<section class="infos-compte">
    <h3>Mes informations</h3>
    <div class="flex">
        <div class="flex column">
            <span>Nom :</span>
            <span>Prénom :</span>
            <span>Mail :</span>
            <span>Rôle :</span>
        </div>
        <div class="flex column">
            <span><?= $resa->getTarifPrice() ?></span>
            <span><?= $resa->getTarifPriceNormal() ?></span>
            <span><?= $resa->getTarifPriceReduced() ?></span>
            <span><?= $resa->getTotalPrice() ?></span>
        </div>
</section>
    