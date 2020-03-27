<section class="organizacao">
    <h2>
        Organização
        <span class="countnum card">
            <?php echo sprintf("%02d", count($organizacao)) ?>
        </span>
    </h2>
    <article class="org-internacional">
        <h3>
            Internacional
            <span class="countnum card">
                <?php echo sprintf("%02d", count($org_internacional)) ?>
            </span>
        </h3>
        <?php
            if ($org_internacional) {
                foreach ($org_internacional as $year => $eventos) {
                    $today = getdate();
                    if ($year == $today[year]) {
                        $display = 'block';
                    } else {
                        $display = 'none';
                    }
                    ?>
                    <a onclick="toggleYear('org-internacional-<?php echo $year; ?>')">
                        <h4 class="eventos-year-title"><?php echo $year; ?></h4> <span class="countnum card"><?php echo sprintf("%02d", count($eventos));?></span>
                    </a>
                    <div style="display: <?php echo $display?>" class="evento-year-container" id="org-internacional-<?php echo $year; ?>">
                        <div class="evento-year">
                            <?php 
                            foreach($eventos as $evento){
                                echo show_evento($evento, $login_adm);
                            }
                            ?>
                        </div><!--EVENTO YEAR-->
                    </div><!--EVENTO-YEAR-CONTAINER-->
                    <div class="clearboth"></div>
                <?php
                }
            }
        ?>
    </article>
    <article class="org-nacional">
        <h3>
            Nacional
            <span class="countnum card">
                <?php echo sprintf("%02d", count($org_nacional)) ?>
            </span>
        </h3>
        <?php
            if ($org_nacional) {
                foreach ($org_nacional as $year => $eventos) {
                    $today = getdate();
                    if ($year == $today[year]) {
                        $display = 'block';
                    } else {
                        $display = 'none';
                    }
                    ?>
                    <a onclick="toggleYear('org-nacional-<?php echo $year; ?>')">
                        <h4 class="eventos-year-title"><?php echo $year; ?></h4> <span class="countnum card"><?php echo sprintf("%02d", count($eventos));?></span>
                    </a>
                    <div style="display: <?php echo $display?>" class="evento-year-container" id="org-nacional-<?php echo $year; ?>">
                        <div class="evento-year">
                            <?php 
                            foreach($eventos as $evento){
                                echo show_evento($evento, $login_adm);
                            }
                            ?>
                        </div><!--EVENTO YEAR-->
                    </div><!--EVENTO-YEAR-CONTAINER-->
                    <div class="clearboth"></div>
                <?php
                }
            }
        ?>
    </article>
</section>
