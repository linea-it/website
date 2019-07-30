<?php
/*
Template Name: Teses
*/
?>

<?php get_header(); ?>
<?php header('Content-Type: text/html; charset=utf-8'); ?>
<?php get_sidebar(); ?>
<div class="clearboth"></div>
	<div id="content" class="conteudo teses" role="main">

		<?php
            include 'database.php';
            require 'lineadb.php';

	    	$pdo = Database::connect();
	    	$sql = 'SELECT * FROM teses ORDER BY ano DESC';
	    	$prep = $pdo->prepare($sql);
	    	$prep->execute();
	    	$result = $prep->fetchAll();
	    	
	    	$teses_doutorado = array();
			$teses_mestrado = array();

            foreach ($result as $row) {
                if (strtoupper($row['tipo']) == 'MESTRADO'){
                    array_push($teses_mestrado, $row);
                } else if (strtoupper($row['tipo']) == 'DOUTORADO'){
                    array_push($teses_doutorado, $row);
                }
            }
            ?>
            <h1>Teses e Dissertações <span class="countnum card"><?php printf("%02d", count($result)) ?></span></h1>

            <?php
	    	if (current_user_can('administrator')) {
	       		$login = 'ativado';
	       	} else {
	       		$login = 'desativado';
	       	}

	       	echo (current_user_can('administrator') ? '<a class="btn" href="'. get_bloginfo('template_url') .'/teses_create.php"> Adicionar </a>' : '');


            function gera_tabela($con, $lista, $titulo, $login) {
                echo '<h3>' . $titulo . '</h3>';
                echo '<div class="table-teses-container">';
                echo '<table class="card">';
                echo '<thead>';
                echo '<tr>';
                echo '<th>Autor <span class="countnum card">' . sprintf("%02d", count($lista)) . '</span></th>';
                echo '<th>Título</th>';
                echo '<th>Ano</th>';
                echo '<th>Instituição</th>';
                echo '<th>Orientador</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                foreach ($lista as $row) {
                    echo '<tr>';
                    echo '<td class="teses-autor-td">' . $row['autor'] . '<a class="icon ' . $login . '" href="'. get_bloginfo('template_url') .'/teses_read.php?id='. $row['id'] .'" title="Descrição"><img src="' . get_bloginfo('template_url') . '/imagens/ic_description_white_24dp_2x.png" alt="Read icon"/></a><a class="icon ' . $login . '" href="'. get_bloginfo('template_url') .'/teses_update.php?id='. $row['id'] .'" title="Editar"><img src="' . get_bloginfo('template_url') . '/imagens/ic_create_white_24dp_2x.png" alt="Edit icon"/></a><a class="icon ' . $login . '" href="'. get_bloginfo('template_url') .'/teses_delete.php?id='. $row['id'] .'" title="Apagar"><img src="' . get_bloginfo('template_url') . '/imagens/ic_remove_circle_outline_white_24dp_2x.png" alt="Remove icon"/></a></td>';
                    echo '<td class="teses-titulo-td">' . $row['titulo'] . '</td>';
                    echo '<td class="teses-ano-td">' . $row['ano'] . '</td>';
                    echo '<td class="teses-instituicao-td">' . $row['instituicao'] . '</td>';
                    echo '<td class="teses-orientador-td">' . $row['orientador'] . '</td>';
                    echo '</tr>';
                }
                echo '</tbody>';
                echo '</table>';
                echo '</div>';
            }

            // Teses de Doutorado
            gera_tabela($pdo, $teses_doutorado, 'Teses de Doutorado', $login);

            // Dissertações de Mestrado
            gera_tabela($pdo, $teses_mestrado, 'Dissertações de Mestrado', $login);

        ?>



	</div><div class="clearboth"></div>
<?php get_footer(); ?>
