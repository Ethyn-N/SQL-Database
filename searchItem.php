<!-- Ethyn Nguyen - Student ID: 1001930354 -->
<!-- Jorge Catano - Student ID: 1002149092 -->

<?php
require './Service.php';
$service = new Service();
$result = null; // Initialize result with null indicating no search has been made yet

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['search'])) {
    $searchTerm = $_POST['search'];
    $result = $service->searchItem($searchTerm);
    if (empty($result)) {
        $result = "No items found."; // Set result message only if search yields no results
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Item</title>
</head>
<body>
    <div>Search for Item</div>
    <form method="post" action="">
        <input type="text" name="search" placeholder="Enter Item ID or Name">
        <button type="submit">Search</button>
    </form>

    <?php if ($result !== null): ?>
        <?php if (is_array($result)): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($result as $item): ?>
                        <tr>
                            <td><?= htmlspecialchars($item['iId']); ?></td>
                            <td><?= htmlspecialchars($item['Iname']); ?></td>
                            <td>$<?= number_format(htmlspecialchars($item['Sprice']), 2); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p><?= $result; ?></p>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>