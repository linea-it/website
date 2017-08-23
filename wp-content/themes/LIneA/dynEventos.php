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

            $category = get_the_category();
            $cat_slug = $category[0]->slug;

            if ($cat_slug == 'eventos-organizacao') {
                include 'eventos_organizacao.php';
            } elseif ($cat_slug == 'eventos-participacao') {
                include 'eventos_participacao.php';
            }

        ?>
    </div>
    <div class="clearboth"></div>
<?php get_footer(); ?>
