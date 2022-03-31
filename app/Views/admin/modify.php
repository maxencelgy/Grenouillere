<?= $this->extend('templates/default') ?>

<?= $this->section('content') ?>
<h1>Modifier</h1>


<form class="formu" action="modified" method="post">
    <input type="text" name="status_company" value="<?= $entreprise["status_company"]; ?>">

    <input type="hidden" name="id" value="<?= $entreprise["id_company"]; ?>">
    <input type="submit" value="Valider">
</form>

<?= $this->endSection() ?>