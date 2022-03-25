<?= $this->extend('templates/default') ?>


<?= $this->section('content') ?>

<form class="formu" action="children/add" method="post">
    <label for="">Nom de l'enfant</label>
    <input type="text" name="last_name_child">
    <br>
    <label for="">Prenom de l'enfant</label>
    <input type="text" name="first_name_child">
    <br>
    <label for="">Date d'anniversaire de l'enfant</label>
    <input type="date" name="birthday_child">
    <br>
    <label for="">Commentaire sur l'enfant</label>
    <input type="text" name="need_child">
    <input type="submit" value="Valider">
</form>

    <form class="formu" action="alergie/Ajouter" method="post">
        <h2>Ajouter une maladie</h2>
        <label for="name_allergy">Quelle allergie ?</label>
        <input type="text" name="name_allergy">

        <input type="submit" value="Ajouter">
    </form>

    <form id="child_allergy" class="popup_hidden" action="<?= site_url(); ?>children/allergyChild" method="post">
        <h2>Declarer une allergie</h2>
        <label for="name_allergy">Quelle allergie ?</label>
        <select name="fk_allergy" id="fk_allergy">
            <?php foreach($allergy as $item){ ?>
                <option value="<?= $item['id_allergy'] ?>"><?= $item['name_allergy'] ?></option>
            <?php } ?>
        </select>
        <br>
        <textarea id="description_allergy" name="description_allergy" rows="5" cols="33" placeholder="Remarques supplémentaires"></textarea>
        <br>
        <input type="submit" value="Ajouter">
    </form>


<?php
foreach ($childrens as $children) { ?>
    <div style="background-color: red; border-radius: 0.3rem; width: 50%;">
        <h2><?= $children['last_name_child'] ?></h2>
        <h2><?= $children['first_name_child'] ?></h2>
        <h2><?= $children['need_child'] ?></h2>
        <h2><?= $children['birthday_child'] ?></h2>
        <a href="" id="<?= $children["id_child"]; ?>" class="btn_allergy_popup" style="background-color: yellow;">Déclarer une allergie</a>
        <a href="/children/modify/<?php echo $children["id_child"]; ?>" style="background-color: blue;">Modifier</a>
        <a href="/children/delete/<?php echo $children["id_child"]; ?>" style="background-color: green;">DELETE</a>
    </div>
    <br>


<?php }

?>




<?= $this->endSection() ?>