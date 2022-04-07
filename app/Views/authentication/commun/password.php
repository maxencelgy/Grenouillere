{# authentication default template #}
<?= $this->extend('templates/authentication/default') ?>

{# Form login User #}

<?= $this->section('formAuth') ?>

<h2>Veuillez saisir votre email</h2>
<?php 
if(!empty($message))echo $message;

?>
<form action="" method="post">
    <input type="email" name="email" placeholder="exemple@gmail.com" value=''>
    <span class="error">
        <?php /* if(!empty($_POST) && !empty($validation->getErrors()['email_company'])) echo $validation->getErrors()['email_company']  */ ?>
    </span>

    <input type="submit" name="submitted" value="Envoye mail">
    
</form>

<?= $this->endSection() ?>