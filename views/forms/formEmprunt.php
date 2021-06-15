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
        return "index.php?action=update&target=emprunt";
    }
}
// echo "<pre>";
// var_dump($results);
// echo "</pre>";
?>
<div>
<?php if(isset($results)) : ?>
    <?php if($results) : ?>
        <p>Ajout réussi !</p>
        <?php else : ?>
        <p>Ajout fail !</p>
    <?php endif; ?>
<?php endif; ?>

</div>
<div class="col-5 mx- auto">
<h4><?= $_GET['action'] === "create" ? "Ajouter un emprunt" : "Modifier un emprunt" ?></h4>
    <form action="<?= getAction(); ?>" method="POST">
        <div class="mb-3">
            <select class="form-select" name="idAdherent" aria-label="Default select example">
                <option selected>Selctionner l'adherent</option>
                <?php foreach($optionsAdherent as $result) : ?>
                    <option value="<?= $result['id']; ?>"><?= $result['nom']; ?> <?= $result['prenom']; ?> Nb Emprunt Tot : <?= $result['nbLivreEmprunt']; ?> </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <select class="form-select" name="idLivre" aria-label="Default select example">
                <option selected>Selectionner les livres ( disponible ) </option>
                <?php foreach($optionsLivre as $result) : ?>
                    <option value="<?= $result['id']; ?>"><?= $result['titre']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="dateEmprunt">Date d'emprunt</label>
            <input type="date" class="form-control" name="dateEmprunt" id="dateEmprunt">
        </div>
        <div class="mb-3">
            <label for="dateRetour">Date Retour ( optional )</label>
            <input type="date" class="form-control" name="dateRetour" id="dateEmprunt">
        </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('./views/template.php'); ?>