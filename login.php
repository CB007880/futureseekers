<?php
require_once "vendor/autoload.php";
require_once 'source/session.php';
require_once 'source/db_connect.php';

$is_valid = GUMP::is_valid($_POST, [
	"username" => "required",
	"password" => "required"
]);

if ( $is_valid === true ):

	try {

		$statement = $conn->prepare("SELECT * FROM users WHERE username = :username");
		$statement->execute([':username' => $_POST["username"]]);

		/**
		 * If someone submit a invalid username we can verify
		 * it by getting the SQL return row count and return
		 * error based on that that data.
		 */
		if ($statement->rowCount() == 0):
			echo json_encode([
				"status" => "failed",
				"errors" => ["invalid username"]
			], true);
			return;
		endif;

		/**
		 * Check password with the database to verify
		 * user is entering the correct one.
		 */
		while($row = $statement->fetch()):
			if (password_verify($_POST["password"], $row["password"])):

				/**
				 * Check if the user account got validated from the
				 * administrator staff and push error message to
				 * frontend.
				 */
				if ( $row["status"] == 0 ):
					echo json_encode([
						"status" => "failed",
						"errors" => ["User is not approved"]
					], true);
					return;
				endif;

				$_SESSION["id"] = $row["id"];
				$_SESSION["username"] = $row["username"];
				echo json_encode([ "status" => "success" ], true);
				return;

			else:
				echo json_encode([
					"status" => "failed",
					"errors" => ["invalid password"]
				], true);
				return;
			endif;
		endwhile;

	} catch (Exception $e) {
		echo json_encode([
			"status" => "failed",
			"errors" => ["Database connection error"]
		], true);
		return;
	}

else:
	echo json_encode([
		"status" => "failed",
		"errors" => $is_valid
	], true);
	return;
endif;

?>