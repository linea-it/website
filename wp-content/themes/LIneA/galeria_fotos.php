<?php
/*
Template Name: Galeria de Fotos
*/
?>
<?php
include 'database.php';
require 'lineadb.php';
require_once 'afiliados_functions.php';

$pdo = Database::connect();
?>
<?php get_header(); ?>
<?php header('Content-Type: text/html; charset=utf-8'); ?>
<?php get_sidebar(); ?>
<div class="clearboth"></div>
    <div id="content" class="conteudo afiliados" role="main">
        <h1><?php echo get_the_title() ?></h1>
        <div class="filters-container">
            <ul class="grid-afiliados-filters">
                <li class="title">Filtrar por: </li>
                <li class="filter active-filter" data-filter="*">Todos</li>
                <?php
                $result = get_cargos($pdo);
                foreach($result as $row) {
                    ?>
                    <li class="filter" data-filter=".<?php echo $row['cargo'];?>"><?php echo $row['cargo']; ?></li>
                    <?php
                }
                ?>
            </ul>
        </div>
        <br/>
        <div class="filters-container">
            <ul class="grid-afiliados-filters">
                <li class="title">Organizar por: </li>
                <li class="sort active-filter grid-sort-name">Nome</li>
                <li class="sort grid-sort-institution">Instituição</li>
            </ul>
        </div>
        <div class="grid-afiliados">
            <?php
            $afiliados = get_todos_afiliados_ativos($pdo);
            foreach($afiliados as $afiliado){
                echo card_afiliado($afiliado);
            }
            ?>
        </div><!--GRID AFILIADOS-->
    </div><!-- MAIN -->
<div class="clearboth"></div>
<?php get_footer(); ?>
