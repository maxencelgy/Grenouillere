<header id="navbar">
    <div class="wrap">
        <div class="left">
            <?php if (site_url(uri_string()) == site_url() . 'particulier/connexion') { ?>
                <a class="logoA" href="/" class="logoA"><img src="/asset/img/logo.svg" alt=""></a>
                <a class="logoA" href="/authentification" class="logoA"><i class="fa-solid fa-arrow-left"></i> Retour au choix</a>
            <?php } else if (site_url(uri_string()) == site_url() . 'entreprise/connexion') { ?>
                <a class="logoA" href="/"><img src="/asset/img/logo.svg" alt=""></a>
                <a class="logoA" href="/authentification"><i class="fa-solid fa-arrow-left"></i> Retour au choix</a>
            <?php } else if (site_url(uri_string()) == site_url() . 'profil/editCompany/'.session()->get("id")){ ?>
                <a class="logoA" href="/"><img src="/asset/img/logo.svg" alt=""></a>
                <a class="logoA" href="/profil/compagny/<?= session()->get("id") ?>"><i class="fa-solid fa-arrow-left"></i> Retour au profil</a>
            <?php }else if (site_url(uri_string()) == site_url() . 'profil/editUser/'.session()->get("id")){ ?>
                <a class="logoA" href="/"><img src="/asset/img/logo.svg" alt=""></a>
                <a class="logoA" href="/profil/<?= session()->get("id") ?>"><i class="fa-solid fa-arrow-left"></i> Retour au profil</a>
            <?php }else if (site_url(uri_string()) == site_url() . 'create-children'){ ?>
                <a class="logoA" href="/"><img src="/asset/img/logo.svg" alt=""></a>
                <a class="logoA" href="/profil/<?= session()->get("id") ?>"><i class="fa-solid fa-arrow-left"></i> Retour au profil</a>
            <?php } else { ?>
                <a href="/" class="logoA"><img src="/asset/img/logo.svg" alt=""></a>
                <?php if(site_url(uri_string()) != site_url() . ''){ ?>
                    <a href="/" class="logoA"><i class="fa-solid fa-arrow-left"></i> Retour à l'accueil</a>
                <?php } ?>
            <?php } ?>
        </div>
        <?php if (site_url(uri_string()) == site_url() . 'authentification') { ?>

        <?php } else { ?>
            <div class="right">
                <?php if (session()->get("role") == "admin") { ?>
                    <a href="<?= site_url(); ?>admin" class="btn link">admin</a> <?php } ?>
                <?php if (!empty(session()->get("email"))) {
                    if (!empty(session()->get("role"))) { ?>
                        <a href="<?= site_url(); ?>profil/<?= session()->get("id") ?>" class="btn link">Mon Profil</a>
                    <?php
                    } else { ?>
                        <a href="<?= site_url(); ?>profil/compagny/<?= session()->get("id") ?>" class="btn link">Mon Profil</a>
                    <?php } ?>
                    <a href="<?= site_url(); ?>deconnexion" class="btn link">Deconnexion</a>
                <?php } else { ?>
                    <a href="<?= site_url(); ?>authentification" class="btn link">Connexion/Inscription</a>
                <?php } ?>

                <i class="fa-solid fa-bars"></i>
                <i class="fa-solid fa-xmark cross crossNone"></i>
            </div>
    </div>
<?php } ?>

</header>