<?php include 'core/init.php'; ?>

<!doctype html>
<html lang="he" dir="rtl">
<head>
    <?php include 'templates/header.php'; ?>
</head>

<body>
<?php include 'templates/menu.php'; ?>

<div class="wrap">
    <main>
        <p>תודה שקינתם בהוט פלאנט - אולם הקולנועים שלך</p>
        <p> כדי להדפיס את העמוד הזה <button onclick="myFunction()">לחץ כאן</button> </p>
        <p>פרטי ההזנה שלך :</p>
        <table>
            <tr>
                <td>מספר ההזמנה :</td>
                <td><?php echo $_SESSION['orderID']?></td>
            </tr>
            <tr>
                <td>סה"כ חיוב :</td>
                <td>&#8362; <?php echo ($_SESSION['numberOfSeats'] * 39) ;?></td>
            </tr>
            <tr>
                <td>שם מלא של המזמין :</td>
                <td><?php echo $_SESSION['UserName']->firstname . " " . $_SESSION['UserName']->lastname ?></td>
            </tr>
            <tr>
                <td>מקומות ישיבה :</td>
                <td>
                    <table class="table table-bordered table-striped seatsTable">
                        <thead>
                        <tr>
                            <th scope="col">מספר כרטיס</th>
                            <th scope="col">שורה</th>
                            <th scope="col">טור</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $seatsArray = explode(',', $_SESSION['seatsOrder']);
                        include 'templates/ordersTable.php'?>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td><button value="חזרה לדף הבית" onclick="location.href = 'index.php' "/></td>
            </tr>
        </table>

        <script>
            function myFunction() {
                window.print();
            }
        </script>
    </main>
</div>
</body>
</html>