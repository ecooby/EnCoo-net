<?php
/**
* @author enCoo Developments © Vladyslav Halimskyi 2018
* @package enCoo/index
*/


ini_set('date.timezone', 'Europe/Warsaw');
error_reporting(E_ALL);
session_start();
header('Content-Type: text/html; charset=utf-8', true);


// system files

define('ROOT', dirname(__FILE__));
define('EC_DEBUG', 1);
require_once(ROOT.'/ec-inc/ec-config/ec-db.php');
require_once(ROOT.'/ec-inc/ec-functions.php');
require_once(ROOT.'/ec-inc/ec-aload.php');
require_once(ROOT.'/ec-inc/ec-core.php');
ini_set('display_errors', EC_DEBUG);

// Call Core
$core = new Core();
echo $core->run();
