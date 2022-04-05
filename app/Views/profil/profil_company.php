<?= $this->extend('templates/default') ?>
<?= $this->section('stylesheet') ?>
    <link rel="stylesheet" href="/asset/css/profil.css">
<?= $this->endSection() ?>


<?= $this->section('content') ?>
<?php $companyData = $companyData[0]; ?>
        <section id="profil">
            <h2>Mes informations</h2><br>
            <div class="informations">
                <div class="information">
                    <h3>Entreprise : <?= $companyData["name_company"]; ?></h3><br>
                    <h3>Direction : <?= $companyData["last_name_company"]; ?></h3><br>
                    <h3>SIRET : <?= $companyData["siret_company"]; ?></h3><br><br>
                </div>
                <div class="information">
                    <h3>Email : <?= $companyData["email_company"]; ?></h3><br>
                    <h3>Adresse : <?= $companyData["adress_company"]; ?></h3><br>

                </div>
                <div class="information">
                    <h3>Ville : <?= $companyData["city_company"]; ?></h3><br>
                    <h3>Code Postale : <?= $companyData["postal_code_company"]; ?></h3><br>
                </div>
            </div>
            <div class="buttons">
                <a class="btn" href="<?= site_url(); ?>profil/editCompany/<?= session()->get("id"); ?>">Mettre à jour mes informations</a>
            </div>
        </section>

        <div id="administration" class="wrapProfil">
            <div class="administration_status">
                <h2>Mes documents</h2>
                <div class="card">
                    <p>Pièce d'identité : </p>
                        <?php if(!empty(session()->get("cni_company"))){ ?>
                            <a href="<?= session()->get("cni_company") ?>">Voir le document</a>
                        <?php }else{ ?>
                            <p> EN ATTENTE </p>
                        <?php } ?>
                    <a class="btn btn_identity_popup" href="">Mettre à jour</a>
                </div>
                <div class="card">
                    <p>Diplôme : </p>
                    <?php if(!empty(session()->get("certificate_company"))){ ?>
                        <a href="<?= session()->get("certificate_company") ?>">Voir le document</a>
                    <?php }else{ ?>
                        <p> EN ATTENTE </p>
                    <?php } ?>
                    <a class="btn btn_certificate_popup" href="">Mettre à jour</a>
                </div>
                <div class="card">
                    <p>Autorisation préfectorale : </p>
                    <?php if(!empty(session()->get("licence_company"))){ ?>
                        <a href="<?= session()->get("licence_company") ?>">Voir le document</a>
                    <?php }else{ ?>
                        <p> EN ATTENTE </p>
                    <?php } ?>
                    <a class="btn btn_licence_popup" href="">Mettre à jour</a>
                </div>
                <div class="card">
                    <p>Extrait Kbis : </p>
                    <?php if(!empty(session()->get("kbis_company"))){ ?>
                        <a href="<?= session()->get("kbis_company") ?>">Voir le document</a>
                    <?php }else{ ?>
                        <p> EN ATTENTE </p>
                    <?php } ?>
                    <a class="btn btn_kbis_popup" href="">Mettre à jour</a>
                </div>
                <div class="card">
                    <p>RIB : </p>
                    <?php if(!empty(session()->get("rib_company"))){ ?>
                        <a href="<?= session()->get("rib_company") ?>">Voir le document</a>
                    <?php }else{ ?>
                        <p> EN ATTENTE </p>
                    <?php } ?>
                    <a class="btn btn_rib_popup" href="">Mettre à jour</a>
                </div>
            </div>
        </div>
    </section>


    <!--Popup rib -->

<div id="popup_container">
    <form id="rib_popup" class="rib_popup popup_hidden" action="<?= site_url(); ?>add/addFiles/<?= session()->get("id") ?>" enctype="multipart/form-data" method="post">
        <h2>Ajouter un rib</h2>
        <label for="rib_company">RIB</label>
        <input name="rib_company" type="file">
        <input type="submit" value="Mettre à jour">
    </form>
</div>

<!-- Popup Identité -->

<div id="popup_container">
    <form id="identity_popup" class="identity_popup popup_hidden" action="<?= site_url(); ?>add/addFiles/<?= session()->get("id") ?>" enctype="multipart/form-data" method="post">
        <h2>Ajouter une pièce d'identité</h2>
        <label for="identity_company">Pièce d'identié :</label>
        <input name="identity_company" type="file">
        <input type="submit" value="Mettre à jour">
    </form>
</div>

<!-- Popup Diplome -->

<div id="popup_container">
    <form id="certificate_popup" class="certificate_popup popup_hidden" action="<?= site_url(); ?>add/addFiles/<?= session()->get("id") ?>" enctype="multipart/form-data" method="post">
        <h2>Ajouter un diplôme :</h2>
        <label for="certificate_company">Diplôme :</label>
        <input name="certificate_company" type="file">
        <input type="submit" value="Mettre à jour">
    </form>
</div>

<!-- Popup licence  -->

<div id="popup_container">
    <form id="licence_popup" class="licence_popup popup_hidden" action="<?= site_url(); ?>add/addFiles/<?= session()->get("id") ?>" enctype="multipart/form-data" method="post">
        <h2>Ajouter une autorisation préfectorale :</h2>
        <label for="licence_company">Attestation :</label>
        <input name="licence_company" type="file">
        <input type="submit" value="Mettre à jour">
    </form>
</div>

<!-- Popup Kbis  -->

<div id="popup_container">
    <form id="kbis_popup" class="kbis_popup popup_hidden" action="<?= site_url(); ?>add/addFiles/<?= session()->get("id") ?>" enctype="multipart/form-data" method="post">
        <h2>Ajouter un Kbis :</h2>
        <label for="kbis_company">Kbis :</label>
        <input name="kbis_company" type="file">
        <input type="submit" value="Mettre à jour">
    </form>
</div>


<?= $this->endSection() ?>

<script src="asset/js/popup.js"></script>
