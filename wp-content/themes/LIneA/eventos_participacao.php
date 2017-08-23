<section class="participacao">
    <h2>
        Participação
        <span class="countnum card">
            <?php echo sprintf("%02d", count($participacao)) ?>
        </span>
    </h2>
    <?php
        if ($participacao) {
            foreach ($participacao as $row) {
                echo show_evento($row, $login);
            }
        }
    ?>
</section>
