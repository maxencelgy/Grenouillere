<?= $this->extend('templates/default') ?>
<?= $this->section('stylesheet') ?>
    <link rel="stylesheet" href="/asset/css/edit_company.css">

<?= $this->endSection() ?>
<?= $this->section('content') ?>
<?php $userData = $userData[0] ?>

    <section id="edit_container">
        <div class="edit_title">
            <h2>Mon Profil</h2>
        </div>

        <div class="edit_info_container">
            <div class="global_info">
                <fieldset>
                    <legend>Mes informations: </legend>
                    <form method="post" action="<?= site_url(); ?>profil/user/modify/<?= session()->get("id") ?>">
                        <div class="input_box">
                            <label for="nom">Nom :</label>
                            <input type="text" name="nom" id="nom" value="<?= $userData["last_name_users"]; ?>">

                            <label for="prenom">Prenom :</label>
                            <input type="text" name="prenom" id="prenom" value="<?= $userData["first_name_users"]; ?>">

                            <label for="email">Email :</label>
                            <input type="text" name="email" id="email" value="<?= $userData["email_users"]; ?>">
                        </div>
                        <div class="input_box">
                            <label for="adress">Adresse :</label>
                            <input type="text" name="adress" id="adress" value="<?= $userData["adress_users"]; ?>">

                            <label for="postal">Code Postal :</label>
                            <input type="text" name="postal" id="postal" value="<?= $userData["postal_users"]; ?>">

                            <label for="city">Ville :</label>
                            <input type="text" name="city" id="city" value="<?= $userData["city_users"]; ?>">
                        </div>
                        <div class="input_box">
                            <label for="phone">Téléphone :</label>
                            <input type="text" name="phone" id="phone" value="<?= $userData["phone_users"]; ?>">
                        </div>
                        <input type="submit" value="Modifier mes informations">
                    </form>
                </fieldset>
            </div>
        </div>
    </section>


<?= $this->endSection() ?>
