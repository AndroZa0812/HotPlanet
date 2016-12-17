<?php include 'core/init.php';

$db->stmt = $db->con()->prepare('SELECT * FROM `movies`');
$db->stmt->execute();
$movies =  $db->stmt->fetchAll();?>

<!doctype html>
<html lang="he" dir="rtl">
<head>
    <?php include 'templates/header.php';  ?>
</head>

<body>
<?php include 'templates/menu.php';  ?>

<div class="wrap">
    <main>


        <table class="table" id="movies">
            <thead class="thead-inverse">
            <tr>
                <th>#</th>
                <th>סרט</th>
                <th>שנה</th>
                <th>תקציר</th>
                <th>גיל מורשה</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php include "templates/movie-table.php";?>
            </tbody>
        </table>



    </main>
</div>

</body>
</html>