<?php ob_start(); ?>
<div class="d-flex flex-column">
  <div class="my-3 d-flex justify-content-center">
    <button class="btn btn-success me-2"> <a href="index.php?action=create&target=livre " class="text-white text-decoration-none"> Créer un livre </a></button>
    <form class="d-flex" method="POST" action="index.php?action=search&target=livre">
      <input class="form-control " type="search" name="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  </div>
  <div class="d-flex m-2 justify-content-center">
    <button class="btn btn-info my-1" type="button"><a href="index.php?action=filterDispo&target=livre" class="text-dark text-decoration-none">Livres dispo</a></button>
    <button class="btn btn-info my-1 mx-2" type="button"><a href="index.php?action=filterIndispo&target=livre" class="text-dark text-decoration-none">Livres indispo</a></button>
    <button class="btn btn-info my-1" type="button"><a href="index.php?action=list&target=livre" class="text-dark text-decoration-none">Tous les livres</a></button>
  </div>
</div>
<p class="text-muted text-center">Tips : Impossible de supprimer un livre emprunté</p>
<div class="col-9 mx-auto">
<?php if(isset($_GET['statut'])) : ?>
  <?php if($_GET['actioned'] === "list" && $_GET['statut'] === "success") : ?>
    <div class="alert alert-success mx-auto w-50 alert-dismissible fade show" role="alert">
        <strong>Ajout réussi !</strong> 
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php elseif($_GET['actioned'] === "update" && $_GET['statut'] === "success") : ?>
      <div class="alert alert-success mx-auto w-50 alert-dismissible fade show" role="alert">
        <strong>Modification réussie !</strong> 
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php elseif($_GET['actioned'] === "delete"): ?>
      <?php if($_GET['statut'] === "success") : ?>
        <div class="alert alert-success mx-auto w-50 alert-dismissible fade show" role="alert">
          <strong>Suppression réussie !!!!</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php else: ?>
        <div class="alert alert-danger mx-auto w-50 alert-dismissible fade show" role="alert">
          <strong>Suppression echoue !!!</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>
  <?php endif; ?>
<?php endif; ?>
  <table class="table table-striped table-hover table-success table-bordered ">
    <thead>
      <tr>
        <th scope="col">Titre</th>
        <th scope="col">Auteur</th>
        <th scope="col">Disponible</th>   
        <th scope="col">Rayon</th>   
      <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
    <?php if(!empty($results)) : ?>
      
      <?php foreach($results as $result) : ?>
        <tr>
            <td><?= $result['titre']; ?></td>
            <td><?= $result['auteur']; ?></td>
            <td><?= $result['disponible'] === "1" ? "Disponible" : "Indisponible"  ?></td>
            <td><?= $result['nom']; ?></td>
            
            <td class="actions">
              <a href="index.php?action=single&target=<?= $_GET['target']; ?>&id=<?= $result['id'] ?>" class="user text-info"> <i class="fas fa-user-alt"></i></a>
              <a href="index.php?action=update&target=<?= $_GET['target']; ?>&id=<?= $result['id'] ?>" class="edit text-success mx-2"><i class="fas fa-edit"></i></a>
              <a href="index.php?action=delete&target=<?= $_GET['target']; ?>&id=<?= $result['id'] ?>" class="trash text-danger"><i class="fas fa-trash"></i></a>
            </td>
        </tr>
      <?php endforeach; ?>
      <?php else : ?>
        <p class="text-center text-uppercase text-danger">Aucun Livre !</p>
    <?php endif; ?>
    </tbody>
  </table>
</div>



<?php $content = ob_get_clean(); ?>

<?php require ('./views/template.php'); ?>