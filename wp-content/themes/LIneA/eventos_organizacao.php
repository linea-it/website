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
                foreach ($org_internacional as $row) {
                    echo show_evento($row, $login);
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
                foreach ($org_nacional as $row) {
                    echo show_evento($row, $login);
                }
            }
        ?>
    </article>
</section>
