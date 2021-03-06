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
                <form class="formu" action="modified" method="post">
                    <div class="input_box">
                        <input type="hidden" name="id_child" value="<?= $children["id_child"]; ?>">
                        <label for="">Nom de l'enfant</label>
                        <input type="text" name="last_name_child" value="<?= $children['last_name_child'] ?>">
                    </div>
                    <div class="input_box">
                        <label for="">Prenom de l'enfant</label>
                        <input type="text" name="first_name_child" value="<?= $children['first_name_child'] ?>">
                        <br>
                    </div>
                    <div class="input_box">
                        <input type="submit" value="Valider">
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection() ?>