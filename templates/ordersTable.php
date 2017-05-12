<?php
for ($i = 0; ($i + 1) < count($seatsArray); $i++) {
    $chairIndexes=explode("_",$seatsArray[$i]);
    ?>
    <tr>
        <td><?php echo $i + 1?></td>
       <td><span></span><?php echo $chairIndexes[0]?></td>
        <td><span></span><?php echo $chairIndexes[1]?></td>
    </tr>
<?php }?>