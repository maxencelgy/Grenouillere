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
            </div>
            <div class="information">
                <h3>Prénom : <?= session()->get("frist_name_company") ?></h3>
                <h3>Adresse : </h3>
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
    </div>

    <div class="cards">
        <div class="card">
            <a href="create-children">Inscrire mon enfant</a>
        </div>

        <div class="card">
            <h2>Mes enfants :</h2>

            <!--Popup Allergie -->
            <form id="child_allergy" class="child_allergy popup_hidden" action="<?= site_url(); ?>children/allergyChild" method="post">
                <h2>Declarer une allergie</h2>
                <label for="name_allergy">Quelle allergie ?</label>
                <select name="fk_allergy" id="fk_allergy">
                    <?php foreach($allergy as $item){ ?>
                        <option value="<?= $item['id_allergy'] ?>"><?= $item['name_allergy'] ?></option>
                    <?php } ?>
                </select>
                <br>
                <textarea id="description_allergy" name="description_allergy" rows="5" cols="33" placeholder="Remarques supplémentaires"></textarea>
                <br>
                <input type="submit" value="Ajouter">
            </form>

            <!--Popup maladie -->

            <form id="child_disease" class="child_disease popup_hidden" action="<?= site_url(); ?>children/diseaseChild" method="post">
                <h2>Declarer une Maladie</h2>
                <label for="fk_disease">Quelle maladie ?</label>
                <select name="fk_disease" id="fk_disease">
                    <?php foreach($disease as $item){ ?>
                        <option value="<?= $item['id_disease'] ?>"><?= $item['name_disease'] ?></option>
                    <?php } ?>
                </select>
                <br>
                <textarea id="description_child_disease" name="description_child_disease" rows="5" cols="33" placeholder="Remarques supplémentaires"></textarea>
                <br>
                <input type="submit" value="Ajouter">
            </form>



            <?php
            foreach ($childrens as $children) { ?>
                <div style="background-color: red; border-radius: 0.3rem; width: 50%;">
                    <h2><?= $children['last_name_child'] ?></h2>
                    <h2><?= $children['first_name_child'] ?></h2>
                    <h2><?= $children['need_child'] ?></h2>
                    <h2><?= $children['birthday_child'] ?></h2>
                    <a href="" id="<?= $children["id_child"]; ?>" class="btn_allergy_popup" style="background-color: yellow;">Déclarer une allergie</a>
                    <a href="" id="<?= $children["id_child"]; ?>" class="btn_disease_popup" style="background-color: pink;">Déclarer une maladie</a>
                    <a href="/children/modify/<?php echo $children["id_child"]; ?>" style="background-color: blue;">Modifier</a>
                    <a href="/children/delete/<?php echo $children["id_child"]; ?>" style="background-color: green;">DELETE</a>
                </div>
                <br>


            <?php }

            ?>
        </div>

    </div>




        <a href="/export/all/<?= session()->get("id") ?>" style="padding: .5rem; background-color: violet; margin-top: 1rem; border-radius: .3rem;">TELECHARGER ALL FACTURES</a>
</section>







<!-- <section id="factures">
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
</section> -->

<?= $this->endSection() ?>