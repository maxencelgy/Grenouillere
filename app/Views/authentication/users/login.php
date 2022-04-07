{# authentication default template #}
<?= $this->extend('templates/authentication/default') ?>

{# Form login User #}

<?= $this->section('formAuth') ?>


<h2>Connexion</h2>
<form action="" method="post">
    <input type="email" name="email_users" placeholder="exemple@gmail.com" value='<?php if(!empty($_POST['email_users'])) echo $_POST['email_users'] ?>'>
    <span class="error">
        <?php  if(!empty($validation->getErrors()['email_users']) && !empty($_POST)) echo $validation->getErrors()['email_users'] ?>
    </span>

    <input type="password" name="password_users" placeholder="Mot de passe">
    <span class="error">
        <?php  if(!empty($validation->getErrors()['password_users'])&& !empty($_POST)) echo $validation->getErrors()['password_users'] ?>
    </span>

    <input type="submit" name="submitted" value="Envoyer" id="submit">
    <a href="<?= site_url(); ?>particulier/inscription">
        <p>Vous n'avez pas de compte ? <br> Inscrivez-vous</p>
    </a>

    <a href="<?= site_url(); ?>particulier/oublie">
        <p>Mot de passe oublié ?</p>
    </a>
</form>


<?= $this->endSection() ?>