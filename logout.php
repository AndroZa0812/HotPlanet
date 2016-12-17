<?php include 'core/init.php';

if($_SESSION['LOGIN']) {
    $_SESSION["LOGIN"] = false;
    $_SESSION["UserName"] = "Guest";
}

header('Location: index.php');