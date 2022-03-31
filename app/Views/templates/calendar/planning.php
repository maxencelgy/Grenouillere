<section id="planning">
    <?php
    setlocale(LC_TIME, "fr_FR");
    ?>
    <div class="wrap">
        <h2 class="hours">HORRAIRES</h2>
        <div class="calendar">
            <?php
            for ($i = 0; $i < 7; $i++) { ?>
            <div class="days">
                <div class="day">
                    <h2 class='date'><?= strftime("%d/%m/%Y", strtotime("+ $i days")) ?></h2>
                    <div class="slots">
                        <?php
                        foreach($planing as $day){
                            ?>
                        <div class="slot">
                            <div style="display: none;"><?= strftime("%Y-%m-%d", strtotime("+ $i days")) ?></div>
                            <div style="display: none;"> <?= $day['id_planning'] ?> </div>
                            <div> <?= $day['libelle_planning'] ?> </div>
                        </div>
                        <?php
                        }
                        ?>

                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <form action="/calendar/add" method="post" id="response">
        <input class="send" type="submit" value="Envoyer le planning">
    </form>
</section>