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
            $participacao = get_eventos_por_ano(get_eventos_envolvimento($pdo, 'Participacao'));

            $org_nacional = array();
            $org_internacional = array();

            $org_nacional = get_eventos_por_ano(get_org_porte($organizacao, 'Nacional'));
            $org_internacional = get_eventos_por_ano(get_org_porte($organizacao, 'Internacional'));

            if (current_user_can('administrator')) {
                $login = 'ativado';
            } else {
                $login = 'desativado';
            }

            echo (current_user_can('administrator') ? '<a class="btn" href="'. get_bloginfo('template_url') .'/eventos_create.php"> Adicionar </a>' : '');
            ?>
            <a class="btn" onclick="showAll('evento-year-container')"> Mostrar </a>
            <a class="btn" onclick="hideAll('evento-year-container')"> Esconder </a>
            
            <?php

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
