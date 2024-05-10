<!-- Ethyn Nguyen - Student ID: 1001930354 -->
<!-- Jorge Catano - Student ID: 1002149092 -->

<?php

require './Database.php';
require './Item.php';

class Service {

    function fetchAllItems() {
		
		$dbObject = new Database();
		$dbConnection = $dbObject->getDatabaseConnection();

        $sql = "SELECT * FROM item";

		$stmt = $dbConnection->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, 'Item');

		if ($stmt->execute()){
			return $stmt->fetchAll();
		} else{
			return 'Failed';
		}
	}

    function addItem() {
        $name = $_POST['name'];
        $price = $_POST['price'];

        $dbObject = new Database();
		$dbConnection = $dbObject->getDatabaseConnection();

        $sql = "INSERT INTO item (`Iname`,`Sprice`) VALUES (?,?)";

		$stmt = $dbConnection->prepare($sql);
        //var_dump($stmt);
        if ($stmt->execute([$name, $price])) {
            // The primary key value will be auto-incremented by the database
        } else {
            return 'Failed';  
        }
    }

    function deleteItem() {
        if (isset($_POST['exit'])) {
            header( "Location: http://localhost/php_school_demo/menu.php"); }
        $id = $_POST['id'];

        $dbObject = new Database();
		$dbConnection = $dbObject->getDatabaseConnection();

        $sql = "DELETE FROM item WHERE Iid=" .$id;

        echo $sql;
		$stmt = $dbConnection->query($sql);
        //echo "DELETED ITEM";
    }

    function updateItem() {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];

        $dbObject = new Database();
		$dbConnection = $dbObject->getDatabaseConnection();

        $sql = "UPDATE item SET Iname='" . $name ."', Sprice=". $price ." WHERE Iid=". $id;
        echo $sql;
        $stmt = $dbConnection->query($sql); 
    }

    function searchItem($searchTerm) {
        $dbObject = new Database();
        $dbConnection = $dbObject->getDatabaseConnection();
    
        // Prepare the query to search by item ID (as an integer) or item name (as a substring)
        $sql = "SELECT * FROM item WHERE iId = ? OR Iname LIKE ?";
        $stmt = $dbConnection->prepare($sql);
        $stmt->execute([intval($searchTerm), "%" . $searchTerm . "%"]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        // Ensure that an array is always returned
        return $results ? $results : [];
    }
}

