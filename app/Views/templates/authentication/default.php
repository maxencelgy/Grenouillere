{# Default temlplate #}
<?= $this->extend('templates/default') ?>
{# CSS LINK #}
<?= $this->section('stylesheet') ?>
<link rel="stylesheet" href="/asset/css/formAuth.css">
<?= $this->endSection() ?>


<?= $this->section('content') ?>
<section id='connexion'>
    <a href="<?= site_url(); ?>authentification">
        <-- Retour à votre situation</a>
            <div class="wrap">
                <?= $this->renderSection('formAuth') ?>
            </div>
</section>
<?= $this->endSection() ?>