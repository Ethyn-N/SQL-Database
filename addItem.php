<!-- Ethyn Nguyen - Student ID: 1001930354 -->
<!-- Jorge Catano - Student ID: 1002149092 -->

<?php

require './Service.php';

$service = new Service();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $result = $service->addItem();
}
?>

<!DOCTYPE html>
<html>
<head>
<title> Add Item </title>
    </head>
    <body>
        <form method="post">
        <fieldset>
            <legend> Add Item</legend>

            <input type="text" name="name" placeholder="Item Name" ></br>

            <input type="text" name="price" placeholder="Item Price" ></br>

            <input id="button" type="submit" name="Add Item">
        </fieldset>
        <!-- <?= htmlspecialchars($result); ?> -->
    </body>

</html>