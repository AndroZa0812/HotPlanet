<?php include 'core/init.php';  ?>

<!doctype html>
<html lang="he" dir="rtl">
<head>
    <?php include 'templates/header.php';  ?>
</head>

<body>
<?php include 'templates/menu.php';
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['seatsOrder'])) {
    $_SESSION['seatsOrder'] = null;
    $seats = $_POST['seatsOrder'];
    $seatsArray = explode(",", $seats);
    $sit = '';
    $_SESSION['seatsOrder'] = $seats;
    $sessionID = $seatsArray[count($seatsArray) - 1];
} else if (isset($_SESSION['seatsOrder'])){
    $seats = $_SESSION['seatsOrder'];
    $seatsArray = explode(",", $seats);
    $sit = '';
    $sessionID = $seatsArray[count($seatsArray) - 1];
}
else{
    header("Location: ../newmovies.php");
    die();
}
?>
<div class="wrap">
    <main>
        <table class="table table-bordered table-striped seatsTable">
            <thead>
            <tr>
                <th scope="col">מספר כרטיס</th>
                <th scope="col">שורה</th>
                <th scope="col">טור</th>
            </tr>
            </thead>
            <tbody>
           <?php
           include("templates/ordersTable.php");
           ?>
            </tbody>
        </table>

        <form method="post" action="templates/purchase.php">
            <table>
                <tr>
                    <td><span>שם משתמש:</span></td>
                    <td><input type="text" value="<?php echo $_SESSION['UserName']->username ;?>" readonly /></td>
                </tr>
                <tr>
                    <td><span>שם מלא:</span></td>
                    <td><input type="text" value="<?php echo $_SESSION['UserName']->firstname . " " . $_SESSION['UserName']->lastname ;?>" readonly /></td>
                </tr>
                <tr>
                    <td><span>מספר כרטיס אשראי:</span></td>
                    <td><input type="number" placeholder="מספר אשראי"/ required></td>
                    <td>
                        <select name="cardYear" id="cardFirm" style="height:31px;" required>
                        <option selected disabled>חברת אשראי:</option>
                        <option value="isracard">ישרכארט</option>
                        <option value="kal">ויזה כאל</option>
                        <option value="leumi">לאומי קארד</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><span>תוקף: </span></td>
                    <td>
                        <select name="cardYear" id="cardYear" required>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                        </select>
                        <span>/</span>
                        <select name="cardMonth" id="monthSelect" class="dropDown select-picker" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><span>CVV:</span></td>
                    <td><input type="number" placeholder="CVV" max="999" min="100" style="width:70px;" required/></td>
                </tr>
                <tr>
                    <td><span>סה"כ לתשלום :</span></td>
                    <td><strong>&#8362; <?php echo (count($seatsArray) - 1)*39 ?></strong></td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="רכוש כעט" />
                    </td>
                </tr>
            </table>
        </form>
    </main>
</div>
</body>
</html>