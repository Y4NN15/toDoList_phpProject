<?php

require_once(__DIR__.'/config/config.php');

// Autoloader
require_once(__DIR__.'/config/SplClassLoader.php');
$myLibLoader = new SplClassLoader('controller', __DIR__);
$myLibLoader->register();
$myLibLoader = new SplClassLoader('config', '');
$myLibLoader->register();
$myLibLoader = new SplClassLoader('modeles', '');
$myLibLoader->register();

$cont = new \controller\Control();

?>