<?= $this->extend('templates/default') ?>
<?= $this->section('stylesheet') ?>
<link rel="stylesheet" href="/asset/css/auth.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div id="auth__global">
    <div id="auth__container">
        <div class="auth__conditions">
            <h3>Quelle est votre situation ?</h3>

            <div class="cards__container">
                <a href="<?= site_url(); ?>particulier/connexion" class="card__box">
                    <div class="card__logo">
                        <img src="/asset/img/happy.svg" alt="logo particulier">
                    </div>
                    <div class="card__item">
                        <h4>Particulier</h4>
                        <p>Je recherche une crèche ou une nounou</p>
                    </div>
                    <div class="card__arrow">
                        <i class="fa-solid fa-chevron-right"></i>
                    </div>
                </a>

                <a href="<?= site_url(); ?>entreprise/connexion" class="card__box">
                    <div class="card__logo">
                        <img src="/asset/img/happy.svg" alt="logo professionnel">
                    </div>
                    <div class="card__item">
                        <h4>Professionnel</h4>
                        <p>Je suis une crèche ou une nounou</p>
                    </div>
                    <div class="card__arrow">
                        <i class="fa-solid fa-chevron-right"></i>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div id="auth__picture">
        <img src="asset/img/enfant_qui_court.jpg" alt="enfant qui court">
    </div>
</div>

<script src="https://kit.fontawesome.com/501d33add6.js" crossorigin="anonymous"></script>
<?= $this->endSection() ?>