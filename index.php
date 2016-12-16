<?php include 'core/init.php';  ?>

<!doctype html>
<html lang="he" dir="rtl">
<head>
    <?php include 'templates/header.php';  ?>
</head>

<body>
<?php include 'templates/menu.php';  ?>

<div class="wrap">
    <main>
        <?php
        if($_SESSION["LOGIN"]=="Guest")
        {
            echo("ברוך הבא מי שזה לא יהיה");
        }
        elseif($_SESSION["LOGIN"]=="LoggedIn")
        {
            echo('$_SESSION["UserName"]');
        }
        ?>


    </main>
</div>

</body>
</html>