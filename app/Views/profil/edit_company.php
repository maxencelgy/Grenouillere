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

            <div class="planning_container">
                <fieldset>
                    <legend>Mes disponibilités : </legend>

                    <input type="submit" value="Valider">
                </fieldset>
            </div>
        </div>
    </section>

<?= $this->endSection() ?>


