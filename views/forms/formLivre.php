<?php ob_start(); ?>
<?php
var_dump($_POST);
function getAction ()
{
    if($_GET['action'] === "create")
    {
        return "index.php?action=create&target=livre";
    }
    elseif($_GET['action'] == "update")
    {
        return "index.php?action=update&target=livre&id=".$_GET['id'];
    }
};

?>

<form action="<?= getAction() ?>" method="POST" class="col-3 mx-auto">
<h2><?= $_GET['action'] === "create" ? "Ajouter livre" : "Modifier livre"; ?> </h2>
    <div class="mb-3">
        <label for="titre" class="form-label">titre</label>
        <input type="text" class="form-control" id="titre" name="titre" aria-describedby="titreHelp">
        <?php if($_GET['action'] === "update") : ?>
            <div id="titreHelp" class="form-text"><?= $results[0]['titre'] ?></div>
        <?php endif; ?>
    </div>
    <div class="mb-3">
        <label for="auteur" class="form-label">auteur</label>
        <input type="text" class="form-control" id="auteur" name="auteur" aria-describedby="auteurHelp">
        <?php if($_GET['action'] === "update") : ?>
            <div id="titreHelp" class="form-text"><?= $results[0]['auteur'] ?></div>
        <?php endif; ?>
    </div>
    <div class="mb-3">
    
        <select class="form-select" name="idRayon" aria-label="Default select example">
            <option selected>Selectionner le rayon</option>
            <?php foreach($options as $result) : ?>
                <option value="<?= $result['id']; ?>"><?= $result['nom']; ?></option>
            <?php endforeach; ?>
        </select>
        <?php if($_GET['action'] === "update") : ?>
            <div id="titreHelp" class="form-text"><?= $results[0]['nom']; ?></div>
        <?php endif; ?>
    </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php $content = ob_get_clean(); ?>
<?php require('./views/template.php'); ?>