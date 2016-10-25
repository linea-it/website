<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="campo-busca">
		<input type="text" class="campo-busca" value="<?php echo get_search_query(); ?>" name="s" id="s" />
	</div>
	<div class="botao-busca">
		<input type="image" id="searchsubmit" src="<?php bloginfo('template_url'); ?>/imagens/lente.png" />
	</div>
	<div class="clearboth"></div>
</form>