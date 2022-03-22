<?= $this->extend('templates/default') ?>


<?= $this->section('stylesheet') ?>
<link rel="stylesheet" href="/asset/css/home.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section id="main">
    <div class="wrap2">
        <img class="nenu" src="/asset/img/nenuphar.svg" alt="">
        <div class="leftMain">

            <h1>Grenouillere</h1>
            <h2>Trouvez parmi plus de 2000 annonces <br> d’Assitant Martenelle ou de creche <br> qualifiées !</h2>
            <form action="" class="filterSearch">
                <img class="fleurs" src="asset/img/fleurs.svg" alt="">
                <div class="top">
                    <select name="ville" id="ville">
                        <option value="">ville</option>
                    </select>
                    <select name="enfant" id="enfant">
                        <option value="">Nombre d'enfant</option>
                    </select>
                    <select name="Journée" id="Journée">
                        <option value="">Journée</option>
                    </select>
                    <select name="Horraire" id="Horraire">
                        <option value="">Horraire</option>
                    </select>
                </div>
                <div class="bottom">
                    <input type="submit" name="submitted" value="Rechercher">
                </div>

            </form>
        </div>
        <div class="rightMain">
            <img src="/asset/img/bigFroag.svg" alt="">
        </div>
    </div>
</section>

<?= $this->endSection() ?>