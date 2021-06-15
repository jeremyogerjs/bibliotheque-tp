<?php ob_start(); ?>
<div class="card mx-auto" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?= $_GET['target']; ?>s</h5>
    <p class="card-text"><span> Nom : </span> <?= $results['nom'] ?> </p>
    <a href="index.php?action=update&target=<?=$_GET['target']?>&id=<?= $_GET['id'];?>" class="btn btn-primary">Modifier</a>
  </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('./views/template.php'); ?>