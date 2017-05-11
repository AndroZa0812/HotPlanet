<?php
include 'init.php';
header('Content-Type: application/json');
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        $sessionID = (isset($_POST['sessionID']) ? ($_POST['sessionID']) : (false));
        if($sessionID) {
            $db->stmt = $db->con()->prepare('SELECT * FROM `orders` WHERE `sessionID` = ?');
            $db->stmt->bindValue(1, $sessionID);
            $db->stmt->execute();
            $results = $db->stmt->fetchAll(PDO::FETCH_OBJ);
            $takenSeats = [];
            foreach ($results as $order) {
                $seats = $order->seats;
                $seatsArr = explode(',', $seats);
                $takenSeats = array_merge($takenSeats, $seatsArr);
            }

            echo json_encode($takenSeats);
        }
    }
}