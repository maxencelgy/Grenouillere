<section id="planning">

    <?php
    if(!empty($slot)){
        var_dump($slot[0]);
    }
    
    setlocale(LC_TIME, "fr_FR");
    ?>
    <div class="wrap">
        <h2 class="hours">HORAIRES</h2>
        <div class="calendar">
            <?php
            $ligne = 0;
            for ($i = 0; $i < 7; $i++) { ?>
            <div class="days">
                <div class="day">
                    <h2 class='date'><?= strftime("%d/%m/%Y", strtotime("+ $i days")) ?></h2>
                    <div class="slots">
                        <?php
                        $column = 0;
                        foreach($planning as $day){
                            // On boucle dans le tableau slot
                            if(!empty($slot)){
                                foreach($slot as $uniqueSlot){
                                    // var_dump($uniqueSlot);
                                    if($uniqueSlot['fk_planning'] === $day['id_planning'] && $uniqueSlot['date_slot'] === strftime("%Y-%m-%d", strtotime("+ $i days")) && $uniqueSlot['child_remaining_slot'] > 0){
                                        ?>
                        <div class="slot">
                            <div style="display: none;"><?= strftime("%Y-%m-%d", strtotime("+ $i days")) ?></div>
                            <div style="display: none;"> <?= $day['id_planning'] ?> </div>
                            <div> <?= $day['libelle_planning']  ?> </div>
                            <div> Nombre de place Disponible : <?= $uniqueSlot['child_remaining_slot'] ?> </div>
                        </div>
                        <?php
                                    }
                                }
                            }else{
                                ?>
                        <div class="slot">
                            <div style="display: none;"><?= strftime("%Y-%m-%d", strtotime("+ $i days")) ?></div>
                            <div style="display: none;"> <?= $day['id_planning'] ?> </div>
                            <div> <?= $day['libelle_planning'] ?> </div>
                        </div>
                        <?php
                            }
                            
                        
                        $column++;

                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php 
        $ligne++;
        } ?>
        </div>
    </div>
    <form action="/calendar/add" method="post" id="response">
        <input class="send" type="submit" value="Envoyer le planning">
    </form>
</section>