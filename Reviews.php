<?php include 'core/init.php';

$hasReviews = false;
$reviews = null;
$massage_received = false;
$movieID = null;
$errors = [];
$canReview = false;
if(!empty($_GET['MovieID'])) {
    $movieID = $_GET['MovieID'];
    $db->stmt = $db->con()->prepare('SELECT * FROM `reviews` WHERE movie=?');
    $db->stmt->bindValue(1, $_GET['MovieID']);
    $db->stmt->execute();
    if($db->stmt->rowCount()) {
        $hasReviews = true;
        $reviews = $db->stmt->fetchAll();
    }
} else {
    header("Location: ../newmovies.php");
    die();
}

/********************************************************/
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['uid']) && isset($_POST['upass'])) {
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
                header("Location: Reviews.php?MovieID=$movieID");
            } else {
                echo 'האימייל או סיסמא לא קיימים במערכת';
            }
        }
    }
}
/*********************************************************************/

?>

<!doctype html>
<html lang="he" dir="rtl">
<head>
    <?php include 'templates/header.php';  ?>
</head>

<body>
<input type="hidden" value="<?php echo $_GET['MovieID']?>" id="movieID"/>
<?php include 'templates/menu.php';  ?>
<div class="wrap">
        <main>

            <div class="reviews" id="reviews">
                    <?php if($hasReviews) {include "templates/review-table.php"; ?>
            <?php } else { ?>
                <h2>לסרט לא קיימות ביקורות.</h2>
            <?php } ?>
            </div>
            <hr />
            <div>
                <?php
                if(!empty($errors)) {

                    foreach ($errors as $error)
                    {
                        echo "<tr><td colspan='2'>$error</td></tr>";
                    }
                } else if($massage_received) {
                    echo "<tr><td>ביקורת נשלחה בהצלחה.</td></tr>";
                }
                ?>
                <h1  class="title">הוספת ביקורת</h1>
                <?php if($_SESSION['LOGIN']) {
                    $db->stmt = $db->con()->prepare('SELECT * FROM `movie_session` M WHERE  M.movieID = ? and M.ID in (SELECT sessionID FROM `orders` O WHERE O.userID = ? and O.sessionID = M.ID)');
                    $db->stmt->bindValue(1, $movieID);
                    $db->stmt->bindValue(2, $_SESSION['UserName']->id);
                    $db->stmt->execute();
                    if ($db->stmt->fetch(PDO::FETCH_OBJ)) { ?>
                        <table align="center">
                            <tr>
                                <td>ביקורת:</td>
                                <td><textarea name="review" id="reviewArea" rows="4" cols="40"
                                              placeholder="כתוב ביקורת"></textarea></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="button" class="nicebutton" id="addreview"
                                           onclick="addReview(document.getElementById('reviewArea').value)" value="הוספת ביקורת"
                                           name="addcomment"/>
                                    <input type="hidden" id="token" value="<?php echo Token::generate(); ?>"
                                           name="token"/>
                                </td>
                            </tr>
                        </table>
                        <?php
                    } else { ?>

                        <p>על מנת שתוכל לכתוב ביקורת עליך להיות באחד המועדים של הסרט הזה.</p>
                        <p>קנה כרטיס למועד הקרוב היותר :</p>
                        <input type="button" class="nicebutton" value="קנה עכשיו !!!" onclick=" window.location.href = 'selectSeats.php?MovieID=' + <?php echo $movieID?> ; "/>
                        <?php
                    }
                } else {
                    echo ("
                               <p>שתף איתנו את הביקורת שלך כעת:</p>
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
            </div>
        </main>
    </div>
</body>
</html>
