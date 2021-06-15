<?php ob_start(); ?>
<?php echo "je suis dans la lsite emprunt !!"; ?>
<?php  var_dump($results); ?>

  <table class="table">
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
            <td><?= $result['dateRetour']; ?></td>
            
            <td class="actions">
              <a href="index.php?action=single&target=<?= $_GET['target']; ?>&id=<?= $result['id'] ?>" class="edit"> <i class="fas fa-user fa"></i> </a>
              <a href="index.php?action=update&target=<?= $_GET['target']; ?>&id=<?= $result['id'] ?>" class="edit mx-2"><i class="fas fa-pen fa"></i></a>
              <a href="index.php?action=delete&target=<?= $_GET['target']; ?>&id=<?= $result['id'] ?>" class="trash"><i class="fas fa-trash fa"></i></a>
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