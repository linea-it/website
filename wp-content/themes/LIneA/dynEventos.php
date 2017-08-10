<?php
/*
Template Name: eventos
*/
?>

<?php get_header(); ?>
<?php header('Content-Type: text/html; charset=utf-8'); ?>
<?php get_sidebar(); ?>
<div class="clearboth"></div>
    <div id="content" class="conteudo eventos" role="main">
        <h1>Eventos</h1>

        <?php
            require_once 'database.php';
            require_once 'eventos_functions.php';
            $pdo = Database::connect();
            $pdo->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );

            $organizacao = get_eventos_envolvimento($pdo, 'Organizacao');
            $participacao = get_eventos_envolvimento($pdo, 'Participacao');

            $org_nacional = array();
            $org_internacional = array();

            $org_nacional = get_org_porte($organizacao, 'Nacional');
            $org_internacional = get_org_porte($organizacao, 'Internacional');

            if (is_user_logged_in()) {
                $login = 'ativado';
            } else {
                $login = 'desativado';
            }

            echo (is_user_logged_in() ? '<a class="btn" href="'. get_bloginfo('template_url') .'/eventos_create.php"> Adicionar </a>' : '');
        ?>
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
    </div>
    <div class="clearboth"></div>
<?php get_footer(); ?>
