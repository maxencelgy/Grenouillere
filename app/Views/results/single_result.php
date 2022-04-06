<?= $this->extend('templates/default') ?>


<?= $this->section('stylesheet') ?>
<link rel="stylesheet" href="/asset/css/single.css">
<link rel="stylesheet" href="/asset/css/edit_company.css">


<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="wrap">
    <br> <br> <br> <br>
    <h2><?= $single->name_company ?></h2>
    <br>
    <div id="single_container">
        <div class="single_picture">
            <div class="picture_items">
                <img src="/asset/img/singleFirst.jpeg" alt="image creche">
            </div>
            <div class="picture_items_right">
                <div class="top">
                    <img src="/asset/img/secondFirst.jpeg" alt="image creche">
                    <img src="/asset/img/thirdFirst.jpeg" alt="image creche">
                </div>
                <div class="bottom">
                    <img src="/asset/img/fourFirst.jpeg" alt="image creche">
                    <img src="/asset/img/fiveFirst.jpeg" alt="image creche">
                </div>
            </div>
        </div>
    </div>
    <br>
    <h3><?= $single->name_company ?> à <?= $single->city_company ?>, <?= $single->postal_code_company ?></h3>
    <br>
    <div class="separator"></div>
    <br><br>
    <div class="single_info_container">
        <h2>Informations :</h2>
        <br>
        <div class="single_box">
            <h4>Place disponible : <?= $single->child_capacity_company ?></h4>
            <div class="flex">
                <h4>Adresse : </h4>
                <p><?= $single->adress_company . ', ' . $single->postal_code_company . ', ' . $single->city_company ?></p>
            </div>
            <div class="flex">
                <h4>Taux horaire : </h4>
                <p><?= $single->hourly_rate_company ?>€</p>
            </div>
            <br>
            <h4>Description :</h4>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem consequatur exercitationem fugit hic
                ipsum maiores placeat soluta, temporibus. Accusamus asperiores beatae delectus eveniet molestias nihil
                obcaecati odit omnis quam voluptatum!
            </p>
        </div>
    </div>

    <section id="navigate">
        <div class="navigator">
            <div class="left">
                <?= $this->include('templates/calendar/planning') ?>
            </div>
            <div class="right">
                <h1>MAP</h1>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>


<?= $this->section('js') ?>
<script src="/asset/js/calendarReservation.js"></script>
<?= $this->endSection() ?>