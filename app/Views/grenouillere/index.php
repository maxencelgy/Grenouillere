<?= $this->extend('templates/default') ?>


<?= $this->section('stylesheet') ?>
<link rel="stylesheet" href="/asset/css/home.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section id="main">
    <div class="wrap2">
        <!-- <img class="nenu" src="/asset/img/nenuphar.svg" alt=""> -->
        <img src="/asset/img/nenuphar.svg" alt="" class="back_1">
        <img src="/asset/img/fleurs.svg" alt="" class="back_2">
        <div class="leftMain">
                <h1>Grenouillere</h1>
                <h2>Trouvez parmi plus de 2000 annonces d’Assitant <br>  Martenelle ou de creche de qualifiées ! </h2>
            <form action="" class="filterSearch">
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
                <div class="bottom">
                    <input type="submit" name="submitted" value="Rechercher">
                </div>
            </form>
        </div>
        <div class="rightMain">
            <img src="/asset/img/logohome.svg" alt="">
        </div>
    </div>
    <div class="bottomMain">
        <img src="/asset/img/mini_grenouille.svg" alt="">
        <i class="fa-solid fa-arrow-down"></i>
    </div>
</section>

<section id="cards">
    <div class="wrap3">
        <h2>Des solutions de garde adaptée à vos besoins.</h2>
        <div class="img">
            <img src="/asset/img/nenuphar_2.svg" alt="" class="back_1">
            <img src="/asset/img/FroagHead.svg" alt="" class="back_2">
        </div>
        <div class="wrapCards">
            <div class="card">
                <img src="/asset/img/cards_1.svg" alt="">
                <h3>Garde à domicile</h3>
            </div>
            <div class="card">
                <img src="/asset/img/cards_2.svg" alt="">
                <h3>Garde partager</h3>
            </div>
            <div class="card">
                <img src="/asset/img/cards_3.svg" alt="">
                <h3>Garde en crèche</h3>
            </div>
            <div class="card">
                <img src="/asset/img/cards_4.svg" alt="">
                <h3>Service garde de nuit</h3>
            </div>
            <div class="card">
                <img src="/asset/img/cards_5.svg" alt="">
                <h3>Service disponible 7j/7</h3>
            </div>
        </div>
    </div>
</section>

<section id="services">
    <div class="wrap4">
        <h2>Un Service de Qualité</h2>
        <div class="boxs">
            <div class="box1">
                <img src="/asset/img/mini_nenuphar_1.svg" alt="" id="box1Nenu1">
                <div class="contentbox1">
                    <h3>Qualité</h3>
                </div>
                <img src="/asset/img/mini_nenuphar_1.svg" alt="" id="box1Nenu2">
            </div>
            <div class="box2">
                <img src="/asset/img/mini_nenuphar_2.svg" alt="" id="box2Nenu1">
                <div class="contentbox2">
                    <h3>Confiance</h3>
                    <p>Des profils complets,<br>vérifier par nos service et un systeme de paiment sécurisée</p>
                </div>
                <img src="/asset/img/mini_nenuphar_2.svg" alt="" id="box2Nenu2">
            </div>
            <div class="box3">
                <img src="/asset/img/mini_nenuphar_3.svg" alt=""id="box3Nenu1">
                <div class="contentbox3">
                    <h3>Mise en relation</h3>
                </div>
                <img src="/asset/img/mini_nenuphar_3.svg" alt="" id="box3Nenu2">
            </div>            
        </div>
    </div>
</section>

<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script src="/asset/js/addAdress.js"></script>
<?= $this->endSection() ?>