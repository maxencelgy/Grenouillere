<?= $this->extend('templates/default') ?>
<?= $this->section('stylesheet') ?>
<link rel="stylesheet" href="/asset/css/edit_company.css">

<?= $this->endSection() ?>
<?= $this->section('content') ?>
<?php $companyData = $companyData[0]; ?>

<section id="edit_container">
    <div class="edit_title">
        <h2>Mon Profil</h2>
    </div>

    <div class="edit_info_container">
        <div class="global_info">
            <fieldset>
                <legend>Mes informations: </legend>
                <form method="post" action="<?= site_url(); ?>profil/modify/<?= session()->get("id") ?>">
                    <div class="input_box">
                        <label for="nom">Entreprise :</label>
                        <input type="text" name="nom" id="nom" value="<?= $companyData["name_company"]; ?>">

                        <label for="email">Email :</label>
                        <input type="text" name="email" id="email" value="<?= $companyData["email_company"]; ?>">

                        <label for="postal">Code Postal :</label>
                        <input type="text" name="postal" id="postal" value=" <?= $companyData["postal_code_company"]; ?> ">
                    </div>
                    <div class="input_box">
                        <label for="last_name_company">Direction :</label>
                        <input type="text" name="last_name_company" id="last_name_company" value="<?= $companyData["last_name_company"]; ?>">

                        <label for="adress">Adresse :</label>
                        <input type="text" name="adress" id="adress" value="<?= $companyData["adress_company"]; ?>">

                        <label for="siret">SIRET :</label>
                        <input type="text" name="siret" id="siret" value="<?= $companyData["siret_company"]; ?>">
                    </div>
                    <div class="input_box">
                        <label for="capacity">Capacité d'accueil :</label>
                        <input type="text" name="capacity" id="capacity" value="<?= $companyData["child_capacity_company"]; ?>">

                        <label for="city">Ville :</label>
                        <input type="text" name="city" id="city" value="<?= $companyData["city_company"]; ?>">

                        <label for="price">Prix :</label>
                        <input type="text" name="price" id="price" value="<?= $companyData["hourly_rate_company"]; ?>">
                    </div>
                    <input type="submit" value="Modifier les informations">
                </form>
            </fieldset>
        </div>
    </div>
</section>


<?= $this->endSection() ?>

<?php if($companyData["status_company"] === "valid"){ ?>
    <?= $this->section('content2') ?>
    <?= $this->include('templates/calendar/planning') ?>
    <?= $this->endSection() ?>
<?php }else{ ?>
    <?= $this->section('content2') ?>
    <h3>Votre demande d'inscription professionnel est en attente de validation. Une fois validé, vous pourrez avoir accès au planning.</h3>
    <?= $this->endSection() ?>
<?php } ?>


<?= $this->section('js') ?>
<script src="/asset/js/calendar.js"></script>

<?= $this->endSection() ?>