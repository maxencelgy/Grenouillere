{# Default temlplate #}
<?= $this->extend('templates/default') ?>
{# CSS LINK #}
<?= $this->section('stylesheet') ?>
<link rel="stylesheet" href="/asset/css/formAuth.css">
<?= $this->endSection() ?>


<?= $this->section('content') ?>
<section id='connexion'>

    <div class="wrap">
        <?= $this->renderSection('formAuth') ?>
    </div>
</section>
<?= $this->endSection() ?>