{# authentication default template #}
<?= $this->extend('templates/authentication/default') ?>

{# Form login User #}

<?= $this->section('formAuth') ?>

<h2>Connexion</h2>
<form action="" method="post">
    <input type="text" name="email_company" placeholder="exemple@gmail.com"
    value='<?php if(!empty($_POST['email_company'])) echo $_POST['email_company'] ?>'>
    <span class="error">
        <?php  if(!empty($validation->getErrors()['email_company']) && !empty($_POST)) echo $validation->getErrors()['email_company']  ?>
    </span>

    <input type="password" name="password_company" placeholder="Mot de passe">
    <span class="error">
        <?php  if(!empty($validation->getErrors()['password_company']) && !empty($_POST) )  echo $validation->getErrors()['password_company']  ?>
    </span>

    <span class="error"> <?= $connectionError ?> </span>
    <input type="submit" name="submitted" value="Envoyer">
    <a href="<?= site_url(); ?>entreprise/inscription">
        <p>Vous n'avez pas de compte ? Inscrivez-vous</p>
    </a>
    <a href="<?= site_url(); ?>entreprise/oublie">
        <p>Mot de passe oublié ?</p>
    </a>
</form>

<?= $this->endSection() ?>