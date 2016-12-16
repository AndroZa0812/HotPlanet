<?php
session_start();
$_SESSION["LOGIN"]="Guest";
$_SESSION["UserName"]="Guest";
spl_autoload_register('LoadClasses');

define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'website');


function LoadClasses($className)
{
    include $_SERVER['DOCUMENT_ROOT'] . '/classes/' . $className . '.php';
}

$db = new Database();



