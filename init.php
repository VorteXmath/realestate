<?php
ob_start();
session_start();
date_default_timezone_set('Europe/Istanbul');
define("PATH", $_SERVER['DOCUMENT_ROOT'] . '/php_realestate');
require_once(PATH . "/class/connect.php");
require_once(PATH . "/class/timeAgo.php");
require_once(PATH . "/class/money_format.php");
require_once(PATH . "/class/security.php");
$connect = new Connect();

