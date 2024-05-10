<!-- Ethyn Nguyen - Student ID: 1001930354 -->
<!-- Jorge Catano - Student ID: 1002149092 -->

<?php
require './Service.php';
$service = new Service();
$items = $service->fetchAllItems();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../static/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
</head>

<body>
    <div>ITEMS</div>

    <table>
        <thead>
            <tr>
                <th>iID</th>
                <th>Iname</th>
                <th>Sprice </th>
                <!--<th>Update</th>
                <th>Delete</th>-->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $item) : ?>
                <tr>
                    <td><?= htmlspecialchars($item->iId); ?></td>
                    <td><?= htmlspecialchars($item->Iname); ?></td>
                    <td><?= htmlspecialchars($item->Sprice); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <!-- <?php foreach ($items as $item) : ?>
        
        <p><?= htmlspecialchars($item->name); ?></p>
    <?php endforeach; ?> -->
</body>

</html>