<?php include 'core/init.php';  ?>

<!doctype html>
<html lang="he" dir="rtl">
<head>
    <?php include 'templates/header.php';  ?>
    <script src="js/reserve.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/reserve.css">
    <script src="js/jquery.seat-charts.min.js"></script>
</head>
    <body>
        <?php include 'templates/menu.php';  ?>
        <main>
            <div class="demo">
                <div id="seat-map">
                    <div class="front">SCREEN</div>
                </div>
                <div class="booking-details">
                    <p>Movie: <span> Gingerclown</span></p>
                    <p>Time: <span>November 3, 21:00</span></p>
                    <p>Seat: </p>
                    <ul id="selected-seats"></ul>
                    <p>Tickets: <span id="counter">0</span></p>
                    <p>Total: <b>&#8362;<span id="total">0</span></b></p>

                    <button class="checkout-button">BUY</button>

                    <div id="legend"></div>
                </div>
                <div style="clear:both"></div>
            </div>
        </main>
    </body>



