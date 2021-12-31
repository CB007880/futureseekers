<?php 
require_once 'source/db_connect.php';


if(isset($_POST['signup-btn'])){

	$name = $_POST['user-name'];
	$username = $_POST['user-username'];
	$email = $_POST['user-email'];
	$password = $_POST['user-password'];
	$type = $_POST['type'];

	$hashed_password = password_hash($password, PASSWORD_DEFAULT);


	try{
		$SQLInsert = "INSERT INTO users (name, username, email, password, registration_date, type) VALUES (:name, :username, :email, :password, now(), :type)";


		 $statement = $conn->prepare($SQLInsert);
		 $statement->execute(array(':name' => $name,':username' => $username, ':email' => $email, ':password' => $hashed_password, ':type' => $type));

		 if($statement->rowCount() ==1) {
		 	$message = 'Pending for Admin Approval';

    		echo"<SCRIPT> alert('$message')
        	window.location.replace('login.html');
    		</SCRIPT>";
		 }


	}
	catch (PDOException $e) {
		echo "Error: " . $e->getMessage();
	}

}


?>