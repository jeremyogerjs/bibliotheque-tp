<?php ob_start(); ?>
<?php

function getAction ()
{
    if($_GET['action'] === "create")
    {
        return "index.php?action=create&target=emprunt";
    }
    elseif($_GET['action'] == "update")
    {
        return "index.php?action=update&target=emprunt&id=" .$_GET['id'];
    }
}
?>
<div class="col-5 mx-auto m-5">
<h4 class="my-3"><?= $_GET['action'] === "create" ? "Ajouter un emprunt" : "Modifier un emprunt" ?></h4>
    <form action="<?= getAction(); ?>" method="POST" class="p-4 border border-2 rounded">
        <div class="mb-3">
            <select class="form-select" name="idAdherent" aria-label="Default select example" required>
                <option value="" selected>Selctionner l'adherent</option>
                <?php foreach($optionsAdherent as $result) : ?>
                    <option value="<?= $result['id']; ?>"><?= $result['nom']; ?> <?= $result['prenom']; ?> Nb Emprunt Tot : <?= $result['nbLivreEmprunt']; ?> </option>
                <?php endforeach; ?>
            </select>
            <?php if ($_GET['action'] === "update") : ?>
                <div id="adherent help" class="form-text"><?= $results['nom']; ?> <?= $results['prenom']; ?> Nb Emprunt Tot : <?= $results['nbLivreEmprunt']; ?></div>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <select class="form-select" name="idLivre" aria-label="Default select example" required>
                <option value="" selected>Selectionner les livres ( disponible ) </option>
                <?php foreach($optionsLivre as $result) : ?>
                    <option value="<?= $result['id']; ?>"><?= $result['titre']; ?></option>
                <?php endforeach; ?>
            </select>
            <?php if ($_GET['action'] === "update") : ?>
                <div id="livrehelp" class="form-text">Titre actuel : <?= $results['titre']; ?> </div>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label for="dateEmprunt">Date d'emprunt</label>
            <input type="date" class="form-control" name="dateEmprunt" id="dateEmprunt" required>
            <?php if ($_GET['action'] === "update") : ?>
                <div id="dateEmpruntHelp" class="form-text">Date Emprunt actuel : <?= $results['dateEmprunt']; ?> </div>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label for="dateRetour">Date Retour ( optional )</label>
            <input type="date" class="form-control" name="dateRetour" id="dateEmprunt">
            <?php if ($_GET['action'] === "update") : ?>
                <div id="dateRetourHelp" class="form-text">Date Retour actuel : <?= $results['dateRetour']; ?> </div>
            <?php endif; ?>
        </div>
        <div class="btn-group d-flex justify-content-around">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-warning"><a href="index.php?action=list&target=emprunt" class="text-white text-decoration-none">Retour </a></button>
        </div>
    </form>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('./views/template.php'); ?>