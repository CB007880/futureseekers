<?php 

try {
	$conn = new PDO('mysql:host=localhost; dbname=futureseekers', 'root', '');
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	echo "Failed to connect to the database ".$e->getMessage();
}

?>
