<?= $this->extend('templates/default') ?>
<?= $this->section('stylesheet') ?>
<link rel="stylesheet" href="/asset/css/profil.css">
<?= $this->endSection() ?>


<?= $this->section('content') ?>
<div class="wrapProfil">
    <section id="profil">
        <h2>Mes informations</h2><br>
        <div class="informations">
            <div class="information">
                <h3>Nom : <?= session()->get("nom") ?></h3><br>
                <h3>Email : <?= session()->get("email") ?></h3><br>
                <h3>Code Postale : <?= session()->get("postal") ?>27100</h3><br><br>
            </div>
            <div class="information">
                <h3>Prénom : <?= session()->get("prenom") ?></h3><br>
                <h3>Adresse : <?= session()->get("adresse") ?>14 rue de la sauvagine</h3><br>

            </div>
            <div class="information">
                <h3>Télephone : <?= session()->get("telephone") ?>0651718409</h3><br>
                <h3>Ville : <?= session()->get("ville") ?>Val de reuil</h3><br>
            </div>
        </div>
        <div class="buttons">
            <a class="btn" href="<?= site_url(); ?>profil/editCompany">Mettre à jour mes informations</a>
        </div>
    </section>

    <section id="administration">
        <h2>Mes documents</h2>
        <div class="administration_status">
            <div class="card">
                <div class="box">
                    <div class="threeBox">
                        <h3>Pièce d'identité : </h3>
                    </div>
                    <div class="threeBox">
                        <?php if (!empty(session()->get("cni_company"))) { ?>
                            <a href="<?= session()->get("cni_company") ?>">Voir le document</a>
                        <?php } else { ?>
                            <p> EN ATTENTE </p>
                        <?php } ?>
                    </div>
                    <div class="threeBox">
                        <a class="btnChild btn_identity_popup" href="">Mettre à jour</a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="box">
                    <div class="threeBox">
                        <h3>Diplôme : </h3>
                    </div>
                    <div class="threeBox">
                        <?php if (!empty(session()->get("certificate_company"))) { ?>
                            <a href="<?= session()->get("certificate_company") ?>">Voir le document</a>
                        <?php } else { ?>
                            <p> EN ATTENTE </p>
                        <?php } ?>
                    </div>
                    <div class="threeBox">
                        <a class="btnChild btn_certificate_popup" href="">Mettre à jour</a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="box">
                    <div class="threeBox">
                        <h3>Autorisation préfectorale : </h3>
                    </div>
                    <div class="threeBox">
                        <?php if (!empty(session()->get("licence_company"))) { ?>
                            <a href="<?= session()->get("licence_company") ?>">Voir le document</a>
                        <?php } else { ?>
                            <p> EN ATTENTE </p>
                        <?php } ?>
                    </div>
                    <div class="threeBox">
                        <a class="btnChild btn_licence_popup" href="">Mettre à jour</a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="box">
                    <div class="threeBox">
                        <h3>Extrait Kbis : </h3>
                    </div>
                    <div class="threeBox">
                        <?php if (!empty(session()->get("kbis_company"))) { ?>
                            <a href="<?= session()->get("kbis_company") ?>">Voir le document</a>
                        <?php } else { ?>
                            <p> EN ATTENTE </p>
                        <?php } ?>
                    </div>
                    <div class="threeBox">
                        <a class="btnChild btn_kbis_popup" href="">Mettre à jour</a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="box">
                    <div class="threeBox">
                        <h3>RIB : </h3>
                    </div>
                    <div class="threeBox">
                        <?php if (!empty(session()->get("rib_company"))) { ?>
                            <a href="<?= session()->get("rib_company") ?>">Voir le document</a>
                        <?php } else { ?>
                            <p> EN ATTENTE </p>
                        <?php } ?>
                    </div>
                    <div class="threeBox">
                        <a class="btnChild btn_rib_popup" href="">Mettre à jour</a>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!--Popup rib -->

    <div class="filtre">

        <div class="popup popup1">
            <i class="fa-solid fa-xmark"></i>
            <form class="rib_popup popup_hidden" action="<?= site_url(); ?>add/addFiles/<?= session()->get("id") ?>" enctype="multipart/form-data" method="post">
                <h2>Ajouter un rib</h2>
                <label for="rib_company">RIB</label>
                <input name="rib_company" type="file">
                <input type="submit" value="Mettre à jour">
            </form>
        </div>
    </div>

    <!-- Popup Identité -->

    <div class="popup popup2">
        <i class="fa-solid fa-xmark"></i>
        <form class="identity_popup popup_hidden" action="<?= site_url(); ?>add/addFiles/<?= session()->get("id") ?>" enctype="multipart/form-data" method="post">
            <h2>Ajouter une pièce d'identité</h2>
            <label for="identity_company">Pièce d'identié :</label>
            <input name="identity_company" type="file">
            <input type="submit" value="Mettre à jour">
        </form>
    </div>

    <!-- Popup Diplome -->

    <div class="popup popup3">
        <i class="fa-solid fa-xmark"></i>
        <form class="certificate_popup popup_hidden" action="<?= site_url(); ?>add/addFiles/<?= session()->get("id") ?>" enctype="multipart/form-data" method="post">
            <h2>Ajouter un diplôme :</h2>
            <label for="certificate_company">Diplôme :</label>
            <input name="certificate_company" type="file">
            <input type="submit" value="Mettre à jour">
        </form>
    </div>

    <!-- Popup licence  -->

    <div class="popup popup4">
        <i class="fa-solid fa-xmark"></i>
        <form class="licence_popup popup_hidden" action="<?= site_url(); ?>add/addFiles/<?= session()->get("id") ?>" enctype="multipart/form-data" method="post">
            <h2>Ajouter une autorisation préfectorale :</h2>
            <label for="licence_company">Attestation :</label>
            <input name="licence_company" type="file">
            <input type="submit" value="Mettre à jour">
        </form>
    </div>

    <!-- Popup Kbis  -->

    <div class="popup popup5">
        <i class="fa-solid fa-xmark"></i>
        <form class="kbis_popup popup_hidden" action="<?= site_url(); ?>add/addFiles/<?= session()->get("id") ?>" enctype="multipart/form-data" method="post">
            <h2>Ajouter un Kbis :</h2>
            <label for="kbis_company">Kbis :</label>
            <input name="kbis_company" type="file">
            <input type="submit" value="Mettre à jour">
        </form>
    </div>
</div>


<?= $this->endSection() ?>

<script src="asset/js/popup.js"></script>