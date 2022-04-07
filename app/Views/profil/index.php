<?= $this->extend('templates/default') ?>
<?= $this->section('stylesheet') ?>
<link rel="stylesheet" href="/asset/css/profil.css">
<?= $this->endSection() ?>


<?= $this->section('content') ?>
<?php $userData = $userData[0] ?>

<div class="wrapProfil">
    <section id="profil">
        <h2>Mes informations</h2><br>
        <div class="informations">
            <div class="information">
                <h3>Nom : <?= $userData["last_name_users"] ?></h3><br>
                <h3>Prénom : <?= $userData["first_name_users"] ?></h3><br>
                <h3>Email: <?= $userData["email_users"] ?></h3><br><br>
            </div>
            <div class="information">
                <h3>Adresse : <?= $userData["adress_users"] ?></h3><br>
                <h3>Code Postal : <?= $userData["postal_users"] ?></h3><br>

            </div>
            <div class="information">
                <h3>Ville : <?= $userData["city_users"] ?></h3><br>
                <h3>Télephone : <?= $userData["phone_users"] ?></h3><br>
            </div>
        </div>
        <div class="buttons">
            <a href="<?= site_url(); ?>profil/editUser/<?= session()->get('id') ?>" class="btn">Modifier informations</a>
        </div>
    </section>

    <div class="add">
        <a href="<?= site_url(); ?>create-children" class="addChild">Inscrire mon enfant</a>
    </div>
    <div class="cards">
        <div class="card">
            <h2>Mes enfants </h2>
            <!--Popup Allergie -->
            <div class="filtre">
                <div class="popup">
                    <i class="fa-solid fa-xmark"></i>
                    <form id="child_allergy" class="child_allergy popup_hidden" action="<?= site_url(); ?>children/allergyChild" method="post">
                        <h2>Declarer une allergie</h2>
                        <div class="selectPop">
                            <label for="name_allergy">Quelle allergie ?</label>
                            <select name="fk_allergy" id="fk_allergy">
                                <?php foreach ($allergy as $item) { ?>
                                    <option value="<?= $item['id_allergy'] ?>"><?= $item['name_allergy'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <textarea id="description_allergy" name="description_allergy" rows="5" cols="33" placeholder="Remarques supplémentaires"></textarea>
                        <br>
                        <input type="submit" value="Ajouter">
                    </form>
                </div>
            </div>
            <!--Popup maladie -->

            <div class="popup2 popup">
                <i class="fa-solid fa-xmark"></i>
                <form id="child_disease" class="child_disease popup_hidden" action="<?= site_url(); ?>children/diseaseChild" method="post">
                    <h2>Declarer une Maladie</h2>
                    <div class="selectPop">
                        <label for="fk_disease">Quelle maladie ?</label>
                        <select name="fk_disease" id="fk_disease">
                            <?php foreach ($disease as $item) { ?>
                                <option value="<?= $item['id_disease'] ?>"><?= $item['name_disease'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <textarea id="description_child_disease" name="description_child_disease" rows="5" cols="33" placeholder="Remarques supplémentaires"></textarea>
                    <br>
                    <input type="submit" value="Ajouter">
                </form>
            </div>


            <div class="childrens">
                <?php
                foreach ($childrens as $children) { ?>
                    <div class="childrenCard">
                        <div class="childrenCardLeft">
                            <div class="name">
                                <h2><?= $children['last_name_child'] ?></h2>
                                <h2><?= $children['first_name_child'] ?></h2>
                                <h2><?= date('d-m-Y', strtotime($children['birthday_child'])); ?></h2>
                            </div>
                            <p><?= $children['need_child'] ?></p>
                        </div>


                        <div class="childrenCardRight">
                            <div class="left">
                                <a href="" id="<?= $children["id_child"]; ?>" class="btn_allergy_popup btnChild">Déclarer une allergie</a>
                                <a href="" id="<?= $children["id_child"]; ?>" class="btn_disease_popup btnChild">Déclarer une maladie</a>
                            </div>
                            <div class="right">
                                <a href="/children/modify/<?php echo $children["id_child"]; ?>" class="btnChild edit">Modifier</a>
                                <a href="/children/delete/<?php echo $children["id_child"]; ?>" class="btnChild del">Supprimer</a>
                            </div>
                        </div>
                    </div>
                    <br>
                <?php } ?>
            </div>
        </div>
    </div>

    <section id="reservation">
        <div class="cards">
            <h2>Mes reservation</h2>
            <div class="frame">
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
            <br>

            <a href="/export/all/<?= session()->get("id") ?>" class="">Télécharger le récapitulatif de vos réservations <i class="fa-solid fa-file-arrow-down"></i> </a>
        </div>
    </section>

    <section id="factures">
        <div class="cards">
            <h2>Mes Factures</h2>
            <div class="frame">
                <?php
                if (empty($idFacturePdf)) {
                    echo '<p>Vous n\'avez pas encore de facture.</p>';
                } else {
                ?>
                    <div class='childrens'>
                        <?php
                        foreach ($idFacturePdf as $facture) { ?>
                            <div class='childrenCard'>
                                <p>Facture n° <?= $facture['fk_facture'] ?> du <?= date('d/m/Y', strtotime($facture['date_facture'])) ?> </p>

                                <a href="/profil/facture/<?= $facture['fk_facture'] ?> ">PDF</a>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                <?php
                }
                ?>
            </div>
            <br>
        </div>
    </section>
</div>

<?= $this->endSection() ?>