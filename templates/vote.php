<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    include '../core/init.php';
    $MessageID = $_POST['MassageID'];
    $typeOfVote = $_POST['typeOfVote'];
    $numOfVotes = 0;
    $db->stmt = $db->con()->prepare('SELECT * FROM `reviews` WHERE `ID` = ? LIMIT 1');
    $db->stmt->execute([$MessageID]);
    $review = $db->stmt->fetch(PDO::FETCH_OBJ);
    $votes = [
        'upVotes' => $review->upvotes,
        'downVotes' => $review->downvotes
    ];

    if($typeOfVote == 1) {
        $db->stmt = $db->con()->prepare('UPDATE `reviews` SET  upvotes = upvotes + 1 where ID = ?');
        $db->stmt->bindValue(1, $MessageID);
        $db->stmt->execute();
        $numOfVotes = $votes['upVotes'] + 1;
    }
    else{
        $db->stmt = $db->con()->prepare('UPDATE `reviews` SET downvotes = downvotes + 1 where ID = ?');
        $db->stmt->bindValue(1, $MessageID);
        $db->stmt->execute();
        $numOfVotes = $votes['downVotes'] + 1;
    }

    $db->stmt = $db->con()->prepare('SELECT * FROM `reviews`');
    $db->stmt->execute();
    $reviews =  $db->stmt->fetchAll();
    $data = [
        'voteType' => $typeOfVote,
        'voteCount' => $numOfVotes,
        'reviewID' => $MessageID
    ];
    echo json_encode($data);
}

