<?php
/*
Template Name: Blog Posts
*/
?>

<?php get_header(); ?>
<?php get_sidebar(); ?>
<div class="clearboth"></div>
	<div id="content" class="conteudo blogs" role="main">
        <?php
        $posts_by_year = posts_by_year();
        $num_posts = 0;
        foreach($posts_by_year as $year){
            $num_posts += count($year);
        }
        ?>
        <h1>Noticias <span class="countnum card"><?php echo sprintf("%02d", $num_posts);?></span></h1>
        <a class="btn" onclick="showAll('year')"> Mostrar </a>
        <a class="btn" onclick="hideAll('year')"> Esconder </a>
		<?php foreach($posts_by_year as $year => $posts) : ?>
		  <?php
		  	$today = getdate();
		  	if ($year == $today[year]) {
		  		$display = 'block';
		  	} else {
		  		$display = 'none';
		  	}
		  ?>
		  <a onclick="toggleYear('<?php echo $year; ?>')"><h2><?php echo $year; ?> <span class="countnum card"><?php echo sprintf("%02d", count($posts));?></span></h2></a>
		  	<div style="display: <?php echo $display?>" class="year" id="<?php echo $year; ?>">
			    <?php $rposts = array_reverse($posts);?>
			    <?php foreach($rposts as $post) : setup_postdata($post); ?>
			    	<div class="post-sumary">  
				        <a href="<?php the_permalink(); ?>">
				        <?php 
				        	$post_id_img_default = 4017;
							if ( has_post_thumbnail() ) {
								the_post_thumbnail('thumbnail');
							} else {
								echo get_the_post_thumbnail($post_id_img_default, 'thumbnail');
							}
						?>
				        <h3><?php the_title(); ?></h3>
				        </a>
				        <p><?php echo get_the_date('d \d\e F \d\e Y'); ?></p>
				    </div>    
			      	<div class="clearboth"></div>
			    <?php endforeach; ?>
			</div>
			<div class="clearboth"></div>
		<?php endforeach; ?>
	
				
	</div><div class="clearboth"></div>
<?php get_footer(); ?>
