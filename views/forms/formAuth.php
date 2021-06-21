<?php ob_start() ?>
<?php 
session_start();
var_dump($_POST); 
?>
<?php if($_GET['action'] === 'auth') : ?>
<h5>Login</h5>
    <form action="index.php?action=auth" method="POST">
        <label for="userName">Username</label>
        <input type="text" name="userName">

        <label for="userName">Password</label>
        <input type="password" name="password">
        <input type="submit" value="Connexion">
    </form>
<?php elseif($_GET['action'] === 'signin') : ?>
<h5>S'inscrire</h5>
    <form action="index.php?action=signin" method="POST">
        <label for="userName">Username</label>
        <input type="text" name="userName">

        <label for="userName">Password</label>
        <input type="password" name="password">
        <input type="submit" value="Connexion">
    </form>
<?php endif; ?>
<?php var_dump($_SESSION); ?>
<?php $content = ob_get_clean(); ?>
<?php require('./views/template.php') ?>