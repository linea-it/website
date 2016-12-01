<?php
/*
Template Name: Tutoriais
*/
?>
<?php get_header(); ?>
<?php header('Content-Type: text/html; charset=utf-8'); ?>
<?php get_sidebar(); ?>
	<div id="content" class="conteudo tuto-page" role="main">
		
		<h1>Tutorials</h1>
		<?php
			include 'database.php';
	    	require 'ytb_functions.php';

	    	$pdo = Database::connect();
	    	$sql = 'SELECT * FROM tutoriais';
	    	$prep = $pdo->prepare($sql);
	    	$prep->execute();
	    	$result = $prep->fetchAll();

	    	Database::disconnect();


	    function showTutorial($tutoriais) {

	    	echo '<div class="tutoriais">';
	    	foreach ($tutoriais as $row) {
	    		$ytbID = getID($row['link']);
	    		echo '<a href="' . $row['link'] . '">';
	    		echo '<div class="tutorial_card">';
	    		echo '<img src="http://img.youtube.com/vi/' . $ytbID . '/hqdefault.jpg"/>';
	    		echo '</div>';
	    		echo '</a>';
	    	}
	    	echo '</div>';
	    	echo '<div class="clearboth"></div>';

	    }
	    


	    echo "<p>The videos below are a sequence of demonstrations of the portal operation, focusing on the photo-z related tasks. The first video (video \"number zero\") gives an overview of the whole process and some details about each pipeline. The others are examples of live runs and exploration of the product logs, numbered according to their order in the E2E chain.</p>";

	    
	    $count = 0;
	    $julia_tut = array();
	    foreach (range(0, 4) as $num) {
        	foreach ($result as $row) {
        		if ($row['numero'] == $num) {
        			array_push($julia_tut, $row);
        			$count += 1;
        		} else if ($row['numero'] == 5) {
        			$playlist = $row;
        		} 
        	}
        }

        echo '<div class="playlist"><a href=' . $playlist['link'] . ' ><img src="' . get_bloginfo('template_url') . '/imagens/ic_transp.png" alt="Playlist icon"/><span>Playlist</span></a></div>';
        if ( $count > 0 ) {
        	showTutorial($julia_tut);
        }
		
		?>
	</div><!-- .content-area -->
	<div class="clearboth"></div>
<?php get_footer(); ?>
