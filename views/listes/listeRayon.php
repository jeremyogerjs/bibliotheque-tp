<?php ob_start(); ?>

<div class="text-center my-3 d-flex justify-content-center">
  <button class="btn btn-success me-2"> <a href="index.php?action=create&target=rayon " class="text-white text-decoration-none"> Creer un rayon </a></button>
  <form class="d-flex">
    <input class="form-control " type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success" type="submit">Search</button>
  </form>
</div>
<div class="col-3 mx-auto">
  <table class="table table-striped table-hover table-success table-bordered"> 
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
              <a href="index.php?action=single&target=<?= $_GET['target']; ?>&id=<?= $result['id'] ?>" class="user text-info"> <i class="fas fa-user-alt"></i></a>
              <a href="index.php?action=update&target=<?= $_GET['target']; ?>&id=<?= $result['id'] ?>" class="edit text-success mx-2"><i class="fas fa-edit"></i></a>
              <a href="index.php?action=delete&target=<?= $_GET['target']; ?>&id=<?= $result['id'] ?>" class="trash text-danger"><i class="fas fa-trash"></i></a>
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