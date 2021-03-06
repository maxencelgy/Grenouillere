{# authentication default template #}
<?= $this->extend('templates/authentication/default') ?>

{# Form login User #}

<?= $this->section('formAuth') ?>

<h2>Veuillez saisir un mot de passe</h2>

<form action="" method="post">

    <span class="error">
        <?php if (!empty($validation->getErrors()['password']) && !empty($_POST)) echo $validation->getErrors()['password'] ?>
    </span>
    <input type="password" name="password" placeholder="Saisir un mots de passe">

    <span class="error">
        <?php if (!empty($validation->getErrors()['password_confirmation']) && !empty($_POST)) echo $validation->getErrors()['password_confirmation'] ?>
    </span>
    <input type="password" name="password_confirmation" placeholder="Confirmer votre  mot de passe">
    <input type="submit" name="submitted" value="Changer">
    
</form>

<?= $this->endSection() ?>