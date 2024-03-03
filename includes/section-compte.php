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
            <span><?= $user->getNom() ?></span>
            <span><?= $user->getPrenom() ?></span>
            <span><?= $user->getEmail() ?></span>
            <span><?= $user->getRole() ?></span>
        </div>
    </div>
    <button class="suprimerMonCompte" onclick="location.href='src/suppression?surppression=<?= $user->getId() ?>' ">Supprimer mon compte</button>
</section>