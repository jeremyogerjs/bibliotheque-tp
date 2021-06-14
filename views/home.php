<?php ob_start(); ?>
<div>

    <?php var_dump($results); ?>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>