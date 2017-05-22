<?php include 'core/init.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
    $message = $_POST['message'];
    $errors = array();

    if (empty($email) || empty($message)) {
        array_push($errors, 'נא מלא את כל השדות');
    } else {

        $db->stmt = $db->con()->prepare('INSERT INTO `messages` (email,massage) VALUES (:email, :message)');
        $db->stmt->bindValue(":email", $email);
        $db->stmt->bindValue(":message", $message);

        if ($db->stmt->execute()) {
            $check = true;
            echo("נשלח בהצלחה");
        } else {
            array_push($errors, 'הייתה בעיה בשליחת ההודעה');
        }
    }
}
?>

<!DOCTYPE html>
<html dir="rtl">
<head>
    <?php include 'templates/header.php'; ?>
</head>
<body>
<?php include 'templates/menu.php'; ?>

<div class="wrap">
    <main>
        <h1 class="title">צור קשר:</h1>

        <form method="post">
            <table align="center">
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    if (empty($errors)) {
                        echo "<tr><td><span style='color:red'>ההודעה נשלחה בהצלחה!</span></td></tr>";
                    } else { ?>
                        <tr>
                            <td><span style='color:red'><?php echo $errors ?></span></td>
                        </tr>
                        <?php
                    }
                } ?>
                <tr>
                    <?php if ($_SESSION['LOGIN']) { ?>
                        <td>דואר אלקטרוני:</td>
                        <td><input type="text" placeholder="דואר אלקטרוני" id="email" name="email" class="form-control"
                                   value="<?php echo $_SESSION['UserName']->email; ?>" readonly required/></td>
                    <?php } else { ?>
                        <td>דואר אלקטרוני:</td>
                        <td><input type="text" placeholder="דואר אלקטרוני" id="email" name="email" class="form-control"
                                   required/></td>
                    <?php } ?>
                </tr>
                <tr>
                    <td>הודעה:</td>
                    <td><textarea placeholder="תוכן הודעה" id="message" name="message" class="form-control"
                                  required></textarea></td>
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