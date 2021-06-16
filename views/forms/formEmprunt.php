<?php ob_start(); ?>
<?php
var_dump($_POST);
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
            <select class="form-select" name="idAdherent" aria-label="Default select example" required>
                <option selected>Selctionner l'adherent</option>
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
                <option selected>Selectionner les livres ( disponible ) </option>
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
            <input type="date" class="form-control" name="dateRetour" id="dateEmprunt" required>
            <?php if ($_GET['action'] === "update") : ?>
                <div id="dateRetourHelp" class="form-text">Date Retour actuel : <?= $results['dateRetour']; ?> </div>
            <?php endif; ?>
        </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('./views/template.php'); ?>