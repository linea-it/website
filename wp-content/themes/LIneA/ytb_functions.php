<?php


function getID($URL) {
	// Baseado em regex encontrada em https://gist.github.com/FinalAngel/1876898

	$pattern = "(youtu(?:\.be|be\.com)\/(?:.*v(?:\/|=)|(?:.*\/)?)([\w'-]+))";
	preg_match($pattern, $URL, $matches);
	if (!empty($matches[1])) {
		return trim($matches[1]);
	} else {
		return false;
	}
}


?>