<header>
    <div class="wrap">
        <div class="left">
            <a href="/"><img src="/asset/img/logo.svg" alt=""></a>
        </div>
        <div class="right">
            <?php if (!empty(session()->get("email"))) { ?>
                <a href="<?= site_url(); ?>create-children" class="btn">Inscrire mon enfant</a>
                <a href="<?= site_url(); ?>profil" class="btn">Mon Profil</a>
                <a href="<?= site_url(); ?>deconnexion" class="btn">Deconnexion</a>
            <?php } else { ?>
                <a href="<?= site_url(); ?>authentification" class="btn">Connexion/Inscription</a>
            <?php } ?>
        </div>
    </div>
</header>