<?php include 'core/init.php';
if($_SESSION['LOGIN']) {
    $db->stmt = $db->con()->prepare('SELECT O.orderID,O.seats,M.movie_name FROM `orders` O, `movie_session` M WHERE O.userID = ? and M.ID = O.sessionID ');
    $db->stmt->bindValue(1, $_SESSION['UserName']->id);
    $db->stmt->execute();
    $seatsArray = array();
    $ordersArray =  $db->stmt->fetchAll(PDO::FETCH_OBJ);
} else {
    header("Location: index.php");
    die();
}
?>

<!doctype html>
<html lang="he" dir="rtl">
<head>
    <?php include 'templates/header.php';  ?>
</head>

<body>
<?php include 'templates/menu.php';  ?>

<div class="wrap">
    <main>
        <h1 class="title">ההזמנות שלי</h1>

        <?php if($db->stmt->rowCount()) {?>
        <hr>
        <table  class="table table-bordered table-striped seatsTable">
            <thead>
            <th></th>
            <th>מספר הזמנה</th>
            <th>שם הסרט (ההקרה)</th>
            <th>מספר שורה וטור</th>
            </thead>
            <tbody>
                <?php include "templates/myOrdersTable.php" ;?>
            </tbody>
        </table>
        <?php } else {?>
        <p class="title">אין לך הזמנות</p>
        <input type="button" class="nicebutton" value="קח אותי לקניית סרט" onclick="window.location.href = 'newmovies.php' ;"/>
        <?php }?>
    </main>
</div>

</body>
</html>