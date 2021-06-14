<?php ob_start(); ?>



<table class="table">
  <thead>
    <tr>

    <?php foreach ($results[0] as $key => $value) : ?>
      <th scope="col"><?= $key ?></th>
    <?php endforeach; ?>
    </tr>
  </thead>
  <tbody>
    
        <?php for($i =0; $i <count($results); $i++) : ?>
        <tr>
            <td><?= print_r($results[$i][$key]); ?></td>
        </tr>
        <?php endfor; ?>
    
  </tbody>
</table>



<?php $content = ob_get_clean(); ?>

<?php require ('template.php'); ?>