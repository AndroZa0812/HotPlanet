<?php
include 'core/init.php';
$reviewID = $_POST['reviewID'];

$db->stmt = $db->con()->prepare('DELETE FROM `reviews` WHERE `ID` = ?');
$db->stmt->bindValue(1, $reviewID);
$db->stmt->execute();

$db->stmt = $db->con()->prepare('SELECT r.ID,m.Movie,r.username,r.info,r.upvotes,r.downvotes,r.submissionTime FROM `reviews` r, `movies` m WHERE m.ID = r.movie');
$db->stmt->execute();
$reviews =  $db->stmt->fetchAll();
echo include "templates/admin-review-table.php";
