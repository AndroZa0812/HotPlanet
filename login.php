<?php include 'core/init.php';


if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $errors = array();
    if(empty($email) || empty($password)) {
        array_push($errors , 'נא מלאו את הפרטים.');
    }
    else{
        $db->stmt = $db->con()->prepare('SELECT password FROM `users` WHERE email = ?  LIMIT 1');
        $db->stmt->bindValue(1, $email);
        $db->stmt->execute();
        $dbpass=$db->stmt->fetch(PDO::FETCH_OBJ);
        if(!empty($dbpass)) {
            if (password_verify($password, $dbpass->password)) {
                $db->stmt = $db->con()->prepare('SELECT username,email,firstname,lastname,admin FROM `users` WHERE email = ?');
                $db->stmt->bindValue(1, $email);
                $db->stmt->execute();
                $user = $db->stmt->fetch(PDO::FETCH_OBJ);
                $_SESSION["UserName"] = $user;
                $_SESSION["LOGIN"] = true;
                header('Location: index.php');
            }
        } else {
            array_push($errors , 'האימייל או סיסמא לא קיימים במערכת');
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
                <h1  class="title">התחברות</h1>

                <?php if(!empty($errors)){
                    foreach ($errors as $error)
                    {
                        echo "<tr><td colspan='2'>$error</td></tr>";
                    }
                }
                ?>

                <tr>
                    <td>אימייל:</td>
                    <td><input type="text" placeholder="email" id="email" name="email" class="formNice"/></td>
                </tr>
                <tr>
                    <td>סיסמא:</td>
                    <td><input type="password" placeholder="password" id="pass" name="password" class="formNice"/></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="button" class="nicebutton" value="התחבר" onclick="checkLogin(this.form)" name="login"/>
                    </td>
                </tr>
            </table>
        </form>
    </main>
</div>

</body>
</html>