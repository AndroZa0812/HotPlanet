<?php include 'core/init.php';
if(!isset($_SESSION['LOGIN'])) {
    header("Location: index.php");
    die();
}
if($_SESSION['UserName']->admin != 1) {
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
        <ul>
            <li><a href="userManager.php">מחיקת משתמשים</a></li>
            <li><a href="reviewsManager.php">מחיקת ביקורות</a></li>

        </ul>
    </main>
    </div>
