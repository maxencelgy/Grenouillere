<?= $this->extend('templates/default') ?>

<?= $this->section('content') ?>
<h1>Modifier</h1>

<?php var_dump($children) ?>

<form class="formu" action="modified" method="post">
    <input type="hidden" name="id" value="<?= $children["id"]; ?>">
    <label for="">FK</label>
    <input type="text" name="fk_users" value="<?= $children['fk_users'] ?>">
    <label for="">Nom de l'enfant</label>
    <input type="text" name="last_name_child" value="<?= $children['last_name_child'] ?>">
    <br>
    <label for="">Prenom de l'enfant</label>
    <input type="text" name="first_name_child" value="<?= $children['first_name_child'] ?>">
    <br>
    <label for="">Commentaire sur l'enfant</label>
    <input type="text" name="need_child" value="<?= $children['need_child'] ?>">
    <input type="submit" value="Valider">
</form>

<?= $this->endSection() ?>