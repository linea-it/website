			<?php wp_footer(); ?>
			<div class="footer">
				<!--<img src="<?php bloginfo('template_url'); ?>/imagens/logo-footer.png" alt="Home" title="Home" /><br />-->
				<p class="tit-footer">LIneA - Laboratório Interinstitucional de e-Astronomia</p>
				<p>Rua General José Cristino, 77 - Vasco da Gama - Rio de Janeiro - RJ - Brasil - 20921-400<br />
				(21) 3504-9165 - <a href="https://goo.gl/maps/W5VT3nFSm7D2" target="_blank">Mapa de Localização</a></p>
			</div>
		</div>
	</body>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/owl-carousel.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/lineajs.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/main.js"></script>
 

<!-- js das abas estatistica -->

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/estatisticas-tickets.js"></script>

<!-- Galeria de Fotos -->

<?php
if (has_tag('mosaico', $post_id)){
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/modernizr.custom.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/classie.js"></script>
    <!--- uncompress-->

    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.elastislide.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.hoverdir.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/elastic_grid.js"></script>

    <!-- compress version-->
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/elastic_grid.min.js"></script>

    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/mosaico-dados.js"></script>
    <?php
}
?>

</html>

