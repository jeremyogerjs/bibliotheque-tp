
<?php ob_start() ?>
<?php if($_GET['action'] === 'auth') : ?>
<div class="col-3 mx-auto my-5">
    <h5>Login</h5>
    <form action="index.php?action=auth" method="POST">
        <label for="userName">Username</label>
        <input class="form-control <?= $error ? 'is-invalid' : '' ?>" type="text" name="userName" required>

        <label for="userName">Password</label>
        <input class="form-control <?= $error ? 'is-invalid' : '' ?>"  type="password" name="password">`
        <div class="text-helper <?= $error ? "text-danger" : "text-success"  ?>"><?= isset($msg) ? $msg : ''; ?></div>
        <input class="btn btn-success my-2" type="submit" value="Connexion" required>
    </form>
</div>
<?php elseif($_GET['action'] === 'signin') : ?>
<div class="col-3 mx-auto my-5">
    <h5>S'inscrire</h5>
    <form action="index.php?action=signin" method="POST">
        <label for="userName">Username</label>
        <input class="form-control <?= $error ? 'is-invalid' : '' ?>" type="text" name="userName" required>
        <label for="userName">Password</label>
        <input class="form-control <?= $error ? 'is-invalid' : '' ?>" type="password" name="password">
        <div class="text-helper <?= $error ? "text-danger" : "text-success"  ?>"><?= isset($msg) ? $msg : ''; ?></div>
        <input class="btn btn-success my-2" type="submit" value="S'inscrire" required>
    </form>
</div>
<?php endif; ?>

<?php $content = ob_get_clean(); ?>
<?php require('./views/template.php') ?>