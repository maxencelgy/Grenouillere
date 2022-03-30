<?= $this->extend('templates/default') ?>


<?= $this->section('stylesheet') ?>
<link rel="stylesheet" href="/asset/css/home.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?= session()->get("email") ?>

<section id="main">
    <div class="wrap2">
        <!-- <img class="nenu" src="/asset/img/nenuphar.svg" alt=""> -->
        <div class="leftMain">
            <h1>Grenouillere</h1>
            <h2>Recherchez votre garde d'enfant directement <br> grâce au moteur de recherche ci-dessous.</h2>
            <!-- <h2>Trouvez parmi plus de 2000 annonces <br> d’Assitant Martenelle ou de creche <br> qualifiées !</h2> -->
            <form action="" class="filterSearch">
                <!-- <img class="fleurs" src="asset/img/fleurs.svg" alt=""> -->
                <div class="top">
                    <input type="text" name="fullAdresse" id='fullAdresse' placeholder="Choisissez ville ici">
                    <div class="parentSearch">
                        <div class="childrenSearch"></div>
                    </div>

                    <select name="enfant" id="enfant">
                        <option value="">Nombre d'enfant</option>
                    </select>
                    <select name="Journée" id="Journée">
                        <option value="">Journée</option>
                    </select>
                    <select name="Horaire" id="Horaire">
                        <option value="">Horaire</option>
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

<section id="solutions">

    <div class="filtre"></div>
    <img class="bigPic" src="/asset/img/bigPicChildren.jpg" alt="">
    <div class="txtSolutions">
        <h2>Partez sereinement au travail, <br> votre assistante maternelle s'occupe du reste.</h2>
        <a href="">Voir autour de vous</a>
    </div>

</section>

<section id="cards">
    <div class="wrap3">
        <h2>Des solutions de garde adaptée à vos besoins.</h2>

        <div class="wrapCards">
            <div class="card">
                <img src="/asset/img/float.jpg" alt="">
                <h3>Garde <br> à Domicile</h3>
            </div>
            <div class="card">
                <img src="/asset/img/float.jpg" alt="">
                <h3>Garde <br> Partager</h3>
            </div>
            <div class="card">
                <img src="/asset/img/float.jpg" alt="">
                <h3>Garde <br> en Crèche</h3>
            </div>
            <div class="card">
                <img src="/asset/img/float.jpg" alt="">
                <h3>Service <br> garde de nuit</h3>
            </div>
            <div class="card">
                <img src="/asset/img/float.jpg" alt="">
                <h3>Service <br> Disponible 7j /7</h3>
            </div>
        </div>
    </div>
</section>


<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script src="/asset/js/search.js"></script>
<?= $this->endSection() ?>