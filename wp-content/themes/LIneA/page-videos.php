<?php
/*
Template Name: page-videos
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
            $query_result = new WP_Query( array('post_type' => 'video') );
            $num_videos = count($query_result->posts);
        ?>
		<h1>Videos <span class="countnum card"><?php echo sprintf("%02d", $num_videos); ?></span></h1>

		<?php
        $grupos = get_terms( array(
            'taxonomy' => 'grupo',
            'parent' => 0
            )
        );
        foreach($grupos as $grupo) {
            // Grupos
            ?>
            <h2 class="video-grupo-titulo">
                <i class="fa fa-caret-right"></i>
                <?php echo $grupo->name ?>
            <span class="countnum card"><?php echo sprintf("%02d", get_num_videos_grupo($grupo->slug)); ?></span>
            </h2>
            <div class="video-grupo">
            <?php

            //SubGrupos
            $subgrupos = get_terms( array(
                'taxonomy' => 'grupo',
                'parent' => $grupo->term_id
            ));
            if (!empty($subgrupos)) {
                // Lista videos do subgrupo
                $subgrupos_slugs = array();
                foreach($subgrupos as $subgrupo) {
                    array_push($subgrupos_slugs, $subgrupo->slug);
                }
                
                foreach($subgrupos as $subgrupo) {
                    
                    $query_result = get_videos_por_subgrupo($subgrupo);
                    
                    ?>
                    <div class="subgrupo-container">
                    <h3 class="video-subgrupo-titulo">
                        <i class="fa fa-caret-right"></i>
                        <?php echo $subgrupo->name ?>
                    <span class="countnum card"><?php echo sprintf("%02d", count($query_result->posts)); ?></span>
                    </h3>

                    <div class="video-subgrupo">
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
                                    <?php
                                }
                                $ano_atual = $ano_post;
                                ?>
                                <span class="ano-atual"><?php echo $ano_atual ?></span>
                                <div class="ano-container">
                                
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
                    }
                    ?>
                    </div><!-- FIM ANO-CONTAINER -->
                    </div><!-- FIM VIDEO-SUBGRUPO -->
                    </div><!-- FIM SUBGRUPO-CONTAINER -->
                    <?php
                }
            }
            
            //Lista videos do grupo sem subgrupo
            $args = array(
                'post_type' => 'video',
                'orderby' => 'date',
                'tax_query' => array (
                    array(
                        'taxonomy' => 'grupo',
                        'field' => 'slug',
                        'terms' => $grupo->slug
                    )
                )
            );

            $query_result = new WP_Query($args);
            if ($query_result->have_posts()) {
                $ano_atual = '';
                while($query_result->have_posts()) {
                    $query_result->the_post();
                    $ano_post = get_the_date('Y');
                    if ($ano_post != $ano_atual) {
                        if ($ano_atual != '') {
                            ?>
                            </div>
                            <?php
                        }
                        $ano_atual = $ano_post;
                        ?>
                        <span class="ano-atual"><?php echo $ano_atual ?></span>
                        <div class="ano-container">
                        
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
            }
            ?>
            </div><!-- FIM ANO-CONTAINER -->
            </div><!-- FIM VIDEO-GRUPO -->
            <?php
        }
?>  
  </div>
<div class="clearboth"></div>
<?php get_footer(); ?>
