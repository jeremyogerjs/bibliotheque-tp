<?php ob_start(); ?>
<?= "<pre>" ?>
<?php var_dump($results); ?>
<?= "</pre>" ?>
<div class="card mx-auto" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?= $_GET['target']; ?>s</h5>
    
        <p class="card-text"><span> Titre : </span> <?= $results['titre'] ?> </p>
        <p class="card-text"><span> Auteur : </span> <?= $results['auteur'] ?> </p>
        <p class="card-text"><span> Disponibilité : </span> <?= $results['disponible'] === "1" ? "Disponible" : "Indisponible" ?> </p>
        <p class="card-text"><span> Rayon : </span> <?= $results['nom'] ?> </p>
    
    <a href="index.php?action=update&target=<?=$_GET['target']?>&id=<?= $_GET['id'];?>" class="btn btn-primary">Modifier</a>
  </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('./views/template.php'); ?>