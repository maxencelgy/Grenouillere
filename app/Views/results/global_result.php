<?= $this->extend('templates/default') ?>


<?= $this->section('stylesheet') ?>
    <link rel="stylesheet" href="/asset/css/globalResult.css">
    <link rel="stylesheet" href="http://cdn.leafletjs.com/
leaflet-0.7.3/leaflet.css" />

<?= $this->endSection() ?>

<?= $this->section('content') ?>



<div id="global_results_container">
    <div class="result_list_box">
        <div class="box_item">
            <div class="image">
                <img src="asset/img/illustration_result.jpg" alt="Image">
            </div>

            <div class="item_info_container">
                <div class="item_card_info">
                    <h3>Assistante maternelle à domicile hypercentre de Rouen</h3>
                    <div class="separator"></div>

                    <div class="global_info">
                        <p>Places disponibles : 2 <br>
                            Extérieur : Oui <br>
                            Animal : oui
                        </p>
                    </div>

                    <div class="description_box">
                        <p>Description :
                            Bonjour Madame, Monsieur
                            je suis assistante maternelle agréée depuis 2010, je suis agréé pour 3 enfant, en ce moment je recherche pour le mois de septembre à partir du 31/ 07 /2022j’aurai. 1 palace
                            palace libre, en ce moment j’ai 3 enfant à garder, il ne sera pas tout seul avec le votre.
                            De 0 à 18 mois Jusqu’à trois ans.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="result_map_box">
        <div id="map"></div>

    </div>
</div>


    <script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
    <script src="asset/js/map.js"></script>
<?= $this->endSection() ?>