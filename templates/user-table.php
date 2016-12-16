<?php for ($i = 0; $i < count($users); $i++): ?>
    <tr>
        <th scope="row"><?= $users[$i]['id'] ?></th>
        <td><?= $users[$i]['firstname'] ?></td>
        <td><?= $users[$i]['lastname'] ?></td>
        <td><?= $users[$i]['email'] ?></td>
        <td><?= $users[$i]['password'] ?></td>
        <td><?= $users[$i]['age'] ?></td>
        <td><input type="button" onclick="deleteUser(<?php echo $users[$i]['id'] ?>)" class="btn btn-sm btn-danger" value="Delete User"/> </td>
    </tr>
<?php endfor; ?>