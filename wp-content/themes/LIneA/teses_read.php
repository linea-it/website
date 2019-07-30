<?php

require( $_SERVER['DOCUMENT_ROOT'].'/wp-load.php' );
if (!is_user_logged_in()) {
	header("Location: /");
}

?>
<?php get_header(); ?>
<?php header('Content-Type: text/html; charset=utf-8'); ?>
<?php get_sidebar(); ?>
<div class="clearboth"></div>
    <div id="content" class="conteudo read page" role="main">
            <?php
                require_once 'database.php';
                require_once 'lineadb.php';

                $id = null;

                if (!empty($_GET['id'])) {
                    $id = $_REQUEST['id'];
                }

                // read data
                if ($id != null) {
                    $pdo = Database::connect();
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "SELECT * from teses WHERE id = ?";
                    $q = $pdo->prepare($sql);
                    $q->execute(array($id));
                    $result = $q->fetchAll();
                    $row = $result[0];

                    Database::disconnect();
                }

            ?>

            <main class="container">
            <section>
                <h1>Descrição</h1>
                <?php
                    echo '<p><strong>Autor:</strong> ' . $row['autor'] . '</p>';
                    echo '<p><strong>Título:</strong> ' . $row['titulo'] . '</p>';
                    echo '<p><strong>Ano:</strong> ' . $row['ano'] . '</p>';
                    echo '<p><strong>Instituição:</strong> ' . $row['instituicao'] . '</p>';
                    echo '<p><strong>Orientador:</strong> ' . $row['orientador'] . '</p>';
                ?>
                <div>
                    <a class="btn" href="<?php echo get_bloginfo('template_url') . '/teses_update.php?id=' . $id ?>">Editar</a>
                    <a class="btn" href="/new-teses/">Voltar</a>
                </div>
            </section>
            </main>
    </div>
    <div class="clearboth"></div>
<?php get_footer(); ?>
