<?php ob_start(); ?>
<div class="text-center my-3 d-flex justify-content-center">
  <button class="btn btn-success me-2"><a href="index.php?action=create&target=adherent " class="text-white text-decoration-none">Créer adherent</a></button>
  <form class="d-flex" method="POST" action="index.php?action=search&target=adherent">
    <input class="form-control " name="search" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success" type="submit">Search</button>
  </form>
</div>
  <p class="text-muted text-center">Tips: *Impossible de supprimer un adhérent avec au minimum un livre emprunté</p>
<div class="col-9 mx-auto">
<?php if(isset($_GET['statut'])) : ?>
  <?php if($_GET['actioned'] === "list" && $_GET['statut'] === "success") : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Ajout réussi !</strong> 
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php elseif($_GET['actioned'] === "update" && $_GET['statut'] === "success") : ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Modification réussie !</strong> 
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php elseif($_GET['actioned'] === "delete") : ?>
      <?php if($_GET['statut'] === "success") : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Suppression réussie !</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php else :  ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Suppression echoué !</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif;  ?>
  <?php endif; ?>
<?php endif; ?>
  <table class="table table-striped table-hover table-success table-bordered">
    <thead>
      <tr>
        <th scope="col">Nom</th>
        <th scope="col">Prénom</th>
        <th scope="col">Nombre livre empruntés</th>   
      <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
    <?php if(!empty($results)) : ?>
      
      <?php foreach($results as $result) : ?>
        <tr>
            <td><?= $result['nom']; ?></td>
            <td><?= $result['prenom']; ?></td>
            <td><?= $result['nbLivreEmprunt']; ?></td>
            <td class="actions">
              <a href="index.php?action=single&target=<?= $_GET['target']; ?>&id=<?= $result['id'] ?>" class="user text-info"> <i class="fas fa-user-alt"></i></a>
              <a href="index.php?action=update&target=<?= $_GET['target']; ?>&id=<?= $result['id'] ?>" class="edit text-success mx-2"><i class="fas fa-edit"></i></a>
              <a href="index.php?action=delete&target=<?= $_GET['target']; ?>&id=<?= $result['id'] ?>" class="trash text-danger"><i class="fas fa-trash"></i></a>
            </td>
        </tr>
      <?php endforeach; ?>
      <?php else : ?>
        <p class="text-center text-uppercase text-danger">Aucun adhérent</p>
    <?php endif; ?>
    </tbody>
  </table>
</div>



<?php $content = ob_get_clean(); ?>

<?php require ('./views/template.php'); ?>