<?php include 'core/init.php';
if(!isset($_SESSION['LOGIN'])) {
    header("Location: index.php");
    die();
}
if($_SESSION['UserName']->admin != 1) {
    header("Location: index.php");
    die();
}
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


            <table class="table table-bordered table-striped seatsTable">
                <thead class="thead-inverse" >
                    <tr>
                        <th style="text-align: right">#</th>
                        <th style="text-align: right">שם משתמש</th>
                        <th style="text-align: right">שם פרטי</th>
                        <th style="text-align: right">שם משפחה</th>
                        <th  style="text-align: right">דואר אלקטרוני</th>
                        <th style="text-align: right">סיסמא</th>
                        <th style="text-align: right">גיל</th>
                        <th style="text-align: right">מחיקה</th>
                    </tr>
                </thead>
                <tbody id="users">
                <?php include "templates/user-table.php";?>
                </tbody>
            </table>



    </main>
</div>

</body>
</html>                                                                                                                                                                                                                                                                                   