<?php ob_start(); ?>
<?php var_dump($results); ?>
<div class="card mx-auto" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?= $_GET['target']; ?>s</h5>
    <?php foreach($results as $key => $value): ?>
        <p class="card-text"><span><?= $key ?> : </span> <?= $value; ?> </p>
    <?php endforeach; ?>
    <a href="index.php?action=update&target=<?=$_GET['target']?>&id=<?= $_GET['id'];?>" class="btn btn-primary">Modifier</a>
    <a href="index.php?action=list&target=<?=$_GET['target']?>" class="btn btn-warning">Retour</a>
  </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>