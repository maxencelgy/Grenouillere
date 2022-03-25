<?= $this->extend('templates/default') ?>
<?= $this->section('content') ?>
<?= $validation->listErrors(); ?>

<link rel="stylesheet" href="/asset/css/user_register.css">

<h2>Particulier Inscription</h2>

<form action="" method="post" class="form">
    <input type="text" name="last_name_users" placeholder="Nom" id="box-shadow">
    <span class="error"></span>
    <input type="text" name="first_name_users" placeholder="Prenom" id="box-shadow">
    <span class="error"></span>
    <input type="text" name="email_users" placeholder="exemple@gmail.com" id="box-shadow">
    <span class="error"></span>
    <input type="password" name="password_users" id="box-shadow" placeholder="Mot de passe">
    <span class="error"></span>
    <input type="password" name="password_users_confirm" id="box-shadow" placeholder="Confirmer votre mot de passe">
    <div class="checkbox">
        <input type="checkbox" id="checkbox"><p>J’accepte la politique de confidentialité du site</p>
    </div>
    <input type="submit" name="submitted" value="Envoyer" class="submit" id="box-shadow">
</form>
<?= $this->endSection() ?>