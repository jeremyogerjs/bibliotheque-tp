<?php ob_start(); ?>

  <table class="table">
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
            <td class="actions">
              <a href="index.php?action=single&target=<?= $_GET['target']; ?>&id=<?= $result['id'] ?>" class="edit"> <i class="fas fa-user fa-xs"></i> </a>
              <a href="index.php?action=update&target=<?= $_GET['target']; ?>&id=<?= $result['id'] ?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
              <a href="index.php?action=delete&target=<?= $_GET['target']; ?>&id=<?= $result['id'] ?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
            </td>
        </tr>
      <?php endforeach; ?>
      <?php else : ?>
        <p>Aucune donnée !</p>
    <?php endif; ?>
    </tbody>
  </table>



<?php $content = ob_get_clean(); ?>

<?php require ('./views/template.php'); ?>