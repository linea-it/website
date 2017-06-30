<?php
/*
Template Name: tno-acesso-a-dados
*/
?>

<?php get_header(); ?>
<?php header('Content-Type: text/html; charset=utf-8'); ?>
<?php get_sidebar(); ?>
<div class="clearboth"></div>
	<div id="content" class="conteudo" role="main">
		<h1>TNO Acesso a dados</h1>
		<?php
	    	include 'database.php';
				require_once 'tno-acesso-dados/tno-filtro.php';

	    	$pdo = Database::connect();
		?>
		<div class="filtro-container">
			<form class="filtro-form" action="<?php echo get_bloginfo('template_url') . '/tno-acesso-dados/pagina-tno-filtro.php' ?>" method="post">
				<div class="form-grupo">
					<label>Nome TNO</label>
					<?php
					$lista_tno_nomes = get_tno_nomes($pdo);
					echo tno_objetos_select($lista_tno_nomes);
					?>
				</div>
				<div class="form-grupo">
					<label>Data inicial</label>
					<input type="date" name="data_inicio" value="<?php echo !empty($data_inicio)?$data_inicio:'';?>">
				</div>
				<div class="form-grupo">
					<label>Data Final</label>
					<input type="date" name="data_fim" value="<?php echo !empty($data_fim)?$data_fim:'';?>">
				</div>
				<button type="submit" class="btn">Filtrar</button>
			</form>
		</div>

  </div>
<?php get_footer(); ?>
