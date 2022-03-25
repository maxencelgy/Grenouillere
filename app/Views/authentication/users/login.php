{# Login template #}
<?= $this->extend('templates/authentication/default') ?>

{# Form login User #}

<?= $this->section('formAuth') ?>
<div class="wrap">
    <h2>Connexion</h2>
    <form action="" method="post">
        <input type="text" name="email_users" placeholder="exemple@gmail.com">
        <span class="error"></span>
        <input type="password" name="password_users" placeholder="Mot de passe">
        <span class="error"></span>
        <input type="submit" name="submitted" value="Envoyer" id="submit">
        <a href="<?= site_url(); ?>particulier/inscription">
            <p>Vous n'avez pas de compte ? <br> Inscrivez-vous</p>
        </a>
    </form>
</div>


<?= $this->endSection() ?>