<header>
    <div class="wrap">
        <div class="left">
            <img src="/asset/img/logo.svg" alt="">
        </div>
        <div class="right">
            <?php if(!empty(session()->get("email"))) { ?>
                <a href="<?= site_url(); ?>deconnexion" class="btn">Deconnexion</a>
            <?php } else { ?>
                <a href="<?= site_url(); ?>authentification" class="btn">Connexion/Inscription</a>
            <?php } ?>
        </div>
    </div>
</header>