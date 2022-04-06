<?= $this->extend('templates/default') ?>


<?= $this->section('stylesheet') ?>
<link rel="stylesheet" href="/asset/css/home.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section id="main">
    <div class="wrap2">
        <!-- <img class="nenuFirst" src="/asset/img/nenuphar.svg" alt=""> -->
        <div class="leftMain">
            <h1>Grenouillere</h1><br>
            <h2>Recherchez votre garde d'enfant directement <br> grâce au moteur de recherche ci-dessous.</h2>
            <!-- <h2>Trouvez parmi plus de 2000 annonces <br> d’Assitant Martenelle ou de creche <br> qualifiées !</h2> -->
            <form action="resultats" method="post" class="filterSearch">
                <!-- <img class="fleurs" src="asset/img/fleurs.svg" alt=""> -->
                <div class="top">
                    <input type="text" name="fullAdresse" id='fullAdresse' placeholder="Choisissez ville ici">
                    <div class="parentSearch">
                        <div class="childrenSearch"></div>
                    </div>

                    <select name="enfant" id="enfant">
                        <option value="1">1 enfant</option>
                        <option value="2">2 enfants</option>
                        <option value="3">3 enfants ou plus</option>
                    </select>
                    <select name="day" id="day">
                        <?php for ($i = 0; $i < 7; $i++) { ?>
                            <option value="<?= strftime("%Y-%m-%d", strtotime("+ $i days")) ?>">
                                <?= strftime("%Y-%m-%d", strtotime("+ $i days")) ?></option>
                        <?php } ?>
                    </select>
                    <select name="horaire" id="horaire">
                        <?php foreach ($planning as $time) { ?>
                            <option value="<?= $time['id_planning'] ?>"><?= $time['libelle_planning'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <br>
                <br>
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
    <div class="wrap">
        <h2>Des solutions de garde adaptée <br> a vos besoins </h2>
        <div class="containe">
            <img class="nenu" src="/asset/img/svg/nenu.svg" alt="">
            <img class="frog" src="/asset/img/svg/frogy.svg" alt="">
            <div class="pic">
                <img src="/asset/img/card.png" alt="">
                <h3>Garde à domicile</h3>
            </div>
            <div class="pic">
                <img src="/asset/img/card2.png" alt="">
                <h3>Garde partager</h3>
            </div>
            <div class="pic">
                <img src="/asset/img/card2.png" alt="">
                <h3>Garde en crèche</h3>
            </div>
            <div class="pic">
                <img src="/asset/img/card3.png" alt="">
                <h3>Service garde de nuit</h3>
            </div>
            <div class="pic">
                <img src="/asset/img/card.png" alt="">
                <h3>Service disponible 7j/7</h3>
            </div>
        </div>
    </div>
</section>

<section id="cards">
    <div class="wrap3">
        <h2>Un Service de Qualitée</h2>
        <div class="cards">

            <div class="card">
                <h2>Qualitée</h2>
                <p>Des profils complets ,
                    vérifier par nos service et un
                    systeme de paiment sécurisée</p>
            </div>
            <div class="card">
                <h2>Confiance</h2>
                <p>>Des profils complets ,
                    vérifier par nos service et un
                    systeme de paiment sécurisée</p>
            </div>
            <div class="card">
                <h2>Mise en relation </h2>
                <p>>Des profils complets ,
                    vérifier par nos service et un
                    systeme de paiment sécurisée</p>
            </div>
        </div>
    </div>
</section>







<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script src="/asset/js/addAdress.js"></script>
<?= $this->endSection() ?>