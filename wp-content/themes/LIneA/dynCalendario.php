<?php
/*
Template Name: calendario
*/
?>

<?php get_header(); ?>
<?php header('Content-Type: text/html; charset=utf-8'); ?>
<?php get_sidebar(); ?>
<div class="clearboth"></div>
    <div id="content" class="conteudo calendario" role="main">
        <h1>Calendário</h1>

        <?php
            require_once 'database.php';
            require_once 'eventos_functions.php';

            if (is_user_logged_in()) {
                $login = true;
            } else {
                $login = false;
            }

            $pdo = Database::connect();
            $pdo->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );

            $calendario = array_reverse(get_eventos($pdo, 'Calendario', $login));
            $calendario_por_ano = get_eventos_por_ano($calendario);
            
            if (current_user_can('administrator')) {
                $login_adm = 'ativado';
            } else {
                $login_adm = 'desativado';
            }

            echo (current_user_can('administrator') ? '<a class="btn" href="'. get_bloginfo('template_url') .'/eventos_create.php?last_page=' . get_page_uri() . '"> Adicionar </a>' : '');
            ?>
            
            <div class="content">
            <div class="tabs-content">
                <div class="tabs-menu">
                    <ul>
                        <?php
                        $today = getdate();
                        foreach (range(date('Y'), 2018, -1) as $ano){
                            ?>
                                <li>
                                    <a class="<?php echo $today[year] == $ano ? 'active-tab-menu':'inactive-tab-menu'?>" href="#" data-tab="tab<?php echo $ano?>"><?php echo $ano?></a>
                                </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
                <?php
                foreach (range(date('Y'), 2018, -1) as $ano){
                    ?>
                    <div class="tab<?php echo $ano?> tabs <?php echo $today[year] == $ano ? 'first-tab':''?>">
                        <?php
                        $primeiro_mes = true;
                        foreach ($calendario_por_ano[$ano] as $evento){
                            $evento_mes = utf8_encode(strftime('%B', strtotime($evento['data_inicial'])));
                            if ($primeiro_mes || $evento_mes != $mes){
                                if ($evento_mes != $mes){
                                    ?>
                                    </table>
                                    <?php
                                }
                                $primeiro_mes = false;
                                $mes = $evento_mes;
                                ?>
                                <table class="card">
                                <thead>
                                    <tr>
                                    <th colspan="3"><?php echo $mes?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                            }
                            ?>
                            <tr>
                                <td class="data">
                                    <?php echo show_intervalo_data_calendario(strtotime($evento['data_inicial']), strtotime($evento['data_final'])) ?>
                                </td>
                                <td class="nome">
                                    <?php
                                    if ($evento['link']){
                                        ?>
                                        <a href="<?php echo $evento['link']?>">
                                        <?php
                                    }
                                    ?>
                                    <?php echo $evento['titulo']?>
                                    <?php
                                    if ($evento['link']){
                                        ?>
                                        </a>
                                        <?php
                                    }
                                    echo show_action_icon('Editar', 'update.png', 'eventos_update.php', $evento['id'], $login_adm);
                                    echo show_action_icon('Apagar', 'delete.png', 'eventos_delete.php', $evento['id'], $login_adm);
                                    ?>
                                </td>
                                <td class="local"><?php echo $evento['local']?></td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                        </table>
                    </div>
                    <?php
                }
                ?>
            </div>
            </div>
            <?php

            

        ?>
    </div>
    <div class="clearboth"></div>
<?php get_footer(); ?>
