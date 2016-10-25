<?php
session_start();

require_once("../infra/ErrorHandler.php");

header('Content-Type: text/html; charset=utf-8');

if(!isset($_SESSION["lang"])) {
    $_SESSION["lang"] = "en_US";
}

/**
 * Created by PhpStorm.
 * User: Home Work
 * Date: 26/07/2014
 * Time: 19:05
 */
?>
<html>
<head>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>
<body>
<div id="messages"></div>
<input id="i18n" type="hidden" relativePath="../i18n" value="<?php echo $_SESSION["lang"]; ?>" />
<form id="registerForm">
    <input type="submit" value="Submit">
</form>
</body>
<script src="../js/jquery-1.11.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/i18n.js"></script>
<script src="../js/dialogs.js"></script>
<script src="../js/userRegistration.js"></script>
</html>
