<?= $this->extend('templates/default') ?>
<?= $this->section('stylesheet') ?>
<link rel="stylesheet" href="/asset/css/edit_company.css">

<?= $this->endSection() ?>
<?= $this->section('content') ?>
<?php $companyData = $companyData[0]; ?>

<div class="wrap">
    <section id="edit_container">
        <div class="edit_info_container">
            <br>
            <h2>Mon Profil</h2>
            <div class="global_info">
                <h3>Mes informations: </h3>
                <form method="post" action="<?= site_url(); ?>profil/modify/<?= session()->get("id") ?>">
                    <div class="input_box">
                        <label for="nom">Entreprise :</label>
                        <input type="text" name="nom" id="nom" value="<?= $companyData["name_company"]; ?>"><br>

                        <label for="email">Email :</label>
                        <input type="text" name="email" id="email" value="<?= $companyData["email_company"]; ?>"><br>

                        <label for="postal">Code Postal :</label>
                        <input type="text" name="postal" id="postal" value=" <?= $companyData["postal_code_company"]; ?> "><br>
                    </div>
                    <div class="input_box">
                        <label for="last_name_company">Direction :</label>
                        <input type="text" name="last_name_company" id="last_name_company" value="<?= $companyData["last_name_company"]; ?>"><br>

                        <label for="adress">Adresse :</label>
                        <input type="text" name="adress" id="adress" value="<?= $companyData["adress_company"]; ?>"><br>

                        <label for="siret">SIRET :</label>
                        <input type="text" name="siret" id="siret" value="<?= $companyData["siret_company"]; ?>"><br>
                    </div>
                    <div class="input_box">
                        <label for="capacity">Capacité d'accueil :</label>
                        <input type="text" name="capacity" id="capacity" value="<?= $companyData["child_capacity_company"]; ?>"><br>

                        <label for="city">Ville :</label>
                        <input type="text" name="city" id="city" value="<?= $companyData["city_company"]; ?>"><br>

                        <label for="price">Prix :</label>
                        <input type="text" name="price" id="price" value="<?= $companyData["hourly_rate_company"]; ?>"><br>
                    </div>

                    <div class="input_box">
                        <label for="description">Description :</label>
                        <textarea type="text" name="description" id="description" cols="60" rows="6"><?= $companyData["description_company"]; ?></textarea>
                        <input type="submit" value="Modifier les informations">
                    </div>


                </form>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection() ?>

<?php if ($companyData["status_company"] === "valid") { ?>
    <?= $this->section('content') ?>
    <?= $this->include('templates/calendar/planning') ?>
    <?= $this->endSection() ?>
<?php } else { ?>
    <?= $this->section('content') ?>
    <h3>Votre demande d'inscription professionnel est en attente de validation. Une fois validé, vous pourrez avoir accès au planning.</h3>
    <?= $this->endSection() ?>
<?php } ?>


<?= $this->section('js') ?>
<script src="/asset/js/calendar.js"></script>
<?= $this->endSection() ?>