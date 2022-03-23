
<form action="" method="post">
    <input type="text" name="email_users" placeholder="exemple@gmail.com">
    <span class="error"></span>
    <input type="password" name="password_users">
    <span class="error"></span>

    <input type="submit" name="submitted" value="Envoyer">
    <p>Vous n'avez pas de compte ? <a href="<?= site_url(); ?>particulier/inscription">Inscrivez-vous</a></p>
</form>
