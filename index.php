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

        if($_SESSION['LOGIN']) {
            $user = $_SESSION['UserName'];
            printf("ברוך הבא, %s.", $user->firstname);
        } else {
            echo 'ברוך הבא אורח.';
            }

        ?>

    </main>
</div>

</body>
</html>