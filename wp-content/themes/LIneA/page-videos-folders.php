<?php
/*
Template Name: page-videos-folders
*/
?>
<?php

require_once 'database.php';
require_once 'page-videos-functions.php';

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
    <div id="content" class="conteudo videos" role="main">
        <?php
            $query_result = new WP_Query( array('post_type' => 'video', 'posts_per_page' => -1) );
            $num_videos = count($query_result->posts);
        ?>
        <h1>Videos <span class="countnum card"><?php echo sprintf("%02d", $num_videos); ?></span></h1>
        <?php

        $grupo_parent = 0;
        if (isset($_GET["grupo_id"])){
            $grupo_parent = $_GET["grupo_id"];
        }
        the_breadcrumb($grupo_parent);

        // Folders
        $grupos = get_terms( array(
            'taxonomy' => 'grupo',
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
            $url = get_page_link($page_id) . "?grupo_id=" . $grupo->term_id;
            $img_folder_src = get_bloginfo('template_url') . '/imagens/folder.png';
            ?>
            <div class="folder-card">
                <a class="folder-link" href="<?php echo $url;?>">
                    <img class="folder-icon" src="<?php echo $img_folder_src; ?>" alt="Folder Icon"/>
                    <p class="folder-name">
                        <?php echo $grupo->name ?>
                        
                    </p>
                    <span class="countnum card folder-countnum"><?php echo sprintf("%02d", get_num_videos_grupo($grupo->slug)); ?></span>
                </a>
            </div>
            <?php
        }
        ?>
        </div><!--folders-containers-->
        <?php

        //Lista videos do grupo_parent
        if ($grupo_parent != 0) {
            $args = array(
                'post_type' => 'video',
                'orderby' => 'date',
                'posts_per_page' => -1,
                'tax_query' => array (
                    array(
                        'taxonomy' => 'grupo',
                        'field' => 'term_id',
                        'terms' => $grupo_parent,
                        'include_children' => false
                    )
                )
            );

            $query_result = new WP_Query($args);
            $num_videos = count($query_result->posts);
                ?>
                <!--h2>
                    <?php echo get_term($grupo_parent, 'grupo')->name; ?>
                    <span class="countnum card"><?php echo sprintf("%02d", $num_videos); ?></span>
                </h2-->
                <a class="btn" onclick="showAll('ano-hide')"> Mostrar </a>
                <a class="btn" onclick="hideAll('ano-hide')"> Esconder </a>
                <?php
            if ($query_result->have_posts()) {

                $ano_atual = '';
                while($query_result->have_posts()) {
                    $query_result->the_post();
                    $ano_post = get_the_date('Y');
                    if ($ano_post != $ano_atual) {
                        if ($ano_atual != '') {
                            ?>
                            </div>
                            </div>
                            <?php
                        }
                        $ano_atual = $ano_post;
                        $today = getdate();
                        if ($ano_atual == $today[year]) {
                            $display = 'block';
                        } else {
                            $display = 'none';
                        }
                        ?>
                        <a class="ano-atual" onclick="toggleYear('<?php echo $ano_atual; ?>')">
                            <h2 class="ano-atual"><?php echo $ano_atual ?>
                                <span class="countnum card"><?php echo sprintf("%02d", get_num_videos_ano($query_result, $ano_atual)); ?></span>
                            </h2>
                        </a>
                        <div style="display: <?php echo $display?>" class="ano-hide" id="<?php echo $ano_atual; ?>">
                        <div  class="ano-container">
                        
                        <?php
                    }
                    $video_url = get_post_meta(get_the_ID(), 'video_url', true);
                    $row_videos = array(
                    'v_titulo' => get_the_title(),
                    'v_video' => $video_url
                    );
                    $permissao = get_permissao(get_the_ID());
                    echo video_card($row_videos, $permissao);
                }
            ?>
            </div>
            </div>
            <?php
            }
            else{
                ?>
                <p class="no-videos">Sem vídeos nessa categoria</p>
                <?php
            }
        }
        ?>
  </div>
<div class="clearboth"></div>
<?php get_footer(); ?>
