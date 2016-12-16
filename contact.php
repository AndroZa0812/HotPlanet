<?php include 'core/init.php';

$notfilled = false;
$check=false;

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $info = $_POST['info'];

    $errors = array();

    if (empty($firstname))
        array_push($errors, 'חובה לכתוב שם פרטי');
    if (empty($lastname))
        array_push($errors, 'חובה לכתוב שם משפחה');
    if (empty($info))
        array_push($errors, 'חובה לכתוב הודעה');
    if (!empty($errors))
    {
        $notfilled = true;
    }
    else {

        $db->stmt = $db->con()->prepare('INSERT INTO `messages` (firstname, lastname,info) VALUES (:firstname, :lastname, :info)');
        $db->stmt->bindValue(":firstname", $firstname);
        $db->stmt->bindValue(":lastname", $lastname);
        $db->stmt->bindValue(":info", $info);

        if ($db->stmt->execute()) {
            $check = true;
            echo("נשלח בהצלחה");
        }
        else
            $check=false;
    }
}
?>

<!DOCTYPE html>
<html dir="rtl">
<head>
    <?php include 'templates/header.php';  ?>
</head>
<body>
<?php include 'templates/menu.php';  ?>

<div class="wrap">
    <main>
        <h1 class="title">צור קשר:</h1>

        <form method="post">
            <table align="center">
                <?php if($check) {
                    echo "<tr><td>ההודעה נשלחה בהצלחה!</td></tr>";
                } ?>
                <tr>
                    <td>שם פרטי:</td>
                    <td><input type="text" placeholder="שם פרטי" id="firstname" name="firstname" class="form-control"/></td>
                </tr>
                <tr>
                    <td>שם משפחה:</td>
                    <td><input type="text" placeholder="שם משפחה" id="lastname" name="lastname" class="form-control"/></td>
                </tr>
                <tr>
                    <td>הודעה:</td>
                    <td><input type="text" placeholder="תוכן הודעה" id="info" name="info" class="form-control"/></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" class="nicebutton" onclick="checkContact(this.form)" value="שלח טופס"/>
                    </td>
                </tr>
            </table>
        </form>
    </main>
</div>

</body>
</html>