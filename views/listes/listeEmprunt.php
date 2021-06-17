<?php ob_start(); ?>
<div class="text-center my-3 d-flex justify-content-center">
  <button class="btn btn-success me-2"> <a href="index.php?action=create&target=emprunt " class="text-white text-decoration-none"> Creer un emprunt </a></button>
  <button class="btn btn-info me-2"> <a href="index.php?action=create&target=emprunt " class="text-white text-decoration-none"> Tout les emprunt dispos </a></button>
  <button class="btn btn-info me-2"> <a href="index.php?action=create&target=emprunt " class="text-white text-decoration-none"> Tout les emprunts indispos </a></button>
  <form class="d-flex" method="POST" action="index.php?action=search&target=emprunt">
    <input class="form-control " type="search" name="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success" type="submit">Search</button>
  </form>
</div>
<div class="col-9 mx-auto">
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
              <a href="index.php?action=single&target=<?= $_GET['target']; ?>&id=<?= $result['id'] ?>" class="user text-info"> <i class="fas fa-user-alt"></i></a>
              <a href="index.php?action=update&target=<?= $_GET['target']; ?>&id=<?= $result['id'] ?>" class="edit text-success mx-2"><i class="fas fa-edit"></i></a>
              <a href="index.php?action=delete&target=<?= $_GET['target']; ?>&id=<?= $result['id'] ?>" class="trash text-danger"><i class="fas fa-trash"></i></a>
            </td>
        </tr>
      <?php endforeach; ?>
      <?php else : ?>
      <p>Aucune Emprunt actuellement !</p>
    <?php endif; ?>
    </tbody>
  </table>
</div>



<?php $content = ob_get_clean(); ?>

<?php require ('./views/template.php'); ?>