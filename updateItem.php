<!-- Ethyn Nguyen - Student ID: 1001930354 -->
<!-- Jorge Catano - Student ID: 1002149092 -->

<?php

require './Service.php';

$service = new Service();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $result = $service->updateItem(); 
}
?>

<!DOCTYPE html>
<html>
<head>
<title> Update Item </title>
    </head>
    <body>
        <form method="post">
        <fieldset>
            <legend> Update Item</legend>

            <input type="text" name="id" placeholder="ID"></br>

            <input type="text" name="name" placeholder="Name" ></br>

            <input type="text" name="price" placeholder="Price" ></br>

            <input id="button" type="submit" name="submit">
        </fieldset>
        <!-- <?= htmlspecialchars($result); ?> -->
    </body>

</html>