<?= $validation->listErrors(); ?>

<form action="" method="post">
    <input type="text" name="last_name_users" placeholder="Nom">
    <span class="error"></span>
    <input type="text" name="first_name_users" placeholder="Prenom">
    <span class="error"></span>
    <input type="text" name="email_users" placeholder="exemple@gmail.com">
    <span class="error"></span>
    <input type="password" name="password_users">
    <span class="error"></span>
    <input type="password" name="password_users_confirm">
    <input type="checkbox">J’accepte la politique de confidentialité du site

    <input type="submit" name="submitted" value="Envoyer">
</form>
