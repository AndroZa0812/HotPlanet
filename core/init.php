<?php
session_start();

define('ROOT', dirname(__DIR__));

if(!isset($_SESSION['LOGIN'])) {
    $_SESSION["LOGIN"] = false;
    $_SESSION["UserName"] = "Guest";
}

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

function array_delete($idx,$array) {
    unset($array[$idx]);
    return (is_array($array)) ? array_values($array) : null;
}


