{# authentication default template #}
<?= $this->extend('templates/authentication/default') ?>

{# Form login User #}

<?= $this->section('formAuth') ?>

<form id="first" class="filterSearch" action="" method="post">

    <input type="text" name="fullAdresse" id='fullAdresse' placeholder="Veuillez saisir votre adresse">
    <div class="parentSearch">
        <div class="childrenSearch"></div>
    </div>

    <span class="error">
        <?php if (!empty($validation->getErrors()['email_company']) && !empty($_POST)) echo $validation->getErrors()['email_company'] ?>
    </span>
    <input type="email" name="email_company" placeholder="exemple@gmail.com"
    value='<?php if(!empty($_POST['email_company'])) echo $_POST['email_company'] ?>'>

    <span class="error">
        <?php if (!empty($validation->getErrors()['name_company']) && !empty($_POST)) echo $validation->getErrors()['name_company'] ?>
    </span>
    <input type="text" name="name_company" placeholder="Leclerc, Carrefour, Renault  ..."
    value='<?php if(!empty($_POST['name_company'])) echo $_POST['name_company'] ?>'>

    <span class="error">
        <?php if (!empty($validation->getErrors()['last_name_company']) && !empty($_POST)) echo $validation->getErrors()['last_name_company'] ?>
    </span>
    <input type="text" name="last_name_company" placeholder="Nom"
    value='<?php if(!empty($_POST['last_name_company'])) echo $_POST['last_name_company'] ?>'>

    <span class="error">
        <?php if (!empty($validation->getErrors()['frist_name_company']) && !empty($_POST)) echo $validation->getErrors()['frist_name_company'] ?>
    </span>
    <input type="text" name="frist_name_company" placeholder="Prenom"
    value='<?php if(!empty($_POST['frist_name_company'])) echo $_POST['frist_name_company'] ?>'>

    <span class="error">
        <?php if (!empty($validation->getErrors()['password_company']) && !empty($_POST)) echo $validation->getErrors()['password_company'] ?>
    </span>
    <input type="password" name="password_company" placeholder="Saisir un mots de passe">

    <span class="error">
        <?php if (!empty($validation->getErrors()['password_company_confirmation']) && !empty($_POST)) echo $validation->getErrors()['password_company_confirmation'] ?>
    </span>
    <input type="password" name="password_company_confirmation" placeholder="Confirmer votre  mot de passe">



    <span class="error">
        <?php if (!empty($validation->getErrors()['siret_company']) && !empty($_POST)) echo  $validation->getErrors()['siret_company']  ?>
    </span>
    <input type="text" name="siret_company" placeholder="Numéro de siret"
    value='<?php if(!empty($_POST['siret_company'])) echo $_POST['siret_company'] ?>'>

    <span class="error">
        <?php if (!empty($validation->getErrors()['hourly_rate_company']) && !empty($_POST)) echo $validation->getErrors()['hourly_rate_company'] ?>
    </span>
    <input type="number" name="hourly_rate_company" placeholder="Taux horaire"
    value='<?php if(!empty($_POST['hourly_rate_company'])) echo $_POST['hourly_rate_company'] ?>'>

    <span class="error">
        <?php if (!empty($validation->getErrors()['child_capacity_company']) && !empty($_POST)) echo $validation->getErrors()['child_capacity_company'] ?>
    </span>
    <input type="number"  name="child_capacity_company" placeholder="nb enfants"
    value='<?php if(!empty($_POST['child_capacity_company'])) echo $_POST['child_capacity_company'] ?>'>

    <span class="error">
        <?php if (!empty($validation->getErrors()['cgu']) && !empty($_POST)) echo $validation->getErrors()['cgu'] ?>
    </span>
    <label for="cgu">J’accepte la politique de confidentialité du site</label>
    <input name="cgu" type="checkbox">


    <input type="submit" name="submitted" value="Envoyer">
</form>

<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script src='/asset/js/addAdress.js'></script>
<?= $this->endSection() ?>