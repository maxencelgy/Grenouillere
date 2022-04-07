{# authentication default template #}
<?= $this->extend('templates/authentication/default') ?>

{# Form login User #}

<?= $this->section('formAuth') ?>

<h2>Veuillez saisir votre email</h2>
<?php var_dump($_POST);
if(!empty($message))echo $message;

?>
<form action="" method="post">
    <input type="email" name="email_company" placeholder="exemple@gmail.com" value='<?php if(!empty($_POST['email_company'])) echo $_POST['email_company'] ?>'>
    <span class="error">
        <?php /* if(!empty($_POST) && !empty($validation->getErrors()['email_company'])) echo $validation->getErrors()['email_company']  */ ?>
    </span>

    <input type="submit" name="submitted" value="Envoye mail">
    
</form>

<?= $this->endSection() ?>