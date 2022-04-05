<header>
    <div class="wrap">
        <div class="left">
            <a href="/"><img src="/asset/img/logo.svg" alt=""></a>
            <a href="/"><i class="fa-solid fa-arrow-left"></i> Retour à l'accueil</a>
        </div>
        <div class="right">
            <?php if (session()->get("role") == "admin") { ?>
                <a href="<?= site_url(); ?>admin" class="btn link">admin</a> <?php } ?>
            <?php if (!empty(session()->get("email"))) {
                if (!empty(session()->get("role"))) { ?>
                    <a href="<?= site_url(); ?>profil" class="btn link">Mon Profil</a>
                <?php
                } else { ?>
                    <a href="<?= site_url(); ?>profil/compagny" class="btn link">Mon Profil</a>
                <?php } ?>

                <a href="<?= site_url(); ?>deconnexion" class="btn link">Deconnexion</a>
            <?php } else { ?>
                <a href="<?= site_url(); ?>authentification" class="btn link">Connexion/Inscription</a>
            <?php } ?>
            <i class="fa-solid fa-bars"></i>
            <i class="fa-solid fa-xmark cross crossNone"></i>
        </div>
    </div>
</header>