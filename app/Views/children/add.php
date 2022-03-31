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

<!--Doit etre deplacer dans admin-->

    <form class="formu" action="allergie/Ajouter" method="post">
        <h2>Ajouter une allergie</h2>
        <label for="name_allergy">Quelle allergie ?</label>
        <input type="text" name="name_allergy">

        <input type="submit" value="Ajouter">
    </form>

    <form class="formu" action="maladie/Ajouter" method="post">
        <h2>Ajouter une maladie</h2>
        <label for="name_disease">Quelle maladie ?</label>
        <input type="text" name="name_disease">

        <input type="submit" value="Ajouter">
    </form>


<?= $this->endSection() ?>