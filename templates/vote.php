<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    include '../core/init.php';
    if($_SESSION['LOGIN']) {
        $MessageID = $_POST['MassageID'];
        $typeOfVote = $_POST['typeOfVote'];
        $user = $_SESSION['UserName'];
        $username = $user->username;
        $numOfVotes = 0;
        //----------------------------------------------------------
        $db->stmt = $db->con()->prepare('SELECT * FROM `reviews` WHERE `ID` = ? LIMIT 1');
        $db->stmt->execute([$MessageID]);
        $review = $db->stmt->fetch(PDO::FETCH_OBJ);
        $votes = [
            'loggedIn' => true,
            'upVotes' => $review->upvotes,
            'downVotes' => $review->downvotes
        ];

        $db->stmt = $db->con()->prepare('SELECT * FROM `likes` WHERE `commentID` = ? and `username` = ?');
        $db->stmt->bindValue(1, $MessageID);
        $db->stmt->bindValue(2, $username);
        $db->stmt->execute();
        $currentType = $db->stmt->fetch(PDO::FETCH_OBJ);

        if ($currentType != NULL) {
            if ($typeOfVote == $currentType->likeType) {
                if ($typeOfVote == 1) {#upvote twice
                    $db->stmt = $db->con()->prepare('UPDATE `reviews` SET  upvotes = upvotes - 1 WHERE `ID` = ? LIMIT 1');
                    $db->stmt->execute([$MessageID]);

                    $db->stmt = $db->con()->prepare('DELETE FROM `likes` WHERE  `commentID` = ? and `username` = ?');
                    $db->stmt->bindValue(1, $MessageID);
                    $db->stmt->bindValue(2, $username);
                    $db->stmt->execute();

                    $numOfVotes = --$votes['upVotes'];

                } else { #downvote twice
                    $db->stmt = $db->con()->prepare('UPDATE `reviews` SET  downvotes = downvotes - 1 WHERE `ID` = ? LIMIT 1');
                    $db->stmt->execute([$MessageID]);

                    $db->stmt = $db->con()->prepare('DELETE FROM `likes` WHERE  `commentID` = ? and `username` = ?');
                    $db->stmt->bindValue(1, $MessageID);
                    $db->stmt->bindValue(2, $username);
                    $db->stmt->execute();

                    $numOfVotes = --$votes['downVotes'];

                }
                $data = [
                    'loggedIn' => true,
                    'voteType' => $typeOfVote,
                    'voteCount' => $numOfVotes,
                    'reviewID' => $MessageID,
                    'voteType2' => -2,
                    'voteCount2' => 0,
                ];

            } else { #this is when the vote and the dbvote differ
                if ($currentType->likeType == 1) {
                    $db->stmt = $db->con()->prepare('UPDATE `reviews` SET  upvotes = upvotes - 1 WHERE `ID` = ? LIMIT 1');
                    $db->stmt->execute([$MessageID]);

                    $db->stmt = $db->con()->prepare('UPDATE `likes` SET `likeType` = ? WHERE `commentID` = ? and `username` = ?');
                    $db->stmt->bindValue(1, $typeOfVote);
                    $db->stmt->bindValue(2, $MessageID);
                    $db->stmt->bindValue(3, $username);
                    $db->stmt->execute();

                    $db->stmt = $db->con()->prepare('UPDATE `reviews` SET  downvotes = downvotes + 1 WHERE `ID` = ? LIMIT 1');
                    $db->stmt->execute([$MessageID]);

                    $votes['upVotes']--;
                    $votes['downVotes']++;

                    $data = [
                        'loggedIn' => true,
                        'voteType' => $currentType->likeType,
                        'voteCount' => $votes['upVotes'],
                        'reviewID' => $MessageID,
                        'voteType2' => $typeOfVote,
                        'voteCount2' => $votes['downVotes'],
                    ];

                } else {
                    $db->stmt = $db->con()->prepare('UPDATE `reviews` SET  downvotes = downvotes - 1 WHERE `ID` = ? LIMIT 1');
                    $db->stmt->execute([$MessageID]);

                    $db->stmt = $db->con()->prepare('UPDATE `likes` SET `likeType` = ? WHERE `commentID` = ? and `username` = ?');
                    $db->stmt->bindValue(1, $typeOfVote);
                    $db->stmt->bindValue(2, $MessageID);
                    $db->stmt->bindValue(3, $username);
                    $db->stmt->execute();

                    $db->stmt = $db->con()->prepare('UPDATE `reviews` SET  upvotes = upvotes + 1 WHERE `ID` = ? LIMIT 1');
                    $db->stmt->execute([$MessageID]);

                    $votes['upVotes']++;
                    $votes['downVotes']--;

                    $data = [
                        'loggedIn' => true,
                        'voteType' => $currentType->likeType,
                        'voteCount' => $votes['downVotes'],
                        'reviewID' => $MessageID,
                        'voteType2' => $typeOfVote,
                        'voteCount2' => $votes['upVotes'],
                    ];

                }
            }
        } //---------------------------------------------------------

        else {
            if ($typeOfVote == 1) {
                $db->stmt = $db->con()->prepare('UPDATE `reviews` SET  upvotes = upvotes + 1 where ID = ?');
                $db->stmt->bindValue(1, $MessageID);
                $db->stmt->execute();

                $db->stmt = $db->con()->prepare('INSERT INTO `likes` (`username`, `commentID`, `likeType`) VALUES (:username, :commentID, :likeType)');
                $db->stmt->bindValue(":username", $username);
                $db->stmt->bindValue(":commentID", $MessageID);
                $db->stmt->bindValue(":likeType", $typeOfVote);
                $db->stmt->execute();

                $numOfVotes = $votes['upVotes'] + 1;
            } else {
                $db->stmt = $db->con()->prepare('UPDATE `reviews` SET downvotes = downvotes + 1 where ID = ?');
                $db->stmt->bindValue(1, $MessageID);
                $db->stmt->execute();

                $db->stmt = $db->con()->prepare('INSERT INTO `likes` (`username`,`commentID`,`likeType`) VALUES (:username, :commentID, :likeType)');
                $db->stmt->bindValue(":username", $username);
                $db->stmt->bindValue(":commentID", $MessageID);
                $db->stmt->bindValue(":likeType", $typeOfVote);
                $db->stmt->execute();

                $numOfVotes = $votes['downVotes'] + 1;
            }

            $data = [
                'loggedIn' => true,
                'voteType' => $typeOfVote,
                'voteCount' => $numOfVotes,
                'reviewID' => $MessageID,
                'voteType2' => -2,
                'voteCount2' => 0,
                'reviewID2' => 0
            ];
        }
        $db->stmt = $db->con()->prepare('SELECT * FROM `reviews`');
        $db->stmt->execute();
        $reviews = $db->stmt->fetchAll();

        echo json_encode($data);
    }
    else{
      $data = [
          'loggedIn' => false
      ];
    }
}

