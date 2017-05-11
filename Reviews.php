<?php include 'core/init.php';

$hasReviews = false;
$reviews = null;
$massage_received = false;
$errors = [];
if(!empty($_GET['MovieID'])) {
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

if(isset($_POST['review']) && isset($_POST['rank']) && isset($_POST['token']))
{
    if(Token::check($_POST['token']))
    {
        $review = $_POST['review'];
        $rank = $_POST['rank'];
        if(empty($review))
            array_push($errors,'נא רשום ביקורת');
        else{
                $db->stmt = $db->con()->prepare('INSERT INTO `reviews` ( movie,username,info,rank) VALUES (?,?,?,?)');
                $db->stmt->bindValue("1", $_GET["MovieID"]);
                $db->stmt->bindValue("2", $_SESSION["UserName"]->username);
                $db->stmt->bindValue("3", $review);
                $db->stmt->bindValue("4", $rank);

                if($db->stmt->execute()) {
                    $massage_received = true;
                }
            }
    }
}
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
                header('Location: index.php');
            } else {
                echo 'האימייל או סיסמא לא קיימים במערכת';
            }
        }
    }
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
            <table class="table" id="reviews">
                <?php if($hasReviews) { ?>
                <tbody>
                    <?php include "templates/review-table.php"; ?>
                <?php } else { ?>
                    <h2>לסרט לא קיימות ביקורות.</h2>
                <?php } ?>
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
                        <?php if($_SESSION['LOGIN']){?>
                        <table align="center">
                            <form method="post">
                                <tr>
                                    <td>ביקורת:</td>
                                    <td><textarea name="review" id="review" rows="4" cols="40" placeholder="כתוב ביקורת"></textarea></td>
                                </tr>
                                <tr>
                                    <td>דירוג:</td>
                                    <td>
                                        <select name="rank" id="rank">
                                        <option value="5" selected="selected"> מעולה </option>
                                        <option value="4" > טוב </option>
                                        <option value="3"> בסדר </option>
                                        <option value="2"> ככה ככה </option>
                                        <option value="1"> לא ממליץ </option>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="2">
                                        <input type="submit" class="nicebutton" id="addreview" onclick="addreview(this.form)" value="הוספת ביקורת" name="addcomment"/>
                                        <input type="hidden" id="token"  value="<?php echo Token::generate(); ?>" name="token"/>
                                    </td>
                                </tr>
                            </form>
                        </table>
                        <?php }else{
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
                </tbody>
            </table>
        </main>
    </div>
</body>
</html>