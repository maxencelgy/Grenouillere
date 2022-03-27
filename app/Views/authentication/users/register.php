{# Login template #}
<?= $this->extend('templates/authentication/default') ?>

{# Form login User #}

<?= $this->section('formAuth') ?>
<div class="wrap">
    <h2>Particulier Inscription</h2>
    <form action="" method="post" class="form">
    
        <input type="text" name="last_name_users" placeholder="Nom" id="box-shadow">
        <span class="error"> </span>

        
        <input type="text" name="first_name_users" placeholder="Prenom" id="box-shadow">
        <span class="error"></span>

        <input type="text" name="email_users" placeholder="exemple@gmail.com" id="box-shadow">
        <span class="error"></span>

        
        <input type="password" name="password_users" id="box-shadow" placeholder="Mot de passe">
        <span class="error"></span>

        <input type="password" name="password_users_confirm" id="box-shadow" placeholder="Confirmer votre mot de passe">
        <div class="rad">
            <input name="cgu" type="radio" id="radio">
            <p>J’accepte la politique de confidentialité du site</p>
        </div>

        <input type="submit" name="submitted" value="Envoyer" class="submit" id="box-shadow">
    </form>
</div>

<?= $this->endSection() ?>