<?php ob_start(); ?>
<div class="card mx-auto" style="width: 18rem;">
  <div class="card-body">
    <p class="card-text"><span>Nom : </span> <?= $results['nom'] ?></p>
    <p class="card-text"><span>Prénom : </span> <?= $results['prenom'] ?></p>
    <p class="card-text"><span>Nombre livres empruntés : </span> <?= $results['nbLivreEmprunt'] ?> </p>      
    <a href="index.php?action=update&target=<?=$_GET['target']?>&id=<?= $_GET['id'];?>" class="btn btn-primary">Modifier</a>
  </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('./views/template.php'); ?>