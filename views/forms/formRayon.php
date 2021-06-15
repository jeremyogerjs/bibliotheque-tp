<?php ob_start(); ?>
<?php

    function getAction ()
    {
        if($_GET['action'] === "create")
        {
            return "index.php?action=create&target=rayon";
        }
        elseif($_GET['action'] == "update")
        {
            return "index.php?action=update&target=rayon";
        }
    }
?>
<form action="<?= getAction() ?>" method="POST">

    <label for="nom">Nom :</label>
    <input type="text" name="nom" id="nom" required>
    <button type="submit" class="btn btn-primary"><?= $_GET['action'] === 'create' ?'Submit' : 'Modifier' ?></button>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('./views/template.php'); ?>