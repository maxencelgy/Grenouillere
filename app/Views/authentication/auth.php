<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Authentification</title>
    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="stylesheet" href="asset/css/auth.css">
</head>
<body>

<div id="auth__global">
    <div id="auth__container">
        <div class="auth__logo">
            <img src="asset/img/logo.svg" alt="Logo Grenouillere">
        </div>

        <div class="auth__nav">
            <a href="/"><i class="fa-solid fa-arrow-left"></i> Retour à l'accueil</a>
            <a href="#">Se connecter</a>
        </div>

        <div class="auth__conditions">
            <h3>Quelle est votre situation ?</h3>

            <div class="cards__container">
                <a href="<?= site_url(); ?>particulier/connexion" class="card__box">
                    <div class="card__logo">
                        <img src="" alt="logo particulier">
                    </div>
                    <div class="card__item">
                        <h4>Particulier</h4>
                        <p>Je recherche une crèche ou une nounou</p>
                    </div>
                    <div class="card__arrow">
                        <i class="fa-solid fa-chevron-right"></i>
                    </div>
                </a>

                <a href="#" class="card__box">
                    <div class="card__logo">
                        <img src="" alt="logo professionnel">
                    </div>
                    <div class="card__item">
                        <h4>Professionnel</h4>
                        <p>Je suis une crèche ou une nounou</p>
                    </div>
                    <div class="card__arrow">
                        <i class="fa-solid fa-chevron-right"></i>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div id="auth__picture">
        <img src="asset/img/enfant_qui_court.jpg" alt="enfant qui court">
    </div>
</div>

<script src="https://kit.fontawesome.com/501d33add6.js" crossorigin="anonymous"></script>
</body>
</html>