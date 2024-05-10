<!-- Ethyn Nguyen - Student ID: 1001930354 -->
<!-- Jorge Catano - Student ID: 1002149092 -->

<?php
require './Service.php';
$service = new Service();

// Initialize message and items array for displaying
$message = "";
$searchResults = null;

// Handle POST requests
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $message = $service->addItem($name, $price);
    } elseif (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $message = $service->deleteItem($id);
    } elseif (isset($_POST['update'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $message = $service->updateItem($id, $name, $price);
    } elseif (isset($_POST['search'])) {
        $searchTerm = $_POST['searchTerm'];
        $searchResults = $service->searchItem($searchTerm);
    }
}

// Fetch all items for the index
$items = $service->fetchAllItems();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Item Management</title>
</head>
<body>
    <h1>Item Management</h1>

    <!-- Display message -->
    <p><?= htmlspecialchars($message); ?></p>

    <!-- Add Item Form -->
    <h2>Add Item</h2>
    <form method="post">
        <input type="text" name="name" placeholder="Item Name" required>
        <input type="text" name="price" placeholder="Item Price" required>
        <button type="submit" name="add">Add Item</button>
    </form>

    <!-- Delete Item Form -->
    <h2>Delete Item</h2>
    <form method="post">
        <input type="text" name="id" placeholder="Item ID" required>
        <button type="submit" name="delete">Delete Item</button>
    </form>

    <!-- Update Item Form -->
    <h2>Update Item</h2>
    <form method="post">
        <input type="text" name="id" placeholder="Item ID" required>
        <input type="text" name="name" placeholder="New Name" required>
        <input type="text" name="price" placeholder="New Price" required>
        <button type="submit" name="update">Update Item</button>
    </form>

    <!-- Search Items Form -->
    <h2>Search Items</h2>
    <form method="post">
        <input type="text" name="searchTerm" placeholder="Enter Item ID or Name" required>
        <button type="submit" name="search">Search</button>
    </form>

    <!-- Search Results -->
    <?php if (isset($_POST['search'])): ?>
        <h3>Search Results</h3>
        <?php if (!empty($searchResults)): ?>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                </tr>
                <?php foreach ($searchResults as $item): ?>
                <tr>
                    <td><?= htmlspecialchars($item['iId']); ?></td>
                    <td><?= htmlspecialchars($item['Iname']); ?></td>
                    <td>$<?= number_format(htmlspecialchars($item['Sprice']), 2); ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No items found.</p>
        <?php endif; ?>
    <?php endif; ?>

    <!-- Display All Items -->
    <h3>All Items</h3>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
        </tr>
        <?php foreach ($items as $item): ?>
        <tr>
            <td><?= htmlspecialchars($item->iId); ?></td>
            <td><?= htmlspecialchars($item->Iname); ?></td>
            <td>$<?= number_format(htmlspecialchars($item->Sprice), 2); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
