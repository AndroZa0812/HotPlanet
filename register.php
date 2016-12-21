<?php include 'core/init.php';

$noregister = false;
$signedUp = false;

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['token'])) {
    if(Token::check($_POST['token'])) {
        $username = $_POST['username'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password=$_POST['password'];
        $password = password_hash($password,PASSWORD_DEFAULT);
        $age = $_POST['age'];

        $errors = array();

        if (empty($username))
            array_push($errors, 'חובה לכתוב שם משתמש');
        if (empty($firstname))
            array_push($errors, 'חובה לכתוב שם פרטי');
        if (empty($lastname))
            array_push($errors, 'חובה לכתוב שם משפחה');
        if (empty($email))
            array_push($errors, 'חובה לכתוב אימייל');
        if (empty($password))
            array_push($errors, 'חובה לכתוב סיסמא');
        if (empty($age))
            array_push($errors, 'חובה לכתוב גיל');
        if (!empty($errors)) {
            $noregister = true;
        } else {
            $db->stmt = $db->con()->prepare('SELECT * FROM `users` WHERE `email` = :email');
            $db->stmt->execute([
                'email' => $email
            ]);
            if ($db->stmt->rowCount()) {
                array_push($errors, "דואר אלקטרוני או המשתמש תפוסים");
                $noregister = true;
            } else {
                $db->stmt = $db->con()->prepare('SELECT * FROM `users` WHERE `username` = :username');
                $db->stmt->execute([
                    'username' => $username
                ]);
                if ($db->stmt->rowCount()) {
                    array_push($errors, "דואר אלקטרוני או המשתמש תפוסים");
                    $noregister = true;
                } else {
                    $db->stmt = $db->con()->prepare('INSERT INTO `users` (username, firstname, lastname, email, password, age) VALUES (:username, :firstname, :lastname, :email, :password, :age)');
                    $db->stmt->bindValue(":username", $username);
                    $db->stmt->bindValue(":firstname", $firstname);
                    $db->stmt->bindValue(":lastname", $lastname);
                    $db->stmt->bindValue(":email", $email);
                    $db->stmt->bindValue(":password", $password);
                    $db->stmt->bindValue(":age", $age);

                    if ($db->stmt->execute()) {
                        $signedUp = true;

                    }
                }
            }

        }
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
</body>
</html>

<div class="wrap">
    <main>
        <form method="post">
            <table align="center">
                <?php
                if($noregister) {
                    foreach ($errors as $error)
                    {
                        echo "<tr><td colspan='2'>$error</td></tr>";
                    }
                } else if($signedUp) {
                    echo "<tr><td>נרשמתם לאתר בהצלחה!</td></tr>";
                }
                ?>
              <h1  class="title">הרשמה</h1>

                <tr>
                    <td>שם משתמש:</td>
                    <td><input type="text" placeholder="שם משתמש" id="username" name="username" class="formNice"/></td>
                </tr>
                <tr>
                    <td>שם פרטי:</td>
                    <td><input type="text" placeholder="שם פרטי" id="firstname" name="firstname" class="formNice"/></td>
                </tr>
                <tr>
                    <td>שם משפחה:</td>
                    <td><input type="text" placeholder="שם משפחה" id="lastname" name="lastname" class="formNice"/></td>
                </tr>
                <tr>
                    <td>אימייל:</td>
                    <td><input type="text" placeholder="אימייל" id="email" name="email" class="formNice"/></td>
                </tr>
                <tr>
                    <td>סיסמא:</td>
                    <td><input type="password" placeholder="סיסמא" id="password" name="password" class="formNice"/></td>
                </tr>
                <tr>
                    <td>גיל:</td>
                    <td><input type="number" placeholder="גיל" id="age" name="age" class="formNice"/></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" class="nicebutton" onclick="checkRegister(this.form)" value="הירשם" name="register"/>
                        <input type="hidden" id="token" value="<?= Token::generate()?>" name="token"/>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <a href="login.php">נרשמת כבר ? התחבר </a>
                    </td>
                </tr>
            </table>
        </form>
    </main>
</div>