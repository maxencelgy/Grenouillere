{# Login template #}
<?= $this->extend('templates/authentication/default') ?>

{# Form login User #}

<?= $this->section('formAuth') ?>
<form action="" method="post">

    <input type="email" name="email_company" placeholder="exemple@gmail.com">
    <span class="error"></span>

    <br><br>
    <input type="text" name="name_company" placeholder="Nom de l'entreprise">
    <span class="error"></span>
    <br><br>
    <br><br>
    <input type="text" name="last_name_company" placeholder="Nom">
    <span class="error"></span>
    <br><br>

    <input type="text" name="frist_name_company" placeholder="Prenom">
    <span class="error"></span>
    <br><br>
    <label for="password_company"> Confirmation mots de passe</label>
    <input type="password" name="password_company" placeholder="Saisir un mots de passe">
    <span class="error"></span>
    <br><br>
    <label for="password_company_confirmation"> Confirmation mots de passe</label>
    <input type="password" name="password_company_confirmation" placeholder="Confirmer votre  mot de passe">
    <span class="error"></span>
    <br><br>

    <label for="siret_company"> Siret</label>
    <br>
    <input type="text" name="siret_company" placeholder="Numéro de siret">
    <span class="error"></span>
    <br><br>

    <label for="hourly_rate_company"> taxu h</label>
    <br>
    <input type="number" name="hourly_rate_company" placeholder="Taux horaire">
    <span class="error"></span>
    <br><br>


    <label for="child_capacity_company"> Capacité</label>
    <br>
    <input type="number" name="child_capacity_company" placeholder="nb enfants">
    <span class="error"></span>
    <br><br>

    <input name="cgu" type="radio">J’accepte la politique de confidentialité du site
    <br><br>
    <input type="submit" name="submitted" value="Envoyer">
</form>

<?= $this->endSection() ?>