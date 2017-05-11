<?php for ($i = 0; $i < count($movies); $i++): ?>
    <tr>
        <th scope="row"><?= $movies[$i]['ID'] ?></th>
        <td><?= $movies[$i]['Movie'] ?></td>
        <td><?= $movies[$i]['year'] ?></td>
        <td id="moviedirection"><p><?= $movies[$i]['dec'] ?></p></td>
        <td><?= $movies[$i]['ageR'] ?></td>
        <td id="imagesize"><p><img src="img/<?= $movies[$i]['img']?>"/></p> </td>
        <td>
            <a href="../selectSeats.php?MovieID=<?php echo $movies[$i]['ID'] ?>">Purchase</a>
<!--            <input type="button" onclick="window.location.href='../buymovie.php'" class="btn btn-sm btn-danger" value="purchase" name = "movieID"/> -->
        </td>
        <td>
            <a href="../Reviews.php?MovieID=<?php echo $movies[$i]['ID'] ?>">Reviews</a>
        </td>
    </tr>
<?php endfor; ?>