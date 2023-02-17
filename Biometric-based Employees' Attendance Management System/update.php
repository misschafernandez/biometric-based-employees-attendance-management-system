<?php 
include "db_conn.php";

// if the form's update button is clicked, we need to process the form
	if (isset($_POST['update'])) {
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$emp_id = $_POST['emp_id'];
		$middlename = $_POST['middlename'];
		$position = $_POST['position'];
		$sex = $_POST['sex'];


		// write the update query
		$sql = "UPDATE `employees` SET `firstname`='$firstname',`lastname`='$lastname',`middlename`='$middlename',`sex`='$sex',`position`='$position' WHERE `emp_id`='$emp_id'";

		// execute the query
		$result = $conn->query($sql);

		if ($result == TRUE) {
			echo '<script>alert("Record updated successfully.");</script>';
			echo '<script>window.open("view.php", "_self");</script>';
		}else{
			echo "Error:" . $sql . "<br>" . $conn->error;
		}
	}


// if the 'id' variable is set in the URL, we know that we need to edit a record
if (isset($_GET['id'])) {
	$emp_id = $_GET['id'];

	// write SQL to get user data
	$sql = "SELECT * FROM `employees` WHERE `emp_id`='$emp_id'";

	//Execute the sql
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		
		while ($row = $result->fetch_assoc()) {

			$firstname = $row['firstname'];
			$lastname = $row['lastname'];
			$emp_id = $row['emp_id'];
			$middlename = $row['middlename'];
			$position = $row['position'];
			$sex = $row['sex'];

		}

	?>
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		
		<div class="container">
		<h2>Employee Update Form</h2>
		<form action="" method="post">
		  <fieldset>
		    <legend>Personal information:</legend>
		    Lastname:<br>
		    <input type="text" name="lastname" class="form-control"  value="<?php echo $lastname; ?>">
		    <input type="hidden" name="emp_id" value="<?php echo $emp_id; ?>">
		    <br>
		    Firstname:<br>
		    <input type="text" name="firstname" class="form-control" value="<?php echo $firstname; ?>">
		    <br>
		    Middlename:<br>
		    <input type="text" name="middlename" class="form-control" value="<?php echo $middlename; ?>">
		    <br>
		    Gender:<br>
		    <select name="sex" select class="form-select form-select-sm" required  value="<?php echo $sex; ?>">
						<option value="" disabled selected>Select</option>
						<option value="MALE">MALE</option>
						<option value="FEMALE">FEMALE</option>
					</select>
		    <br>
		    Position:<br>
		    <select name="position" select class="form-select form-select-sm" value="<?php echo $position; ?>" required >
						<option value="" disabled selected>Select</option>
						<option value="SCHOOL HEAD">SCHOOL HEAD</option>
                        <option value="TEACHER I">TEACHER I</option>
                        <option value="TEACHER II">TEACHER II</option>
					</select>
		    <br><br>
		    <input type="submit" value="Update" class="btn btn-primary" name="update"a href="view.php"></a>
		  </fieldset>
		</form>	

		</div>
		

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

		</body>
		</html>

	<?php
	} else{
		// If the 'id' value is not valid, redirect the user back to view.php page
		header('Location: view.php');
	}

}
?>