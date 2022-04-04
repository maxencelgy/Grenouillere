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

<?= $this->endSection() ?>