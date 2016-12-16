<?php include 'core/init.php';

$db->stmt = $db->con()->prepare('SELECT * FROM `users`');
$db->stmt->execute();
$users =  $db->stmt->fetchAll();?>

<!doctype html>
<html lang="he" dir="rtl">
<head>
    <?php include 'templates/header.php';  ?>
</head>

<body>
<?php include 'templates/menu.php';  ?>

<div class="wrap">
    <main>


            <table class="table" id="users">
                <thead class="thead-inverse">
                <tr>
                    <th>#</th>
                    <th>firstname</th>
                    <th>lastname</th>
                    <th>email</th>
                    <th>password</th>
                    <th>age</th>
                </tr>
                </thead>
                <tbody>
                <?php include "templates/user-table.php";?>
                </tbody>
            </table>



    </main>
</div>

</body>
</html>                                                                                                                                                                                                                                                                                   