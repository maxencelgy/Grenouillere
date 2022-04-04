<?= $this->extend('templates/default') ?>



<?= $this->section('stylesheet') ?>
<link rel="stylesheet" href="/asset/css/facture.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section id="facture">
    <div class="wrap">
        <div class="head">
            <h1>Facture du date exemple</h1>
            <div class="logo">
                <img src="/asset/img/logo.svg" alt="">
                <h2>Grenouillere</h2>
            </div>
        </div>

        <div class="contacts">
            <div class="contact left">
                <h2>De</h2>
                <h3> Nom de l'entreprise : <?= $company['name_company'] ?> </h3>
                <span> Email : <?= $company['email_company'] ?> </span>
                <span>Nom propriètaire : <?= $company['frist_name_company'].' '.$company['last_name_company'] ?>
                </span>
                <span>Adresse :
                    <?= $company['adress_company'].', '.$company['city_company'].', '.$company['postal_code_company'] ?></span>
                <span>N° Siret : <?= $company['siret_company'] ?></span>
            </div>
            <div class="contact right">
                <h2>Pour</h2>
                <span>Nom : <?= $user['first_name_users'].' '.$user['last_name_users'] ?></span>
                <span>email : <?= $user['email_users']?></span>
                <span>Adresse : </span>
            </div>
        </div>

        <div class="list-facture">
            <h2> Liste des reservations</h2>
            <?php 
                foreach ($slot as $uniqueSlot) {
                    ?>
            <span>Test : <?= $uniqueSlot['id_slot']?></span>
            <br>
            <?php
                }
            ?>
        </div>
    </div>
</section>
<?php
echo('<br> Slot');
echo ('<br>');
echo ('<br>');
var_dump($slot);
echo('<br> Company');
echo ('<br>');
echo ('<br>');
var_dump($company);
echo('<br> Users');
echo ('<br>');
echo ('<br>');
var_dump($user);
echo('<br>');
echo ('<br>');
echo ('<br>');
?>
<?= $this->endSection() ?>