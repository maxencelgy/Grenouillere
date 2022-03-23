<?= $this->extend('templates/default') ?>


<?= $this->section('content') ?>

<form class="formu" action="children/add" method="post">
    <label for="">FK</label>
    <input type="text" name="fk_users">
    <label for="">Nom de l'enfant</label>
    <input type="text" name="last_name_child">
    <br>
    <label for="">Prenom de l'enfant</label>
    <input type="text" name="first_name_child">
    <br>
    <label for="">Commentaire sur l'enfant</label>
    <input type="text" name="need_child">
    <input type="submit" value="Valider">
</form>

<?php
var_dump($childrens);
foreach ($childrens as $children) { ?>
    <div style="background-color: red; border-radius: 0.3rem; width: 50%;">
        <h2><?= $children['last_name_child'] ?></h2>
        <h2><?= $children['first_name_child'] ?></h2>
        <h2><?= $children['need_child'] ?></h2>
        <a href="/children/modify/<?php echo $children["id"]; ?>" style="background-color: blue;">Modifier</a>
        <a href="/children/delete/<?php echo $children["id"]; ?>" style="background-color: green;">DELETE</a>
    </div>
    <br>
<?php }

?>




<?= $this->endSection() ?>