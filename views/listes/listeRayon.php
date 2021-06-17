<?php ob_start(); ?>
<div class="col-3 mx-auto">

  <table class="table table-striped table-hover"> 
    <thead>
      <tr>
        <th scope="col">Nom</th>
      <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
    <?php if(!empty($results)) : ?>
      
      <?php foreach($results as $result) : ?>
        <tr>
            <td><?= $result['nom']; ?></td>
            <td class="">
              <a href="index.php?action=single&target=<?= $_GET['target']; ?>&id=<?= $result['id'] ?>" class="edit"> <i class="fas fa-user fa"></i> </a>
              <a href="index.php?action=update&target=<?= $_GET['target']; ?>&id=<?= $result['id'] ?>" class="edit mx-2"><i class="fas fa-pen fa"></i></a>
              <a href="index.php?action=delete&target=<?= $_GET['target']; ?>&id=<?= $result['id'] ?>" class="trash"><i class="fas fa-trash fa"></i></a>
            </td>
        </tr>
      <?php endforeach; ?>
      <?php else : ?>
        <p>Aucun Rayon !</p>
    <?php endif; ?>
    </tbody>
  </table>


</div>




<?php $content = ob_get_clean(); ?>

<?php require ('./views/template.php'); ?>