{# authentication default template #}
<?= $this->extend('templates/authentication/default') ?>

{# Form login User #}

<?= $this->section('formAuth') ?>

<h2>Connexion</h2>
<form action="" method="post">
    <input type="text" name="email_company" placeholder="exemple@gmail.com">
    <span class="error">
        <?php  if(!empty($validation->getErrors()['email_company'])) echo $validation->getErrors()['email_company'] ?>
    </span>

    <input type="password" name="password_company" placeholder="Mot de passe">
    <span class="error">
        <?php  if($validation->hasError('password_company')) echo $validation->getErrors()['password_company'] ?>
    </span>

    <input type="submit" name="submitted" value="Envoyer">
    <a href="<?= site_url(); ?>entreprise/inscription">
        <p>Vous n'avez pas de compte ? Inscrivez-vous</p>
    </a>
</form>

<?= $this->endSection() ?>