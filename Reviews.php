<?php include 'core/init.php';

$hasReviews = false;
$reviews = null;
$massage_received = false;
$errors = [];
if(isset($_GET['MovieID'])) {
    $db->stmt = $db->con()->prepare('SELECT * FROM `reviews` WHERE movie=?');
    $db->stmt->bindValue(1, $_GET['MovieID']);
    $db->stmt->execute();
    if($db->stmt->rowCount()) {
        $hasReviews = true;
        $reviews = $db->stmt->fetchAll();
    }
}

if(isset($_POST['review']) && isset($_POST['rank']))
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
                        <form method="post">
                            <table align="center">
                                <h1  class="title">הוספת ביקורת</h1>
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
                                        <input type="submit" class="nicebutton" id="addreview" onclick="checkcomment(this.form)" value="הוספת ביקורת" name="addcomment"/>
                                    </td>
                                </tr>
                        </form>
                    </div>
                </tbody>
            </table>
        </main>
    </div>
</body>
</html>