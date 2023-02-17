<?php 
include "db_conn.php";

// if the 'id' variable is set in the URL, we know that we need to edit a record
if (isset($_GET['id'])) {
	$id = $_GET['id'];

	// write delete query
	$sql = "DELETE FROM `users` WHERE `id`='$id'";

	// Execute the query

	$result = $conn->query($sql);
	if ($result == TRUE) {

		echo '<script>alert("Admin Account Successfully Deleted!");</script>';
		echo '<script>window.open("Accounts.php", "_self");</script>';

	}else{
		
		echo "Error:" . $sql . "<br>" . $conn->error;
	}
}

?>	

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="css/sweetalert.css">
    <script src="js/sweetalert.min.js"></script>
    <script src="js/sweetalert.js"></script>
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">


	<title></title>
</head>
<body>


</body>
</html>