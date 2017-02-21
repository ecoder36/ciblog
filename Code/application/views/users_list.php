<html>
    <head>
        <title>Users Accounts List</title>
    </head>
    <body>
        <table>
            <tr>
                <th>first</th>
                <th>last</th>
            </tr>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user->firstname ?></td>
                <td><?=$user->lastname ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </body>
    
</html>