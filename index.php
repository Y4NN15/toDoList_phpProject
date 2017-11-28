<?php

require_once(__DIR__.'/config/config.php');

// Autoloader
require_once(__DIR__.'/config/SplClassLoader.php');
$myLibLoader = new SplClassLoader('controle', './');
$myLibLoader->register();
$myLibLoader = new SplClassLoader('config', './');
$myLibLoader->register();
$myLibLoader = new SplClassLoader('modeles', './');
$myLibLoader->register();

$cont = new \controle\Controller();

?>