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
        <table>
           <?php ?>
        </table>

        <form>
            <table>
                <tr>
                    <td><span>שם משתמש:</span></td>
                    <td><input type="text" value="<?php echo $_SESSION['UserName']->username ;?>" readonly /></td>
                </tr>
                <tr>
                    <td><span>שם מלא:</span></td>
                    <td><input type="text" value="<?php echo $_SESSION['UserName']->firstname . " " . $_SESSION['UserName']->lastname ;?>" readonly /></td>
                </tr>
                <tr>
                    <td><span>מספר כרטיס אשראי:</span></td>
                    <td><input type="number" placeholder="מספר אשראי"/></td>
                </tr>
                <tr>
                    <td><span>תוקף: </span></td>
                    <td>
                        <select name="cardYear" id="cardYear" placeholder="שנה">
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                        </select>
                        <span>/</span>
                        <select name="cardMonth" placeholder="חודש">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><span>CVV:</span></td>
                    <td><input type="number" placeholder="CVV" max="999" min="100" style="width:70px;"/></td>
                </tr>
            </table>
        </form>
    </main>
</div>

</body>
</html>