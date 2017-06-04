<?php include 'core/init.php';  ?>

<?php
//init variables
$hasSessions = false;
$sessions = NULL;
$errors = array();
$dataEntered = false;
$movieID = $_GET['MovieID'];

//sending the user to another page if movieID is'nt received
if(empty($_GET['MovieID'])) {
    header("Location: ../newmovies.php");
    die();
}
/********************************************************/

//upon filling the popup login massage this section handles the request
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
                $db->stmt = $db->con()->prepare('SELECT id,username,email,firstname,lastname,admin FROM `users` WHERE email = ?');
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
</head>

<body>
<?php include 'templates/menu.php';  ?>
<div class="wrap">

    <main>
        <?php if($_SESSION['LOGIN']){?>
            <p><span>כדי לבחור את מועד הסרט אנא בחר תאריך:</span></p>
            <form method="post">
            <?php if($hasSessions): ?>
                <select name="dates" id="movieDates">
                    <?php foreach ($sessions as $movieSession): ?>
                        <option data-id="<?= $movieSession->ID ?>"
                                value="<?php echo $movieSession->time . ' '
                                                        . $movieSession->movie_name; ?>">
                            <?= $movieSession->movie_name ?> - <?= $movieSession->time ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            <?php else: ?>
                
            <?php endif; ?>
            </form>
            <div class="demo">
                <div id="seat-map">
                    <div class="front">SCREEN</div>
                </div>
                <div class="booking-details">
                    <p>שם הסרט :  <span id="movieNameTag"> </span></p>
                    <p>שעת הקרנה :<span id="movieTimeTag"></span></p>
                    <p>כיסאות :</p>
                    <ul id="selected-seats"></ul>
                    <p>מספר הכיסאות: <span id="counter">0</span></p>
                    <p>סה"כ לתשלום: <b>&#8362;<span id="total">0</span></b></p>
    `               <form method="post" id="seatsForm" action="buyMovie.php">
                        <input type="hidden" name="seatsOrder" id="seatsOrder" value="" />
                        <input type = "button" onclick="processPayment()" class="checkout-button" value="קנייה" />
                    </form>
                    <div id="legend"></div>
                </div>
                <div style="clear:both"></div>
            </div>
<?php }else{
            //this will be printed if the user entered without logging in
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
