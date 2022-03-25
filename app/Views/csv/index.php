<?php require('toolbox/func.php'); ?>

<?= $this->extend('templates/default') ?>


<?= $this->section('stylesheet') ?>
<link rel="stylesheet" href="/asset/css/home.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>


<h1>CSV</h1>


<?php
debug($reservations);




foreach ($reservations as $reservation) { ?>

    <div style="background-color: green; margin: 1rem; padding: 1rem;">
        <h2>id_reservation = <?= $reservation["id_reservation"] ?></h2>
        <h3>fk_child = <?= $reservation['last_name_child'] ?></h3><br>
        <a href="/export/<?= $reservation["id_reservation"] ?>" style="padding: .5rem; background-color: orange; margin-top: 1rem; border-radius: .3rem;">telecharger sous format CSV</a>
    </div>


<?php } ?>


<a href="/export/all" style="padding: .5rem; background-color: violet; margin-top: 1rem; border-radius: .3rem;">TELECHARGER ALL FACTURES</a>



<?= $this->endSection() ?>