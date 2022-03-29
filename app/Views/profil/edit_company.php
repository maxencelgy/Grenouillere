<?= $this->extend('templates/default') ?>
<?= $this->section('stylesheet') ?>
<link rel="stylesheet" href="/asset/css/edit_company.css">

<?= $this->endSection() ?>
<?= $this->section('content') ?>

<section id="edit_container">
    <div class="edit_title">
        <h2>Mon Profil</h2>
    </div>

    <div class="edit_info_container">
        <div class="global_info">
            <fieldset>
                <legend>Mes informations: </legend>
                <div class="input_box">
                    <label for="nom">Nom :</label>
                    <input type="text" name="nom" id="nom">

                    <label for="email">Email :</label>
                    <input type="text" name="email" id="email">

                    <label for="postal">Code Postal :</label>
                    <input type="text" name="postal" id="postal">
                </div>
                <div class="input_box">
                    <label for="first_name">Prénom :</label>
                    <input type="text" name="first_name" id="first_name">

                    <label for="adress">Adresse :</label>
                    <input type="text" name="adress" id="adress">

                    <label for="siret">SIRET :</label>
                    <input type="text" name="siret" id="siret">
                </div>
                <div class="input_box">
                    <label for="phone">Telephone :</label>
                    <input type="text" name="phone" id="phone">

                    <label for="city">Ville :</label>
                    <input type="text" name="city" id="city">
                </div>

                <input type="submit" value="Modifier les informations">
            </fieldset>
        </div>
    </div>
</section>


<section id="planning">
    <?php
    setlocale(LC_TIME, "fr_FR");
    // $premierJour = strftime("%A - %d/%M/%Y", strtotime("+ 1 days"));
    // echo "Premier jour de cette semaine est: ", $premierJour;

    // echo '<br>';
    // echo '<br>';

    // $jour = date("Y-m-d");
    // $maDate = strtotime($jour . "+ 1 days");
    // echo date("Y-m-d", $maDate) . "\n";
    ?>
    <div class="wrap">
        <h2 class="hours">HORRAIRES</h2>

        <div class="calendar">
            <?php
            for ($i = 0; $i < 7; $i++) { ?>
                <div class="days">
                    <div class="day">

                        <h2><?= strftime("%d/%m/%Y", strtotime("+ $i days")) ?></h2>
                        <div class="slots">
                            <div class="slot">
                                <p style="display: none;"><?= strftime("%d/%m/%Y", strtotime("+ $i days")) ?></p>
                                <p>Matin</p>
                            </div>
                            <div class="slot">
                                <p style="display: none;"><?= strftime("%d/%m/%Y", strtotime("+ $i days")) ?></p>
                                <p> Midi</p>
                            </div>
                            <div class="slot">
                                <p style="display: none;"><?= strftime("%d/%m/%Y", strtotime("+ $i days")) ?></p>
                                <p> Soir</p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="send"><a href="" id="send">ENVOYER EN BDD ZEBI</a></div>
    </div>
</section>


<form action="/calendar/add" method="post" id="response">

</form>



<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script src="/asset/js/calendar.js"></script>

<?= $this->endSection() ?>