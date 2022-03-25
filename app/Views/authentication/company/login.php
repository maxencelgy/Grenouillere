{# Login template #}
<?= $this->extend('templates/authentication/default') ?>

{# Form login User #}

<?= $this->section('formAuth') ?>
<h3>
    <a href="<?= site_url(); ?>">Retour à votre situation</a>
</h3>
<h2>Connexion</h2>
<form action="" method="post">
    <input type="text" name="email_company" placeholder="exemple@gmail.com">
    <span class="error"></span>
    <input type="password" name="password_company">
    <span class="error"></span>

    <input type="submit" name="submitted" value="Envoyer">
    <p>Vous n'avez pas de compte ? <a href="<?= site_url(); ?>entreprise/inscription">Inscrivez-vous</a></p>
</form>

<?= $this->endSection() ?>