<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/asset/css/reset.css">
    <link rel="stylesheet" href="/asset/css/style.css">
    <?= $this->renderSection('stylesheet') ?>
    <title>Grenouillère</title>
</head>

<body>

    <?php include("navigation/header.php"); ?>

    <div class="container">

        <?= $this->renderSection('content') ?>

    </div>
    <?php include("navigation/footer.php"); ?>
<<<<<<< HEAD

    <script src="asset/js/popup.js"></script>

=======
    <?= $this->renderSection('js') ?>
>>>>>>> ef025c6094902cd01f492602e36e6c99c9651ef3
</body>

</html>