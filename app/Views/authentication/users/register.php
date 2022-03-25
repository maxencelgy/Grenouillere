{# Login template #}
<?= $this->extend('templates/authentication/default') ?>

{# Form login User #}

<?= $this->section('formAuth') ?>
<h3>
    <a href="<?= site_url(); ?>">Retour à votre situation</a>
</h3>
<h2>Connexion</h2>
<form action="" method="post">
    <input type="text" name="email_users" placeholder="exemple@gmail.com">
    <span class="error"></span>
    <input type="password" name="password_users" placeholder="Mot de passe">
    <span class="error"></span>

    <input type="submit" name="submitted" value="Envoyer" id="submit">
    <p>Vous n'avez pas de compte ? <a href="<?= site_url(); ?>particulier/inscription">Inscrivez-vous</a></p>
</form>

<?= $this->endSection() ?>



























{# Default temlplate #}
<?= $this->extend('templates/default') ?>
{# CSS LINK #}
<?= $this->section('stylesheet') ?>
<link rel="stylesheet" href="/asset/css/register.css">
<?= $this->endSection() ?>

{# Form register Company #}
<?= $this->section('content') ?>
<?= $validation->listErrors(); ?>
<form action="" method="post" class="form">
    <label for="last_name_users">Nom *</label>
    <input type="text" name="last_name_users" placeholder="Nom" id="box-shadow">
    <span class="error"> <?php var_dump( $validation->getErrors('last_name_users')); ?> </span>

    <label for="first_name_users">Prénom *</label>
    <input type="text" name="first_name_users" placeholder="Prenom" id="box-shadow">
    <span class="error"></span>

    <label for="email_users">Email *</label>
    <input type="text" name="email_users" placeholder="exemple@gmail.com" id="box-shadow">
    <span class="error"></span>

    <label for="password_users">Mot de passe *</label>
    <input type="password" name="password_users" id="box-shadow" placeholder="Mot de passe">
    <span class="error"></span>

    <label for="password_users_confirm">Confirmer votre mot de passe *</label>
    <input type="password" name="password_users_confirm" id="box-shadow" placeholder="Confirmer votre mot de passe">
    <span><input name="cgu" type="radio">J’accepte la politique de confidentialité du site</span>
    <input type="submit" name="submitted" value="Envoyer" class="submit" id="box-shadow">
</form>


<?= $this->endSection() ?>