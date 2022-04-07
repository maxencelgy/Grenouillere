{# authentication default template #}
<?= $this->extend('templates/authentication/default') ?>

{# Form login User #}

<?= $this->section('formAuth') ?>

<h2>Veuillez saisir un mot de passe</h2>
<?php 
var_dump($url);

?>
<form action="" method="post">

    <span class="error">
        <?php if (!empty($validation->getErrors()['password_company'])) echo $validation->getErrors()['password_company'] ?>
    </span>
    <input type="password" name="password_company" placeholder="Saisir un mots de passe">

    <span class="error">
        <?php if (!empty($validation->getErrors()['password_company_confirmation'])) echo $validation->getErrors()['password_company_confirmation'] ?>
    </span>
    <input type="password" name="password_company_confirmation" placeholder="Confirmer votre  mot de passe">
    <input type="submit" name="submitted" value="Changer">
    
</form>

<?= $this->endSection() ?>