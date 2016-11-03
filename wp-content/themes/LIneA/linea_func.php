<?php

// Funções

function resumo($str) {

	if ( strlen($str) <= 40 ) {
		return $str;
	} else {
		return substr($str, 0, 15) . ' .... ' . substr($str, -15);
	}

}

?>