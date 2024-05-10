<!-- Ethyn Nguyen - Student ID: 1001930354 -->
<!-- Jorge Catano - Student ID: 1002149092 -->

<?php

class Database {

	public function getDatabaseConnection(){

		$dbHost = "localhost:3306";
		$dbName = "database";
		$dbUser = "root";
		$dbPassword = "";

		try {
			// PDO in PHP (PHP Data Objects)
			$dbConnection = new PDO('mysql:host='.$dbHost.';dbname='.$dbName, $dbUser, $dbPassword);
			$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $dbConnection;
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
}