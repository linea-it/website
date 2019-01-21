<?php
/*
Template Name: page-docs-folders
*/
?>
<?php

require_once 'database.php';
require_once 'page-docs-functions.php';

if (is_user_logged_in()) {
        $login = 'ativado';
    } else {
        $login = 'desativado';
}

?>
<?php get_header(); ?>
<?php header('Content-Type: text/html; charset=utf-8'); ?>
<?php get_sidebar(); ?>
<div class="clearboth"></div>
    <div id="content" class="conteudo documentos" role="main">
        <?php
            $query_result = new WP_Query( array('post_type' => 'documento', 'posts_per_page' => -1) );
            $num_documentos = count($query_result->posts);
        ?>
        <h1>Documentos <span class="countnum card"><?php echo sprintf("%02d", $num_documentos); ?></span></h1>
        <?php

        $grupo_parent = 0;
        if (isset($_GET["categoria_id"])){
            $grupo_parent = $_GET["categoria_id"];
        }
        the_breadcrumb($grupo_parent);

        // Folders
        $grupos = get_terms( array(
            'taxonomy' => 'categoria',
            'parent' => $grupo_parent,
            'hide_empty' => false
            )
        );
        ?>
        <div class="folders-container">
        <?php
        foreach($grupos as $grupo) {
            // Grupos
            $page_id = get_the_ID();
            $url = get_page_link($page_id) . "?categoria_id=" . $grupo->term_id;
            $img_folder_src = get_bloginfo('template_url') . '/imagens/folder.png';
            ?>
            <div class="folder-card">
                <a class="folder-link" href="<?php echo $url;?>">
                    <img class="folder-icon" src="<?php echo $img_folder_src; ?>" alt="Folder Icon"/>
                    <p class="folder-name">
                        <?php echo $grupo->name ?>
                        
                    </p>
                    <span class="countnum card folder-countnum"><?php echo sprintf("%02d", get_num_documentos_grupo($grupo->slug)); ?></span>
                </a>
            </div>
            <?php
        }
        ?>
        </div><!--folders-containers-->
        <?php

        //Lista documentos do grupo_parent
        if ($grupo_parent != 0) {
            $args = array(
                'post_type' => 'documento',
                'orderby' => 'title',
                'order' => 'ASC',
                'posts_per_page' => -1,
                'tax_query' => array (
                    array(
                        'taxonomy' => 'categoria',
                        'field' => 'term_id',
                        'terms' => $grupo_parent,
                        'include_children' => false
                    )
                )
            );

            $query_result = new WP_Query($args);
            $num_documentos = count($query_result->posts);
                ?>
                <!--h2>
                    <?php echo get_term($grupo_parent, 'categoria')->name; ?>
                    <span class="countnum card"><?php echo sprintf("%02d", $num_documentos); ?></span>
                </h2-->
                <?php
            if ($query_result->have_posts()) {
                ?>
                <div class="docs-container">
                <?php
                while($query_result->have_posts()) {
                    $query_result->the_post();
                    
                    $documento_url = get_post_meta(get_the_ID(), 'documento_url', true);
                    $row_documentos = array(
                    'v_titulo' => get_the_title(),
                    'v_documento' => $documento_url
                    );
                    $permissao = get_permissao(get_the_ID());
                    echo documento_card($row_documentos, $permissao);

                }
            ?>
            </div>
            <?php
            }
            else{
                ?>
                <p class="no-documentos">Sem documentos nessa categoria</p>
                <?php
            }
        }
        ?>
  </div>
<div class="clearboth"></div>
<?php get_footer(); ?>
