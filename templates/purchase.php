<?php
include '../core/init.php';
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['seatsOrder'])){
    if(isset($_SESSION['LOGIN'])){

        //getting the userID
        $db->stmt = $db->con()->prepare('SELECT id FROM `users` WHERE email = ?');
        $db->stmt->bindValue(1, $_SESSION['UserName']->email);
        $db->stmt->execute();
        $userID = $db->stmt->fetch(PDO::FETCH_OBJ);

        //making the orderID
        $orderID = time() . mt_rand() . $userID->id;

        //preping for insert
        $seatsArray = explode(',', $_SESSION['seatsOrder']);
        $SessionID = $seatsArray[count($seatsArray) - 1];

        //delliting the session id from the array of seats
        $seatsArray = array_delete(count($seatsArray) - 1,$seatsArray);

        //making an string with the seats
        $onlyReservedSeats = implode(",",$seatsArray);
        $db->stmt = $db->con()->prepare('INSERT INTO `orders` (`orderID`, `userID`, `sessionID`, `seats`) VALUES (:orderID, :userID, :sessionID, :seats)');
        $db->stmt->bindValue(":orderID", $orderID);
        $db->stmt->bindValue(":userID", $userID->id);
        $db->stmt->bindValue(":sessionID", $SessionID);
        $db->stmt->bindValue(":seats", $onlyReservedSeats);
        if($db->stmt->execute()){
            $_SESSION['purchase'] = "successful";
        } else {
            echo "There was an error in the purchase, you will not be charged for the order, please try later.";
        }
        $_SESSION['numberOfSeats'] = count($seatsArray);
        $_SESSION['orderID'] = $orderID;
        header("Location: ../printPurchase.php");
    }
} else {
    echo "sup";
}
?>