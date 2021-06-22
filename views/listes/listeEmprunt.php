<?php ob_start(); ?>
<div class="text-center my-3 d-flex justify-content-center">
  <button class="btn btn-success me-2"> <a href="index.php?action=create&target=emprunt" class="text-white text-decoration-none"> Créer un emprunt </a></button>
  <button class="btn btn-info me-2"> <a href="index.php?action=list&target=emprunt" class="text-white text-decoration-none">Tous les emprunts</a></button>
  <button class="btn btn-info me-2"> <a href="index.php?action=filter&target=emprunt" class="text-white text-decoration-none">Emprunt en cours</a></button>
  <button class="btn btn-info me-2"> <a href="index.php?action=archive&target=emprunt" class="text-white text-decoration-none">Archive Emprunt</a></button>
  <form class="d-flex" method="POST" action="index.php?action=search&target=emprunt">
    <input class="form-control " type="search" name="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success" type="submit">Search</button>
  </form>
</div>
<p class="text-muted text-center">Tips : *Supprimer un emprunt est définitif</p>
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
    <?php elseif($_GET['actioned'] === "delete" && $_GET['statut'] === "success") : ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Suppression réussie !</strong> 
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php elseif($_GET['actioned'] === "validated" && $_GET['statut'] === "success") : ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>L'emprunt a bien été mis a jour !</strong> 
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
  <?php endif; ?>
<?php endif; ?>
  <table class="table table-striped table-hover table-success">
    <thead>
      <tr>
        <th scope="col">Titre</th>
        <th scope="col">Nom Prénom</th>
        <th scope="col">Date Emprunt</th>
        <th scope="col">Date Retour Max</th>
        <th scope="col">Date Retour</th>    
      <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
    <?php if(!empty($results)) : ?>
      
      <?php foreach($results as $result) : ?>
        <tr>
            <td><?= $result['titre']; ?></td>
            <td><?= $result['nom']; ?> <?= $result['prenom']; ?></td>
            <td><?= $result['dateEmprunt']; ?></td>
            <td><?= $result['dateRetourMax']; ?></td>
            <td><?= $result['dateRetour'] == "0000-00-00" ? 'Non défini' : $result['dateRetour'] ?></td>
            
            <td class="actions">
              <a href="index.php?action=single&target=<?= $_GET['target']; ?>&id=<?= $result['id'] ?>" class="user text-info me-2"> <i class="fas fa-user-alt"></i></a>
              <a href="index.php?action=update&target=<?= $_GET['target']; ?>&id=<?= $result['id'] ?>" class="edit text-warning me-2"><i class="fas fa-edit"></i></a>
              <button class="btn btn-outline-success me-2"><a href="index.php?action=validation&target=<?= $_GET['target']; ?>&id=<?= $result['id'] ?>" class="text-decoration-none text-dark" >Valider</a></button>
              <a href="index.php?action=delete&target=<?= $_GET['target']; ?>&id=<?= $result['id'] ?>" class="trash text-danger"><i class="fas fa-trash"></i></a>
            </td>
        </tr>
      <?php endforeach; ?>
      <?php else : ?>
      <p class="text-center text-uppercase text-danger">Aucun Emprunt actuellement !</p>
    <?php endif; ?>
    </tbody>
  </table>
</div>



<?php $content = ob_get_clean(); ?>

<?php require ('./views/template.php'); ?>