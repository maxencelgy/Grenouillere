<?= $this->extend('templates/default') ?>
<?= $this->section('stylesheet') ?>
<link rel="stylesheet" href="/asset/css/edit_company.css">

<?= $this->endSection() ?>
<?= $this->section('content') ?>
<?php $userData = $userData[0] ?>
<div class="wrap">
    <section id="edit_container">
        <div class="edit_info_container">
            <h2>Mon Profil</h2>
            <br>
            <div class="global_info">
                <h3>Mes informations: </h3>
                <form method="post" action="<?= site_url(); ?>profil/user/modify/<?= session()->get("id") ?>">
                    <div class="input_box">
                        <label for="nom">Nom :</label>
                        <input type="text" name="nom" id="nom" value="<?= $userData["last_name_users"]; ?>"><br>

                        <label for="prenom">Prenom :</label>
                        <input type="text" name="prenom" id="prenom" value="<?= $userData["first_name_users"]; ?>"><br>

                        <label for="email">Email :</label>
                        <input type="text" name="email" id="email" value="<?= $userData["email_users"]; ?>"><br>
                    </div>
                    <div class="input_box">
                        <label for="adress">Adresse :</label>
                        <input type="text" name="adress" id="adress" value="<?= $userData["adress_users"]; ?>"><br>

                        <label for="postal">Code Postal :</label>
                        <input type="text" name="postal" id="postal" value="<?= $userData["postal_users"]; ?>"><br>

                        <label for="city">Ville :</label>
                        <input type="text" name="city" id="city" value="<?= $userData["city_users"]; ?>"><br>
                    </div>
                    <div class="input_box">
                        <label for="phone">Téléphone :</label>
                        <input type="text" name="phone" id="phone" value="<?= $userData["phone_users"]; ?>">
                        <br>
                        <br>
                        <input type="submit" value="Modifier mes informations">
                    </div>

                </form>

            </div>
        </div>
    </section>

</div>
<?= $this->endSection() ?>