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
<form action="<?= getAction(); ?>" method="POST">
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
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php $content = ob_get_clean(); ?>
<?php require('./views/template.php'); ?>