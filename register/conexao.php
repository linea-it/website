<?php
error_reporting(E_COMPILE_ERROR|RECOVERABLE_ERROR|E_ERROR|E_CORE_ERROR);
ini_set('display_errors', 'On');

$conecta_db = mysql_connect("localhost", "wordpress", "chariklo") or die (mysql_error());

$db = mysql_select_db("test");
?>

