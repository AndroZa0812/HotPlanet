<?php
include 'core/init.php';
$userID = $_POST['UserID'];

$db->stmt = $db->con()->prepare('DELETE FROM `users` WHERE `ID` = ?');
$db->stmt->bindValue(1, $userID);
$db->stmt->execute();

$db->stmt = $db->con()->prepare('SELECT * FROM `users`');
$db->stmt->execute();
$users =  $db->stmt->fetchAll();
echo include "templates/user-table.php";
