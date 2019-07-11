<?php

session_start();
define('MAIN_PATH', __DIR__);
require_once MAIN_PATH . DIRECTORY_SEPARATOR . 'libs/AutoLoader.php';
require_once 'config/Db.php';
use libs\AutoLoader;
use libs\Bootstrap;
$loader = new AutoLoader();
spl_autoload_register([$loader, 'AutoLoad']);

$boot = new Bootstrap();

