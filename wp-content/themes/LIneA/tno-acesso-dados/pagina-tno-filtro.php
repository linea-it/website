<?php
  require( $_SERVER['DOCUMENT_ROOT'].'/wp-load.php' );
  get_header();
?>
<?php header('Content-Type: text/html; charset=utf-8'); ?>
<?php get_sidebar(); ?>
<div class="clearboth"></div>
	<div id="content" class="conteudo page" role="main">
		<?php
	    	include '../database.php';
				require_once 'tno-filtro.php';

	    	$pdo = Database::connect();
        $pdo->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );

        if (!empty($_POST)) {
          $nome_tno = $_POST['nome_tno'];
          $data_inicio = $_POST['data_inicio'];
          $data_fim = $_POST['data_fim'];
          $limite = $_POST['limite'];
          if (!isset($_POST['pagina'])) {
            $pagina = 1;
          } else {
            $pagina = $_POST['pagina'];
          }
          $lista_imagens = get_tno_mapas($pdo, $nome_tno, $data_inicio, $data_fim, $limite, $pagina);
          $total_imagens = get_tno_mapas_total($pdo, $nome_tno, $data_inicio, $data_fim);
          $lista_tables = get_tno_tables($pdo, $nome_tno);
        }
		?>
    <main class="pagina-filtro">

      <h1>TNO Filter</h1>

      <!--Filtro-->
  		<section class="filtro-container">
  			<form id="filtro" class="filtro-form" action="<?php echo get_bloginfo('template_url') . '/tno-acesso-dados/pagina-tno-filtro.php' ?>" method="post">
  				<div class="form-grupo">
  					<label>TNO name</label>
  					<?php
            $lista_tno_nomes = get_tno_nomes($pdo);
            $lista_tno_nomes_alternativos = get_tno_nomes_alternativos($pdo);
  					$lista_tno_nomes_merged = merge_nomes_alternativos($lista_tno_nomes, $lista_tno_nomes_alternativos);
  					echo tno_objetos_select($lista_tno_nomes_merged, $lista_tno_nomes_alternativos, $nome_tno);
  					?>
  				</div>
  				<div class="form-grupo">
  					<label>Initial Date</label>
  					<input class="datepicker" type="text" name="data_inicio" placeholder="YYYY-MM-DD" value="<?php echo !empty($data_inicio)?$data_inicio:'';?>">
  				</div>
  				<div class="form-grupo">
  					<label>Final Date</label>
  					<input class="datepicker" type="text" name="data_fim" placeholder="YYYY-MM-DD" value="<?php echo !empty($data_fim)?$data_fim:'';?>">
  				</div>
          <div class="form-grupo">
  					<label>Maps per page</label>
  					<input type="number" name="limite" min="1" max="50" value="<?php echo !empty($limite)?$limite:'10';?>">
  				</div>
  				<button type="submit" class="btn">Filter</button>
        </form>
  		</section>

      <!--Tables-->
      <section class="tno-tables">
        <h2>Tables</h2>
        <?php foreach ($lista_tables as $table) {
          $table_url = TNO_BASE_URL . $table['nome_tno']. '/'
          . $table['ano'] . '/' . $table['nome_arquivo'];
          echo '<p>'. $table['ano'] .': <a href="' . $table_url . '" target="_blank" >' . $table['nome_arquivo'] .'</a></p>';
        }
        ?>
      </section>

      <!--Mapas-->
      <section class="tno-thumbnails">
        <h2>Maps</h2>
        <?php
          $limite_inferior = $limite*($pagina-1)+1;
          $limite_superior = ( $limite*($pagina-1)+$limite > $total_imagens )?$total_imagens:$limite*($pagina-1)+$limite;
          if ( $total_imagens > 0 ) {
            ?>
            <p class="mapas-contador">Showing <?php echo $limite_inferior ?>-<?php echo $limite_superior ?> maps of <?php echo $total_imagens ?></p>
            <?php

            foreach ($lista_imagens as $imagem) {
              $img_url = TNO_BASE_URL . $imagem['nome_tno']. '/'
              . $imagem['ano'] . '/' . $imagem['nome_arquivo'];
              echo '<div class="tno-thumbnail">';
              echo '<a href="' . $img_url . '" target="_blank">';
              echo '<img class="card" src="' . $img_url .'" />';
              echo '</a>';
              echo '<p>' . $imagem['nome_arquivo'] . '</p>';
              echo '</div>';
            }
            echo cria_paginacao($limite, $pagina, $total_imagens);
          } else {
            echo '<p class="sem-imagem-msg" > No maps has been found. </p>';
          }
        ?>
      </section>

    </main>
  </div>
<?php get_footer(); ?>
