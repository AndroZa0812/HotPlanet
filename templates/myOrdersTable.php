<?php
for ($i = 0;  $i  < count($ordersArray); $i++) {
    ?>
    <tr>
        <td><?php echo $i + 1?></td>
        <td><?php echo $ordersArray[$i]->orderID?></td>
        <td><?php echo $ordersArray[$i]->movie_name?></td>
        <td>
            <table  class="table table-bordered table-striped seatsTable">
                <thead>
                <th>שורה</th>
                <th>טור</th>
                </thead>
                <tbody>
                <?php
                $seatsArray = array();
                $seatsArray = explode(",",$ordersArray[$i]->seats);
                for($j = 0 ; $j < count($seatsArray[$j]); $j++){
                    $currentSeat = explode("_", $seatsArray[$j]);
                    ?>
                    <tr>
                        <td><span></span><?php echo $currentSeat[0]?></td>
                        <td><span></span><?php echo $currentSeat[1]?></td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
        </td>
    </tr>
<?php }?>