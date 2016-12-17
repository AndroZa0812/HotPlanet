<header id="top">
    <div class="wrap">
        <span id="logo">
            <a href="index.php">
                <img src="img/logo.png" alt="הוט פלנט" title="הוט פלנט"/>
            </a>
        </span>

        <ul>
            <li><a href="index.php">דף הבית</a></li>

            <?php if(!$_SESSION['LOGIN']) { ?>
                <li><a href='register.php'>הרשמה</a></li>
                <li><a href='login.php'>התחברות</a></li>
            <?php } else { ?>
                <li><a href='logout.php'>התנתק</a></li>
            <?php } ?>
            <li><a href="newmovies.php">סרטים חדשים</a></li>
            <li><a href="contact.php">צור קשר</a></li>
        </ul>

        <div class="clear"></div>
    </div>
</header>
