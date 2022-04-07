<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="/asset/css/reset.css">
    <link rel="stylesheet" href="/asset/css/style.css">
    <?= $this->renderSection('stylesheet') ?>
    <link rel="stylesheet" href="/asset/css/responsive.css">
    <title>Grenouillère</title>
</head>

<body>

    <?php include("navigation/header.php");

    ?>

    <div class="container">
        <?= $this->renderSection('content') ?>

    </div>

    <?php include("navigation/footer.php"); ?>


    <?= $this->renderSection('js') ?>
    <script src="/asset/js/main.js"></script>
    <script src="/asset/js/popup.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

</body>

</html>