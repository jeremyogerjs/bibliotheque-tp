<?php ob_start(); ?>
<div class=" text-uppercase  my-5 mx-5">

    <p class="mx-auto">Bienvenue sur le site de la BIbliotheque A NOUS OT's !</p>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>