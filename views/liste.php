<?php ob_start(); ?>

<?php  var_dump($_POST); ?>
<?php if(!empty($results)) : ?>
  <table class="table">
    <thead>
      <tr>
      <?php foreach ($results[0] as $key => $value) : ?>
        <th scope="col"><?= $key ?></th>
      <?php endforeach; ?>
      <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <?php for($i =0; $i <count($results); $i++) : ?>
      <tr>
      <?php foreach($results[$i] as $result) : ?>
          <td><?= $result; ?></td>
          <?php endforeach; ?>
          <td class="actions">
            <a href="index.php?action=single&target=<?= $_GET['target']; ?>&id=<?= $results[$i]['id'] ?>" class="edit"> <i class="fas fa-user fa-xs"></i> </a>
            <a href="index.php?action=update&target=<?= $_GET['target']; ?>&id=<?= $results[$i]['id'] ?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
            <a href="index.php?action=delete&target=<?= $_GET['target']; ?>&id=<?= $results[$i]['id'] ?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
          </td>
      </tr>
      <?php endfor; ?>
      
    </tbody>
  </table>
<?php else : ?>
  <p>Aucune donnée !</p>
<?php endif; ?>


<?php $content = ob_get_clean(); ?>

<?php require ('template.php'); ?>