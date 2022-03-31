<?= $this->extend('templates/default') ?>


<?= $this->section('stylesheet') ?>
    <link rel="stylesheet" href="/asset/css/single.css">

<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div id="single_container" class="wrap">
    <h3><?= $single->name_company ?></h3>

    <div class="single_picture">
        <div class="picture_items">
            <img src="/asset/img/illustration_result.jpg" alt="image creche">
        </div>
    </div>

    <h3><?= $single->name_company ?> à <?= $single->city_company ?>, <?= $single->postal_code_company ?></h3>

    <div class="separator"></div>

    <div class="single_info_container">
        <h3>Informations :</h3>
        <div class="single_box">
            <p>Adresse : <?= $single->adress_company.', '.$single->postal_code_company.', '.$single->city_company ?></p>
            <p>Taux horaire : <?= $single->hourly_rate_company ?>€</p>
            <p>Place disponible : <?= $single->child_capacity_company ?></p>
            <h4>Description :</h4>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem consequatur exercitationem fugit hic
                ipsum maiores placeat soluta, temporibus. Accusamus asperiores beatae delectus eveniet molestias nihil
                obcaecati odit omnis quam voluptatum!
            </p>
        </div>
    </div>


</div>


<?= $this->endSection() ?>