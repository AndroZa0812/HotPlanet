<?php
include '../core/init.php';
date_default_timezone_set('Asia/Jerusalem');
if(isset($_POST['token']) && isset($_POST['massage']) && isset($_POST["MovieID"]))
{
    if(Token::check($_POST['token']))
    {
        $date = date('Y-m-d H:i:s');
        $review = $_POST['massage'];
        $db->stmt = $db->con()->prepare('INSERT INTO `reviews` ( movie,username,info,submissionTime ) VALUES (?,?,?,?)');
        $db->stmt->bindValue("1", $_POST["MovieID"]);
        $db->stmt->bindValue("2", $_SESSION["UserName"]->username);
        $db->stmt->bindValue("3", $review);
        $db->stmt->bindValue("4", $date);
        if($db->stmt->execute()) {
            $movieID = $_POST['MovieID'];
            $db->stmt = $db->con()->prepare('SELECT * FROM `reviews` WHERE movie=?');
            $db->stmt->bindValue(1, $_POST['MovieID']);
            $db->stmt->execute();
            if($db->stmt->rowCount()) {
                $hasReviews = true;
                $reviews = $db->stmt->fetchAll();
            }
            include "../templates/review-table.php";
        } else {
            echo "There was a problem in the sql";
        }
    } else {
        echo "אנו מודים על התגובה שלך.";
    }
} else {
    echo "did'nt receive everything,something is wrong";
}
