<section id="planning">

    <?php
    if (!empty($slot)) {
        // var_dump($slot);
        // var_dump($chidrenList);
        // var_dump (session()->get("id"));
        // var_dump ('eeere');

    }
    setlocale(LC_TIME, "fr_FR");
    ?>
    <div class="wrap">
        <h2 class="hours">HORAIRES</h2>
        <div class="calendar">
            <?php
            for ($i = 0; $i < 7; $i++) { ?>
                <div class="days">
                    <div class="day">
                        <h2 class='date'><?= date('Y-m-d', strtotime("+ $i days")) ?></h2>
                        <div class="slots">
                            <?php

                            foreach ($planning as $day) {
                                // On boucle dans le tableau slot
                                if (!empty($slot)) {
                                    foreach ($slot as $uniqueSlot) {
                                        if ($uniqueSlot['fk_planning'] === $day['id_planning'] && $uniqueSlot['date_slot'] === strftime("%Y-%m-%d", strtotime("+ $i days")) && $uniqueSlot['child_remaining_slot'] > 0) {
                            ?>
                                            <div class="slot">
                                                <div style="display: none;"><?= strftime("%Y-%m-%d", strtotime("+ $i days")) ?></div>
                                                <div style="display: none;"> <?= $day['id_planning'] ?> </div>
                                                <div style="display: none;"> <?= $uniqueSlot['id_slot'] ?> </div>

                                                <div> <?= $day['libelle_planning']  ?> </div>
                                                <div> Nombre de place Disponible : <?= $uniqueSlot['child_remaining_slot'] ?> </div>
                                            </div>
                                    <?php
                                        }
                                    }
                                } else {
                                    ?>
                                    <div class="slot">
                                        <div style="display: none;"><?= strftime("%Y-%m-%d", strtotime("+ $i days")) ?></div>
                                        <div style="display: none;"> <?= $day['id_planning'] ?> </div>
                                        <div> <?= $day['libelle_planning'] ?> </div>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            <?php
            } ?>
        </div>
    </div>


    <h2 id='reservation' class="hours">Votre reservation</h2>
    <form action=" <?= $infoBtn[0] ?> " method="post">
        <div class=" wrap" id="response">

            <?php
            if (!empty($slot) && !empty($chidrenList)) { ?>
                <?php
                $i = 0;
                foreach ($chidrenList as $uniqueChild) { ?>
                    <div class='childs' id=" <?= $uniqueChild['id_child'] ?>"> <?= $uniqueChild['first_name_child'] ?>
                    </div>
            <?php
                }
            } ?>
        </div> <input class="send" type="submit" value="<?= $infoBtn[1] ?>">
    </form>




</section>