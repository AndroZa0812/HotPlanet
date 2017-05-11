<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 08/05/2017
 * Time: 13:30
 */
include 'core/init.php';


$date = $_REQUEST["date"];

if(!empty($date)) {
    $db->stmt = $db->con()->prepare('SELECT * FROM `movie_sessions` WHERE `movieID`=? AND `time`=?');
    $db->stmt->bindValue(1, $movieID);
    $db->stmt->bindValue(1, $date);
    $db->stmt->execute();
    if ($db->stmt->rowCount()) {
        $hasSessions = true;
        $sessions = $db->stmt->fetchAll();
        echo $sessions ;
    } else {
        echo "no dates";
    }
}