<?php include 'core/init.php';  ?>

<!doctype html>
<html lang="he" dir="rtl">
<head>
    <?php include 'templates/header.php';  ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/locales/bootstrap-datepicker.he.min.js" ></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
    <script>

        $(function() {
            $('#datePicker div').datepicker({
                format: "dd/mm/yyyy",
                startDate: "-infinity",
                language: "he",
                multidate: "flase",
                autoclose: true,
                todayHighlight: true
            }).on('changeDate', function(e){
                $('#dt_due').val(e.format('dd/mm/yyyy'))
            });
        });
    </script>
</head>

<body>
<?php include 'templates/menu.php';  ?>

<div class="wrap">
    <main>
        <div>
            <p><span>כדי לבחור את מועד הסרט אנא בחר תאריך:</span></p>

            <table style="margin-right: 35%" class = "calendar-table">
                <tr>
                    <td>
                        <div id = "datePicker" >
                            <div style = "background : white"></div>
                            <input type="hidden" name="dt_due" id="dt_due">
                        </div>
                    </td>
                    <td>
                        <span>day</span>
                    </td>
                </tr>


<!--            <div id = "moviesInDate"></div>-->
<!--            <p><button onclick=" location.href='Seat_preview.php' ">לבחירת מקומות בקולנוע</button></p>-->
<!--            <div class="info-sub">-->
<!--                <p>-->
<!--                    <span>*ע"י לחיצה על המשך תועבר לעמוד מותאם, לאחר מכן תוכל להמשיך ולסיים את הרכישה.</span>-->
<!--                </p>-->
            </div>
        </div>
    </main>
</div>

</body>
</html>
