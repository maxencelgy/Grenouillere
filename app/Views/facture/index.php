<?= $this->extend('templates/default') ?>



<?= $this->section('stylesheet') ?>
<link rel="stylesheet" href="/asset/css/facture.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section id="facture">
    <div class="wrap">
        <div class="head">
            <h1>Facture du <?= $date ?> </h1>
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
                <span>Nom propriètaire : <?= $company['frist_name_company'].' '.$company['last_name_company'] ?> </span>
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
            <div class="title">
                <p> Liste des reservations</p>
                <p> Prix TTC</p>
            </div>
            <div class="factures">
            <?php

            foreach($reservations as $reservation){ ?>                
                <div class="facture">
                    <div class="left">
                        <p>Reservation de : <?= $reservation['first_name_child'] ?> </p>
                        <p>le <?= date('d/m/Y', strtotime($reservation['date_slot'])) ?> </p>
                        <p> de <?= $reservation['libelle_planning'] ?> </p>                  
                    </div>
                    <div class="right">
                        <p>Prix : <?= $company['hourly_rate_company'] * 4 ?> €</p>
                    </div>
                </div>
                <?php
            }  ?>           
            </div>
            <div class="total"> Prix Total (TTC) : <?= $company['hourly_rate_company'] * 4 * count($reservations) ?> €</div>
        
        </div>
</section>
<div class="pdf">
    <div class="wrap">
        <span class="btnPdf">EXPORT PDF</span>        
    </div>
</div>



<?php

?>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js'></script>
<script src='/asset/js/facture.js'></script>
<?= $this->endSection() ?>

