<?php
	$server = "localhost";
	$server_user = "root";
	$server_pass = "mysql";
	$database = "glamourcraze";

	try {
		$conn = new PDO("mysql:host=$server;dbname=$database", $server_user, $server_pass);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	} catch(PDOException $e) {
		echo "Database Connection Faild ".$e->getMessage();
	}
?>