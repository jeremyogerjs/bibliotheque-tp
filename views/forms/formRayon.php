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
            return "index.php?action=update&target=rayon&id=".$_GET['id'];
        }
    }
?>
<div class="col-2 mx-auto">
    <form action="<?= getAction() ?>" method="POST" class="p-4 border border-2 rounded">
    
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" placeholder="<?= $_GET['action'] === "update" ? 'actuel : '. $results['nom'] : "" ?>" required>
        <div class="btn-group d-flex justify-content-around my-2">
            <button type="submit" class="btn btn-primary"><?= $_GET['action'] === 'create' ?'Submit' : 'Modifier' ?></button>
            <button type="button" class="btn btn-warning"><a href="index.php?action=list&target=rayon" class="text-white text-decoration-none">Retour </a></button>
        </div>
    </form>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('./views/template.php'); ?>