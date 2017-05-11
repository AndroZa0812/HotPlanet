<?php include 'core/init.php';  ?>

<?php
$hasSessions = false;
$sessions = NULL;
$errors = array();
$dataEntered = false;
$movieID = $_GET['MovieID'];

if(empty($_GET['MovieID'])) {
    header("Location: ../newmovies.php");
    die();
}
/*----------------------*/
/********************************************************/
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['uid']) && isset($_POST['upass'])) {
        $email = $_POST['uid'];
        $password = $_POST['upass'];
        if (empty($email) || empty($password)) {
            echo 'נא מלאו את הפרטים.';
        } else {
            $db->stmt = $db->con()->prepare('SELECT password FROM `users` WHERE email = ?  LIMIT 1');
            $db->stmt->bindValue(1, $email);
            $db->stmt->execute();
            $dbpass = $db->stmt->fetch(PDO::FETCH_OBJ);
            if (password_verify($password, $dbpass->password)) {
                $db->stmt = $db->con()->prepare('SELECT username,email,firstname,lastname,admin FROM `users` WHERE email = ?');
                $db->stmt->bindValue(1, $email);
                $db->stmt->execute();
                $user = $db->stmt->fetch(PDO::FETCH_OBJ);
                $_SESSION["UserName"] = $user;
                $_SESSION["LOGIN"] = true;
                header("Location: selectSeats.php?MovieID=$movieID");
            } else {
                echo 'האימייל או סיסמא לא קיימים במערכת';
            }
        }
    }
} else {
    $db->stmt = $db->con()->prepare('SELECT * FROM `movie_session` WHERE `movieID` = ? ORDER BY `time` ASC');
    $db->stmt->bindValue(1, $movieID);
    $db->stmt->execute();
    if ($db->stmt->rowCount()) {
        $hasSessions = true;
        $sessions = $db->stmt->fetchAll(PDO::FETCH_OBJ);
    } else {
        echo "no dates";
    }
}
?>


<!doctype html>
<html lang="he" dir="rtl">
<head>
    <?php include 'templates/header.php';  ?>
    <link rel="stylesheet" href="css/reserve.css">
    <script src="js/jquery.seat-charts.min.js"></script>
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>-->
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/locales/bootstrap-datepicker.he.min.js" ></script>-->
<!--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">-->

</head>

<body>
<?php include 'templates/menu.php';  ?>
<div class="wrap">

    <main>
        <?php if($_SESSION['LOGIN']){?>
            <p><span>כדי לבחור את מועד הסרט אנא בחר תאריך:</span></p>
            <form method="post">
            <?php if($hasSessions): ?>
<!--                <select name="dates" id="movieDates" onchange="insertSessionName(this);">-->
                <select name="dates" id="movieDates">
                    <?php foreach ($sessions as $movieSession): ?>
                        <option data-id="<?= $movieSession->ID ?>" value="<?php echo $movieSession->time . ' ' . $movieSession->movie_name; ?>">
                            <?= $movieSession->movie_name ?> - <?= $movieSession->time ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <input type="button"  value="קנה עכשיו">
                <input type="button" value="הוסף לעגלת קניות">
            <?php else: ?>
                
            <?php endif; ?>
            </form>
            <div class="demo">
                <div id="seat-map">
                    <div class="front">SCREEN</div>
                </div>
                <div class="booking-details">
                    <p>Movie: <span id="movieNameTag"> </span></p>
                    <p>Time: <span id="movieTimeTag"></span></p>
                    <p>Seat: </p>
                    <ul id="selected-seats"></ul>
                    <p>Tickets: <span id="counter">0</span></p>
                    <p>Total: <b>&#8362;<span id="total">0</span></b></p>

                    <button onclick="processPayment()" class="checkout-button">BUY</button>
                    <div id="legend"></div>
                </div>
                <div style="clear:both"></div>
            </div>
<!--            <table style="width: 21%" class = "calendar-table">-->
<!--                <tr>-->
<!--                    <td>-->
<!--                        <div id = "datePicker" >-->
<!--                            <div style = "background : white"></div>-->
<!--                            <input type="hidden" name="dt_due" id="dt_due">-->
<!--                        </div>-->
<!--                    </td>-->
<!--                    <td>-->
<!--                        <div style = "margin-right: 30%;">-->
<!--                           <div id = "availableSession">-->
<!---->
<!--                           </div>-->
<!--                        </div>-->
<!--                    </td>-->
<!--                </tr>-->
<!--            </table>-->

<!--            <div id = "moviesInDate"></div>-->
<!--            <p><button onclick=" location.href='Seat_preview.php' ">לבחירת מקומות בקולנוע</button></p>-->
<!--            <div class="info-sub">-->
<!--                <p>-->
<!--                    <span>*ע"י לחיצה על המשך תועבר לעמוד מותאם, לאחר מכן תוכל להמשיך ולסיים את הרכישה.</span>-->
<!--                </p>-->
        <!--</div>-->
<?php }else{
    echo ("
            <p>לפני שתוכל לגשת לקנית כרטיס אנא התחבר למשתמש שלך באתר.</p>
            <input type='button' id='show_login' class='btn btn-secondary' value='להתחברות'>
            <div id = 'loginform'>
            <button type = 'button' id = 'close_login'><span class='glyphicon glyphicon-remove'></span></button>
            <div align='center'>
            <form method = 'post'>
            <p>התחבר כדי לגשת לכל הפיצ'רים של האתר.</p>
                <input type = 'text' id = 'login' placeholder = 'דואר אלקטרוני' name = 'uid' />
                <input type = 'password' id = 'pass' name = 'upass' placeholder = 'סיסמא' />
                <input type = 'submit' id = 'dologin' onclick='checkLogin(this.form)' value = 'התחבר'/>
            </form>
            <div>
                <p><a href='register.php'>עדיין לא נרשמת ? הרשם כעת !</a></p>
            </div>");
}?>
</main>
</div>
<script src="js/reserve.js" type="text/javascript"></script>
</body>
</html>
