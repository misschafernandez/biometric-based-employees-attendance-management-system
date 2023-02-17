<?php
	session_start();
	include 'db_conn.php';


	if (isset($_POST['emp_id'])) {
		$lastname = $_SESSION['lastname'];
		$firstname = $_SESSION['firstname'];
		$middlename = $_SESSION['middlename'];
		$sex = $_SESSION['sex'];
		$position = $_SESSION['position'];
		$emp_id = $_POST['emp_id'];

		$checkregister = $conn -> query("SELECT *  FROM employees WHERE emp_id = '$emp_id'") or die($conn -> error);
		$countregister = $checkregister -> num_rows;

		if ($countregister > 0) {
			echo '<script>alert("FINGERPRINT ALREADY REGISTERED!");</script>';
			echo '<script>window.open("registeremployee.php", "_self");</script>';
		}else{
			$checker = $conn -> query("INSERT INTO employees(emp_id, lastname, firstname, middlename, sex, position) VALUES('$emp_id', '$lastname', '$firstname', '$middlename', '$sex', '$position')") or die($conn -> error);

			echo '<script>alert("REGISTRATION SUCCESS!");</script>';
			echo '<script>window.open("registeremployee.php", "_self");</script>';
		}
	}else{
		echo '<script>window.open("index.php", "_self");</script>';
	}
?>

