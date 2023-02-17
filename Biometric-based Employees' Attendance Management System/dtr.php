<?php
	include 'db_conn.php';

	date_default_timezone_set('Asia/Manila');

	$datetoday = date('y-m-d');
	$timetoday = date('h:i');
	$ampm = date('A');

	if (isset($_POST['emp_id'])) {
		$emp_id = addslashes($_POST['emp_id']);

		$checkregister = $conn -> query("SELECT *  FROM employees WHERE emp_id = '$emp_id'") or die($conn -> error);
		$countregister = $checkregister -> num_rows;

		if ($countregister == 0) {
			echo '<script>alert("FINGERPRINT NOT REGISTERED!");</script>';
		}else{
			$checker = $conn -> query("SELECT * FROM attendance WHERE emp_id = '$emp_id' AND date_attend LIKE '%$datetoday%'") or die($conn -> error);
			$fetch = $checker -> fetch_assoc();
			$counter = $checker -> num_rows;
			if ($counter == 0) {
				if ($ampm == 'AM') {
					$inserter = $conn -> query("INSERT INTO attendance(emp_id, timein_am) VALUES('$emp_id', '$timetoday')") or die($conn -> error);
				}else{
					$inserter = $conn -> query("INSERT INTO attendance(emp_id, timein_pm) VALUES('$emp_id', '$timetoday')") or die($conn -> error);
				}
				
			}else{
				if ($ampm == 'AM') {
					$updater = $conn -> query("UPDATE attendance SET timeout_am = '$timetoday' WHERE emp_id = '$emp_id'") or die($conn -> error);
				}else{
					$updater = $conn -> query("UPDATE attendance SET timeout_pm = '$timetoday' WHERE emp_id = '$emp_id'") or die($conn -> error);
				}			
			}

			echo '<script>alert("Attendance Success!");</script>';
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<center>
		<form method="POST" action="dtr.php">
			<input type="text" name="emp_id" autofocus required>
		</form>
	</center>
</body>
</html>