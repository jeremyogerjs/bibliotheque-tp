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
var_dump($results);
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
    <div class="mb-3">
        <label for="nbLivreEmprunt" class="form-label">Nombre livre emprunter</label>
        <input type="number" class="form-control" id="nbLivreEmprunt" name="nbLivreEmprunt" aria-describedby="nbLivreHelp">
        <div id="nbLivreHelp" class="form-text">indiquez le nombre de livre emprunter.</div>
    </div>
    <div class="mb-3">
    <select class="form-select" name="idRayon" aria-label="Default select example">
        <option selected>Selctionner le rayon</option>
        <?php foreach($results as $result) : ?>
            <option value="<?= $result['id']; ?>"><?= $result['nom']; ?></option>
        <?php endforeach; ?>
    </select>
    </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php $content = ob_get_clean(); ?>
<?php require('./views/template.php'); ?>