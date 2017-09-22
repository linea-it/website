<?php
/*
Template Name: Afiliados
*/
?>

<?php get_header(); ?>
<?php header('Content-Type: text/html; charset=utf-8'); ?>
<?php get_sidebar(); ?>
<div class="clearboth"></div>
	<div id="content" class="conteudo afiliados" role="main">

		<?php
	    	include 'database.php';
				require_once 'afiliados_functions.php';

	    	$pdo = Database::connect();
	    	$sql = 'SELECT * FROM afiliados ORDER BY nome COLLATE utf8_unicode_ci';
	    	$prep = $pdo->prepare($sql);
	    	$prep->execute();
	    	$result = $prep->fetchAll();
	    	$posdocs = array();
	    	$doutorandos = array();
			$mestrandos = array();
			$graduandos = array();
			$tecnologistas = array();
			$cientistas = array();
            $administrativo = array();
	    	$inativos = array();

            foreach ($result as $row) {
                if (strtoupper($row['status']) == 'ATIVO'){
                    if ($row['cargo'] == 'Pós-doutorando') {
                        array_push($posdocs, $row);
                    } elseif (strtoupper($row['cargo']) == 'DOUTORANDO') {
                        array_push($doutorandos, $row);
                    } elseif (strtoupper($row['cargo']) == 'MESTRANDO') {
                        array_push($mestrandos, $row);
                    } elseif (strtoupper($row['cargo']) == 'GRADUANDO') {
                        array_push($graduandos, $row);
                    } elseif (strtoupper($row['cargo']) == 'TECNOLOGISTA') {
                        array_push($tecnologistas, $row);
                    } elseif (strtoupper($row['cargo']) == 'CIENTISTA') {
                        array_push($cientistas, $row);
                    } elseif (strtoupper($row['cargo']) == 'ADMINISTRATIVO') {
                        array_push($administrativo, $row);
                    }
                } else {
                    array_push($inativos, $row);
                }
            }
            ?>
            <h1>Afiliados <span class="countnum card"><?php printf("%02d", count($result) - count($inativos)) ?></span></h1>

            <?php
	    	if (is_user_logged_in()) {
	       		$login = 'ativado';
	       	} else {
	       		$login = 'desativado';
	       	}

	       	echo (is_user_logged_in() ? '<a class="btn" href="'. get_bloginfo('template_url') .'/afiliados_create.php"> Adicionar </a>' : '');



	    	// Função para trocar @ por imagem
	    	$at_img_url = get_bloginfo('template_url') . '/imagens/at2.png';

	    	function esconde_email ($img_url, $email) {
	    		$at_img_tag = '<img src="' . $img_url . '"/>';
	    		return str_replace("@", $at_img_tag, $email);
	    	}

				function gera_tabela($con, $lista, $titulo, $login) {
					global $at_img_url;
		    	echo '<h3>' . $titulo . '</h3>';
		    	echo '<table class="card">';
		    	echo '<thead>';
		    	echo '<tr>';
		    	echo '<th>Nome <span class="countnum card">' . sprintf("%02d", count($lista)) . '</span></th>';
					echo '<th>Projetos</th>';
		    	echo '<th>Instituição</th>';
		    	echo '<th>e-mail</th>';
					echo '</tr>';
					echo '</thead>';
					echo '<tbody>';
					foreach ($lista as $row) {
						$projetos_string = get_projetos_associados_string($con, $row['id']);
		    		echo '<tr>';
		    		echo '<td class="afiliados-nome-td">' . $row['nome'] . '<a class="icon ' . $login . '" href="'. get_bloginfo('template_url') .'/afiliados_read.php?id='. $row['id'] .'" title="Descrição"><img src="' . get_bloginfo('template_url') . '/imagens/ic_description_white_24dp_2x.png" alt="Read icon"/></a><a class="icon ' . $login . '" href="'. get_bloginfo('template_url') .'/afiliados_update.php?id='. $row['id'] .'" title="Editar"><img src="' . get_bloginfo('template_url') . '/imagens/ic_create_white_24dp_2x.png" alt="Edit icon"/></a><a class="icon ' . $login . '" href="'. get_bloginfo('template_url') .'/afiliados_delete.php?id='. $row['id'] .'" title="Apagar"><img src="' . get_bloginfo('template_url') . '/imagens/ic_remove_circle_outline_white_24dp_2x.png" alt="Remove icon"/></a></td>';
		    		echo '<td class="afiliados-projetos-td">' . $projetos_string . '</td>';
		    		echo '<td class="afiliados-instituicao-td">' . $row['instituicao'] . '</td>';

		    		if ($row['email_linea'] != '') {
		    			echo '<td>' . esconde_email($at_img_url, $row['email_linea']) . '</td>';
		    		} else if ($row['gmail'] != '') {
		    			echo '<td>' . esconde_email($at_img_url, $row['gmail']) . '</td>';
		    		} else {
		    			echo '<td>' . esconde_email($at_img_url, $row['email_alt']) . '</td>';
		    		}
		    		echo '</tr>';
					}
		    	echo '</tbody>';
		    	echo '</table>';
				}

	    	// Afiliados ativos

				// Cientistas
				gera_tabela($pdo, $cientistas, 'Cientistas', $login);

				// Pos-docs
				gera_tabela($pdo, $posdocs, 'Pós-doutorandos', $login);

				// Doutorandos
				gera_tabela($pdo, $doutorandos, 'Doutorandos', $login);

				// Mestrandos
				gera_tabela($pdo, $mestrandos, 'Mestrandos', $login);

				// Graduandos
				gera_tabela($pdo, $graduandos, 'Graduandos', $login);

				// Tecnologistas
				gera_tabela($pdo, $tecnologistas, 'Tecnologistas', $login);

                // Administrativo
				gera_tabela($pdo, $administrativo, 'Administrativo', $login);


	    	// Afiliados inativos

	    	echo '<h3>Ex afiliados</h3>';
	    	echo '<table class="card">';
	    	echo '<thead>';
	    	echo '<tr>';
	    	echo '<th>Nome <span class="countnum card">' . sprintf("%02d", count($inativos)) . '</span></th>';
	    	echo '<th>Posição</th>';
	    	echo '<th>Instituição</th>';
	    	echo '</tr>';
	    	echo '</thead>';
	    	echo '<tbody>';
	    	foreach ($inativos as $row) {
	    		echo '<tr>';
	    		echo '<td>' . $row['nome'] . '<a class="icon ' . $login . '" href="'. get_bloginfo('template_url') .'/afiliados_read.php?id='. $row['id'] .'" title="Descrição"><img src="' . get_bloginfo('template_url') . '/imagens/ic_description_white_24dp_2x.png" alt="Read icon"/></a><a class="icon ' . $login . '" href="'. get_bloginfo('template_url') .'/afiliados_update.php?id='. $row['id'] .'" title="Editar"><img src="' . get_bloginfo('template_url') . '/imagens/ic_create_white_24dp_2x.png" alt="Edit icon"/></a><a class="icon ' . $login . '" href="'. get_bloginfo('template_url') .'/afiliados_delete.php?id='. $row['id'] .'" title="Apagar"><img src="' . get_bloginfo('template_url') . '/imagens/ic_remove_circle_outline_white_24dp_2x.png" alt="Remove icon"/></a></td>';
	    		echo '<td>' . $row['cargo'] . '</td>';
	    		echo '<td>' . $row['instituicao'] . '</td>';
	    		echo '</tr>';
	    	}
	    	echo '</tbody>';
	    	echo '</table>';



        ?>



	</div><div class="clearboth"></div>
<?php get_footer(); ?>
