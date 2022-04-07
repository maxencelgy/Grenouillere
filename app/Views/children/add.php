<?= $this->extend('templates/default') ?>
<?= $this->section('stylesheet') ?>
<link rel="stylesheet" href="/asset/css/edit_company.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>



<div class="wrap">
    <section id="edit_container">
        <div class="edit_info_container">
            <h2>Ajouter votre enfant</h2>
            <br>
            <div class="global_info">
                <form class="formu" action="children/add" method="post">
                    <div class="input_box">
                        <label for="">Nom de l'enfant</label>
                        <input type="text" name="last_name_child">
                        <br>

                        <label for="">Prenom de l'enfant</label>
                        <input type="text" name="first_name_child">
                        <br>
                    </div>
                    <div class="input_box">
                        <label for="">Date d'anniversaire de l'enfant</label>
                        <input type="date" name="birthday_child">
                        <br>
                        <label for="">Commentaire sur l'enfant</label>
                        <input type="text" name="need_child">
                    </div>
                    <input type="submit" value="Valider">

                </form>
            </div>
        </div>
    </section>
</div>



<?= $this->endSection() ?>