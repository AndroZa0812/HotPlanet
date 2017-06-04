<?php include 'core/init.php';
if(!isset($_SESSION['LOGIN'])) {
    header("Location: index.php");
    die();
}
if($_SESSION['UserName']->admin != 1) {
    header("Location: index.php");
    die();
}
$reviewsExist = false;
$db->stmt = $db->con()->prepare('SELECT r.ID,m.Movie,r.username,r.info,r.upvotes,r.downvotes,r.submissionTime FROM `reviews` r, `movies` m WHERE m.ID = r.movie');
$db->stmt->execute();
$reviews =  $db->stmt->fetchAll();
if($db->stmt->rowCount()){
    $reviewsExist = true;
}
?>

<!doctype html>
<html lang="he" dir="rtl">
<head>
    <link rel="stylesheet" type="text/css" href="../css/main.css" xmlns="http://www.w3.org/1999/html">
    <?php include 'templates/header.php';  ?>
</head>

<body>
<?php include 'templates/menu.php';  ?>
<div class="wrap">
    <main>
        <?php if($reviewsExist) {?>
        <div class="reviews" id="reviews2">
            <?php include "templates/admin-review-table.php";?>
        </div>
        <?php } else {?>
        <span style="color:red">אין ביקורות באתר</span>
        <?php }?>
    </main>
</div>
</body>
</html>