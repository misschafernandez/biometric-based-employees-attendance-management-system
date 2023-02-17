<?php 
include "config.php";

// if the form's submit button is clicked, we need to process the form
	if (isset($_POST['submit'])) {
		// get variables from the form
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$emp_id = $_POST['emp_id'];
		$middlename = $_POST['middlename'];
		$position = $_POST['position'];


		//write sql query

		$sql = "INSERT INTO `employees`(`firstname`, `lastname`, `middlename`, `position`, `sex`) VALUES ('$firstname','$lastname','$middlename','$position')";


		// execute the query

		$result = $conn->query($sql);

		if ($result == TRUE) {
			echo "New record created successfully.";
		}else{
			echo "Error:". $sql . "<br>". $conn->error;
		}

		$conn->close();

	}



?>

<!DOCTYPE html>
<html>
<body>

<h2>Signup Form</h2>

<form action="" method="POST">
  <fieldset>
    <legend>Personal information:</legend>
     		Lastname:<br>
		    <input type="text" name="lastname" value="<?php echo $lastname; ?>">
		    <input type="hidden" name="emp_id" value="<?php echo $id; ?>">
		    <br>
		    Firstname:<br>
		    <input type="text" name="firstname" value="<?php echo $first_name; ?>">
		    <br>
		    Middlename:<br>
		    <input type="text" name="middlename" value="<?php echo $middlename; ?>">
		    <br>
		    Gender:<br>
		    <input type="text" name="sex" value="<?php echo $sex; ?>">
		    <br>
		    <br><br>

		    Position:<br>
		    <input type="text" name="position" value="<?php echo $position; ?>">
		    <br><br>
    <input type="submit" name="submit" value="submit">
  </fieldset>
</form>

</body>
</html>