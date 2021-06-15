<?php ob_start(); ?>
<?php var_dump($results) ?>
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <p class="card-text"><span>Titre : </span> <?= $results['titre'] ?> </p>
    <p class="card-text"><span>Nom Prénom : </span> <?= $results['nom'] ?> <?= $results['prenom'] ?> </p>
    <p class="card-text"><span>Date d'emprunt : </span> <?= $results['dateEmprunt'] ?> </p>
    <p class="card-text"><span>Date Retour Max : </span> <?= $results['dateRetourMax'] ?> </p>
    <p class="card-text"><span>Date Retour : </span> <?= $results['dateRetour'] ?> </p>        
    <a href="index.php?action=update&target=<?=$_GET['target']?>&id=<?= $_GET['id'];?>" class="btn btn-primary">Modifier</a>
  </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('./views/template.php'); ?>