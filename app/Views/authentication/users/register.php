<?= $this->extend('templates/authentication/default') ?>

<?= $this->section('formAuth') ?>

<form action="" method="post" class="form">
    <label for="last_name_users">Nom *</label>
    <input type="text" name="last_name_users" placeholder="Nom" >
    <span class="error">
        <?php if (!empty($validation->getErrors()['last_name_users'])) echo $validation->getErrors()['last_name_users'] ?>
    </span>

    <label for="frist_name_users">Prénom *</label>
    <input type="text" name="frist_name_users" placeholder="Prenom" >
    <span class="error">
        <?php if (!empty($validation->getErrors()['frist_name_users'])) echo $validation->getErrors()['frist_name_users'] ?>
    </span>

    <label for="email_users">Email *</label>
    <input type="text" name="email_users" placeholder="exemple@gmail.com" >
    <span class="error">
        <?php if (!empty($validation->getErrors()['email_users'])) echo $validation->getErrors()['email_users'] ?>
    </span>

    <label for="password_users">Mot de passe *</label>
    <input type="password" name="password_users"  placeholder="Mot de passe">
    <span class="error">
        <?php if (!empty($validation->getErrors()['password_users'])) echo $validation->getErrors()['password_users'] ?>
    </span>

    <label for="password_users_confirmation">Confirmer votre mot de passe *</label>
    <input type="password" name="password_users_confirmation"  placeholder="Confirmer votre mot de passe">
    <span class="error">
        <?php if (!empty($validation->getErrors()['password_users_confirmation'])) echo $validation->getErrors()['password_users_confirmation'] ?>
    </span>

    <label for="cgu">J’accepte la politique de confidentialité du site</label>
    <input name="cgu" type="checkbox">
    <span class="error">
        <?php if (!empty($validation->getErrors()['cgu'])) echo $validation->getErrors()['cgu'] ?>
    </span>

    <input type="submit" name="submitted" value="Envoyer">
</form>

<?= $this->endSection() ?>