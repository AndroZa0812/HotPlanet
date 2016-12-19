<header id="top">
    <div class="wrap">
        <div id="logo">
            <a href="index.php">
                <img src="../img/logo-v2.png" alt="הוט פלנט" title="הוט פלנט"/>
            </a>
        </div>
        <ul>
            <li><a href="index.php">דף הבית</a></li>

            <?php if(!$_SESSION['LOGIN']) { ?>
                <li><a href='register.php'>הרשמה</a></li>
                <li><a href='login.php'>התחברות</a></li>
            <?php } else {
                if ($_SESSION["UserName"]->admin) {?>
                    <li><a href="admin.php">נהל משתמשים</a></li>
                <?php } ?>
                    <li><a href='logout.php'>התנתק</a></li>
            <?php } ?>
            <li><a href="newmovies.php">סרטים חדשים</a></li>
            <li><a href="contact.php">צור קשר</a></li>
        </ul>

        <div class="clear"></div>
    </div>
</header>
