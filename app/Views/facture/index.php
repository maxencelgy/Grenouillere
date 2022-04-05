<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>HTML TO PDF</title>
    <script src="js/jquery.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="/asset/css/facture.css">
</head>

<body>
    <a href="javascript:void(0)" class="btn-download">Download PDF </a>
    <div id="invoice">
        <section id="facture">
            <div class="wrap">
                <div class="head">
                    <h1>Facture du <br> <?= $date ?> </h1>
                    <div class="logo">
                        <h2>Grenouillere</h2>
                    </div>
                </div>

                <div class="contacts">
                    <div class="contact left">
                        <h3>De : <?= $company['name_company'] ?> </h3>
                        <span> Email : <?= $company['email_company'] ?> </span><br>
                        <span>Nom propriètaire : <?= $company['frist_name_company'] . ' ' . $company['last_name_company'] ?> </span><br>
                        <span>Adresse :
                            <?= $company['adress_company'] . ', ' . $company['city_company'] . ', ' . $company['postal_code_company'] ?></span>
                        <span>N° Siret : <?= $company['siret_company'] ?></span><br>
                    </div>
                    <div class="contact right">
                        <h3>Pour</h3>
                        <span>Nom : <?= $user['first_name_users'] . ' ' . $user['last_name_users'] ?></span>
                        <span>email : <?= $user['email_users'] ?></span>
                        <span>Adresse : </span>
                    </div>
                </div>

                <div class="list-facture">
                    <div class="title">
                        <p> Liste des reservations</p>
                        <p> Prix TTC</p>
                    </div>
                    <div class="factures">
                        <?php

                        foreach ($reservations as $reservation) { ?>
                            <div class="facture">
                                <div class="left">
                                    <p>Reservation de : <?= $reservation['first_name_child'] ?> </p>
                                    <p>le <?= date('d/m/Y', strtotime($reservation['date_slot'])) ?> </p>
                                    <p> de <?= $reservation['libelle_planning'] ?> </p>
                                </div>
                                <div class="right">
                                    <p>Prix : <?= $company['hourly_rate_company'] * 4 ?> €</p>
                                </div>
                            </div>
                        <?php
                        }  ?>
                    </div>
                    <div class="total"> Prix Total (TTC) : <?= $company['hourly_rate_company'] * 4 * count($reservations) ?> €</div>

                </div>
        </section>
    </div>



</body>

</html>
<?= $this->section('js') ?>
<script src="/asset/js/pdf/jquery.min.js"></script>
<script src="/asset/js/pdf/jspdf.debug.js"></script>
<script src="/asset/js/pdf/html2canvas.min.js"></script>
<script src="/asset/js/pdf/html2pdf.min.js"></script>
<script>
    const options = {
        margin: 0.5,
        filename: 'invoice.pdf',
        image: {
            type: 'jpeg',
            quality: 800,
        },
        html2canvas: {
            scale: 1,
        },
        jsPDF: {
            format: "a4",
            unit: "in",
            format: "letter",
            orientation: "portrait",
        }
    }

    $('.btn-download').click(function(e) {
        e.preventDefault();
        const element = document.getElementById('invoice');
        html2pdf().from(element).set(options).save();
    });


    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>