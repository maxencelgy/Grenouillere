<?= $this->extend('templates/default') ?>


<?= $this->section('stylesheet') ?>
    <link rel="stylesheet" href="/asset/css/globalResult.css">
    <link rel="stylesheet" href="http://cdn.leafletjs.com/
leaflet-0.7.3/leaflet.css" />

<?= $this->endSection() ?>

<?= $this->section('content') ?>


<div id="global_results_container">
    <div class="result_list_box">
<?php
if (!empty($companyData)){
    foreach($companyData as $company){ ?>
        <a href="profil/creche/<?= $company->id_company ?>" class="box_item">
            <div class="image">
                <img src="asset/img/illustration_result.jpg" alt="Image">
            </div>

            <div class="item_info_container">
                <div class="item_card_info">
                    <h3><?= $company->name_company; ?></h3>
                    <div class="separator"></div>

                    <div class="global_info">
                        <p> <?= $company->hourly_rate_company; ?>€/heure<br>
                            Adresse : <?= $company->adress_company; ?><br>
                            Code Postal : <?= $company->postal_code_company; ?><br>
                            Ville : <?= $company->city_company; ?>
                        </p>
                    </div>

                    <div class="description_box">
                        <p>Description :
                            <?= $company->description_company; ?>
                        </p>
                    </div>
                </div>
            </div>
        </a>
    <?php }
}else{ ?>
    <div class="item_info_container">
        <div class="item_card_info">
            <h2>Désolé, nous n'avons trouvé aucune crèche qui correspond à votre recherche ...</h2>
        </div>
    </div>
<?php } ?>

    </div>

    <div class="result_map_box">
        <div id="map"></div>
    </div>
</div>


    <script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
    <script src="asset/js/map.js"></script>
<?= $this->endSection() ?>