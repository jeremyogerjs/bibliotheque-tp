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
            return "index.php?action=update&target=adherent";
        }
    }
?>
<form action="<?= getAction(); ?>" method="POST">
    <div class="mb-3">
        <label for="nom" class="form-label">nom</label>
        <input type="text" class="form-control" id="nom" name="nom" aria-describedby="nomHelp">
        <div id="nomHelp" class="form-text">indiquez le nom de l'adhérent.</div>
    </div>
    <div class="mb-3">
        <label for="prenom" class="form-label">prenom</label>
        <input type="text" class="form-control" id="prenom" name="prenom" aria-describedby="prenomHelp">
        <div id="prenomHelp" class="form-text">indiquez le prenom de l'adhérent.</div>
    </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php $content = ob_get_clean(); ?>
<?php require('./views/template.php'); ?>