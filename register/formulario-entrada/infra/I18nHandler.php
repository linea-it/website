<?php
session_start();

//require_once("../infra/ErrorHandler.php");
require_once('../classes/i18n.class.php');


$i18n = new i18n('../i18n/{LANGUAGE}.json', '../i18n/cache', 'en_US');
$i18n->setSectionSeperator('_');
$i18n->init();

if(isset($_GET["lang"])) {
    $_SESSION["lang"] = $_GET["lang"];
} else {
    if(!isset($_SESSION["lang"])) {
        $_SESSION["lang"] = "en_US";
    }
}