<?= $this->extend('templates/authentication/default') ?>

<?= $this->section('formAuth') ?>

<form action="" method="post" class="form">

    <input type="text" name="last_name_users" placeholder="Nom" 
    value='<?php if(!empty($_POST['last_name_users'])) echo $_POST['last_name_users'] ?>'>
    <span class="error">
        <?php if (!empty($validation->getErrors()['last_name_users']) && !empty($_POST)) echo $validation->getErrors()['last_name_users'] ?>
    </span>


    <input type="text" name="frist_name_users" placeholder="Prenom" 
    value = '<?php if(!empty($_POST['frist_name_users'])) echo $_POST['frist_name_users'] ?>'>
    <span class="error">
        <?php if (!empty($validation->getErrors()['frist_name_users']) && !empty($_POST) ) echo $validation->getErrors()['frist_name_users'] ?>
    </span>


    <input type="text" name="email_users" placeholder="exemple@gmail.com" 
    value = '<?php if(!empty($_POST['email_users'])) echo $_POST['email_users'] ?>'>
    <span class="error">
        <?php if (!empty($validation->getErrors()['email_users']) && !empty($_POST) ) echo $validation->getErrors()['email_users'] ?>
    </span>


    <input type="password" name="password_users"  placeholder="Mot de passe">
    <span class="error">
        <?php if (!empty($validation->getErrors()['password_users']) && !empty($_POST) ) echo $validation->getErrors()['password_users'] ?>
    </span>

    <input type="password" name="password_users_confirmation"  placeholder="Confirmer votre mot de passe">
    <span class="error">
        <?php if (!empty($validation->getErrors()['password_users_confirmation']) && !empty($_POST)) echo $validation->getErrors()['password_users_confirmation'] ?>
    </span>

    <label for="cgu">J’accepte la politique de confidentialité du site</label>
    <input name="cgu" type="checkbox">
    <span class="error">
        <?php if (!empty($validation->getErrors()['cgu']) && !empty($_POST) ) echo $validation->getErrors()['cgu'] ?>
    </span>

    <input type="submit" name="submitted" value="Envoyer">
</form>

<?= $this->endSection() ?>