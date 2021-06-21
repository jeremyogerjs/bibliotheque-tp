<?php ob_start(); ?>
<?php $action = "index.php?action=validation&target=emprunt&id=".$_GET['id']; ?>
<div class="col-5 mx-auto m-5">
<h4 class="my-3"><?= $_GET['action'] === "validation" ? "Retour d'un livre" : "" ?></h4>
    <form action="<?= $action; ?>" method="POST" class="p-4 border border-2 rounded">
        <div class="mb-3">
            <div id="adherent help" class="form-text">Nom complet emprunteur : <?= $results['nom']; ?> <?= $results['prenom']; ?> Nb Emprunt Tot : <?= $results['nbLivreEmprunt']; ?></div>
        </div>
        <div class="mb-3">
            <div id="livrehelp" class="form-text">Titre du livre : <?= $results['titre']; ?> </div>
        </div>
        <div class="mb-3">
            <div id="dateEmpruntHelp" class="form-text">Date Emprunt : <?= $results['dateEmprunt']; ?> </div>
        </div>
        <div class="mb-3">
            <label for="dateRetour">Date Retour</label>
            <input type="date" class="form-control" name="dateRetour" id="dateEmprunt" required>
        </div>
        <div class="btn-group d-flex justify-content-around">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-warning"><a href="index.php?action=list&target=emprunt" class="text-white text-decoration-none">Retour </a></button>
        </div>
    </form>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('./views/template.php'); ?>