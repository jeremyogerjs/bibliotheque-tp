<?php ob_start(); ?>
<?php

    function getAction ()
    {
        if($_GET['action'] === "create")
        {
            return "index.php?action=create&target=adherent";
        }
        elseif($_GET['action'] == "update")
        {
            return "index.php?action=update&target=adherent&id=".$_GET['id'];
        }
    }
?>
<div class="mx-auto mt-5 col-3">
    <h4><?= $_GET['action'] === "create" ? "Créer un adherent" : "Modifier un adherent" ?></h4>
    <form action="<?= getAction(); ?>" method="POST" class="p-4 border border-2 rounded">
        <div class="mb-3">
            <label for="nom" class="form-label">nom</label>
            <input type="text" class="form-control" id="nom" name="nom" aria-describedby="nomHelp" required>
            <?php if($_GET['action'] === "update") : ?>
                <div id="nomHelp" class="form-text">Nom actuel : <?= $results['nom'] ?> </div>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label for="prenom" class="form-label">prenom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" aria-describedby="prenomHelp" required>
            <?php if($_GET['action'] === "update") : ?>
                <div id="prenomHelp" class="form-text">Prénom actuel : <?= $results['prenom'] ?></div>
            <?php endif; ?>
        </div>
        <div class="btn-group d-flex justify-content-around">
            <button type="submit" class="btn btn-primary ms-2">Submit</button>
            <button type="button" class="btn btn-warning"><a href="index.php?action=list&target=adherent" class="text-white text-decoration-none">Retour </a></button>
        </div>
    </form>

</div>

<?php $content = ob_get_clean(); ?>
<?php require('./views/template.php'); ?>