<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <?= $this->renderSection('stylesheet') ?>
    <link rel="stylesheet" href="/asset/css/reset.css">
    <link rel="stylesheet" href="/asset/css/style.css">
    <title>Grenouillère</title>
</head>

<body>

    <?php include("navigation/header.php"); ?>

    <div class="container">

        <?= $this->renderSection('content') ?>

    </div>
    
    <?php include("navigation/footer.php"); ?>
    <script src="asset/js/popup.js"></script>
</body>

</html>