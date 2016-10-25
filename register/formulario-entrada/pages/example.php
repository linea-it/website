<?php

// include i18n class and initialize it
require_once '../classes/i18n.class.php';

header('Content-Type: text/html; charset=utf-8');

$i18n = new i18n('../i18n/{LANGUAGE}.json', '../i18n/cache', 'en_US');
$i18n->setSectionSeperator('_');
// Parameters: language file path, cache dir, default language (all optional)
//$i18n->setForcedLang($_SESSION['lang']);
// init object: load language files, parse them if not cached, and so on.
$i18n->init();
?>

<form method="GET" action="example.php">
    <select name="lang">
        <option value="en_US">English</option>
        <option value="pt_BR">Português Brasileiro</option>
    </select>
    <input type="submit" value="Change language"/>
</form>

<!-- get applied language -->
<p>Applied Language: <?php echo $i18n->getAppliedLang(); ?> </p>

<!-- get the cache path -->
<p>Cache path: <?php echo $i18n->getCachePath(); ?></p>

<!-- Get some greetings -->
<p>Error: <?php echo L::dialogTitles_error ?></p>
<p>A greeting: <?php echo L::greeting; ?></p>
<p>Something other: <?php echo L::category_somethingother; ?></p><!-- normally sections in the ini are seperated with an underscore like here. -->
