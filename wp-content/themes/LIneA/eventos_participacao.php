<section class="participacao">
    <h2>
        Participação
        <span class="countnum card">
            <?php echo sprintf("%02d", count($participacao)) ?>
        </span>
    </h2>
    <?php
        if ($participacao) {
            foreach ($participacao as $year => $eventos) {
                $today = getdate();
                if ($year == $today[year]) {
                    $display = 'block';
                } else {
                    $display = 'none';
                }
                ?>
                <a onclick="toggleYear('participacao-<?php echo $year; ?>')">
                    <h3 class="eventos-year-title"><?php echo $year; ?></h3> <span class="countnum card"><?php echo sprintf("%02d", count($eventos));?></span>
                </a>
                <div style="display: <?php echo $display?>" class="evento-year-container" id="participacao-<?php echo $year; ?>">
                    <div class="evento-year">
                        <?php 
                        foreach($eventos as $evento){
                            echo show_evento($evento, $login);
                        }
                        ?>
                    </div><!--EVENTO YEAR-->
                </div><!--EVENTO-YEAR-CONTAINER-->
                <div class="clearboth"></div>
            <?php
            }
        }
    ?>
</section>
