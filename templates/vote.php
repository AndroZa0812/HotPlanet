<?php

include '../core/init.php';
$MassageID = $_POST['MassageID'];
$typeOfVote = $_POST['typeOfVote'];
    if($typeOfVote == 1) {
        $db->stmt = $db->con()->prepare('UPDATE `reviews` SET upvotes = upvotes + 1 where ID = ?');
        $db->stmt->bindValue(1, $MassageID);
        $db->stmt->execute();
    }
    else{
        $db->stmt = $db->con()->prepare('UPDATE `reviews` SET downvotes = downvotes + 1 where ID = ?');
        $db->stmt->bindValue(1, $MassageID);
        $db->stmt->execute();
    }

$db->stmt = $db->con()->prepare('SELECT * FROM `users`');
$db->stmt->execute();
$users =  $db->stmt->fetchAll();

include "templates/review-table.php";
