<?= $this->extend('templates/default') ?>
<?= $this->section('stylesheet') ?>
<link rel="stylesheet" href="/asset/css/profil.css">
<?= $this->endSection() ?>


<?= $this->section('content') ?>


<section id="profil">
    <div class="wrapProfil">
        <h2>Mes informations</h2>
        <div class="informations">
            <div class="information">
                <h3>Nom : <?= session()->get("last_name_company") ?></h3>
                <h3>Email : <?= session()->get("email") ?></h3>
                <h3>Mdp CA SERT à RIEN : </h3>
            </div>
            <div class="information">
                <h3>Prénom : <?= session()->get("frist_name_company") ?></h3>
                <h3>Adresse : </h3>
                <h3>nv mdp Pareil : </h3>
            </div>
            <div class="information">
                <h3>Télephone : </h3>
                <h3>Ville : </h3>
                <h3>Code Postale : </h3>
            </div>
        </div>
    </div>
</section>

<section id="reservation">
    <?php var_dump($reservations) ?>
    <div class="wrapProfil">
        <h2>Vos reservation</h2>
        <i class="fa-solid fa-chevron-down"></i>
    </div>
    <div class="cards">
        <?php foreach ($reservations as $reservation) { ?>
            <div class="card">
                <div class="top">
                    <div class="left">
                        <h2>reservation n°<?= $reservation['id_reservation'] ?></h2>
                        <h3><?= $reservation['last_name_company'] ?> <?= $reservation['frist_name_company'] ?></h3>
                    </div>
                    <div class="right">
                        <h3><?= $reservation['date_slot'] ?></h3>
                    </div>
                </div>
                <div class="bottom">
                    <a href="/export/<?= $reservation["id_reservation"] ?>" class="download">Télecharger cette facture</a>
                </div>
            </div>
        <?php } ?>
        <a href="/export/all" style="padding: .5rem; background-color: violet; margin-top: 1rem; border-radius: .3rem;">TELECHARGER ALL FACTURES</a>
</section>







<section id="factures">
    <div class="wrapProfil">
        <h2>Vos Factures</h2>
        <i class="fa-solid fa-chevron-down"></i>
    </div>

    <div class="cards">
        <div class="card">
            <div class="top">
                <div class="left">
                    <h2>Facture n°1</h2>
                    <h3>Dupont Jean Michel</h3>
                </div>
                <div class="right">
                    <h3>12/02/2022</h3>
                </div>
            </div>
            <div class="bottom">
                <a href="" class="download">Télecharger cette facture</a>
            </div>
        </div>
        <div class="card">
            <div class="top">
                <div class="left">
                    <h2>Facture n°2</h2>
                    <h3>Dupont Jean Michel</h3>
                </div>
                <div class="right">
                    <h3>12/02/2022</h3>
                </div>
            </div>
            <div class="bottom">
                <a href="" class="download">Télecharger cette facture</a>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>