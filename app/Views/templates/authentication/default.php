{# Default temlplate #}
<?= $this->extend('templates/default') ?>
{# CSS LINK #}
<?= $this->section('stylesheet') ?>
<link rel="stylesheet" href="/asset/css/formAuth.css">
<?= $this->endSection() ?>


<?= $this->section('content') ?>
<section id='connexion'>
    <h3>
        <a href="<?= site_url(); ?>authentification">
            <i class="fa-solid fa-arrow-left"></i> Retour à votre situation </a>
    </h3>
    <div class="wrap">
        <?= $this->renderSection('formAuth') ?>
    </div>
</section>
<?= $this->endSection() ?>