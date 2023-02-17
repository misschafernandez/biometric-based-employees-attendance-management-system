<?php 
include "db_conn.php";

// if the form's update button is clicked, we need to process the form
	if (isset($_POST['update'])) {
		$user_name = $_POST['username'];
		$password = $_POST['password'];
		$name= $_POST['name'];
		$id = $_POST['id'];



		// write the update query
		$sql = "UPDATE `users` SET `user_name`='$user_name',`password`='$password', `name`='$name' WHERE `id`='$id'";

		// execute the query
		$result = $conn->query($sql);

		if ($result == TRUE) {
			echo '<script>alert("Account updated successfully.");</script>';
			echo '<script>window.open("accounts.php", "_self");</script>';
		}else{
			echo "Error:" . $sql . "<br>" . $conn->error;
		}
	}


// if the 'fingerprint' variable is set in the URL, we know that we need to edit a record
if (isset($_GET['id'])) {
	$id = $_GET['id'];

	// write SQL to get user data
	$sql = "SELECT * FROM `users` WHERE `id`='$id'";

	//Execute the sql
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		
		while ($row = $result->fetch_assoc()) {

			$user_name = $row['user_name'];
			$password = $row['password'];
			$name = $row['name'];

		}

	?>
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		
		<div class="container">
		<h2>Employee Update Form</h2>
		<form action="" method="post">
		  <fieldset>
		    <legend>Admin Account:</legend>

		    Username:<br>
		    <input type="text" name="username" class="form-control"  value="<?php echo $user_name; ?>">
		    <input type="hidden" name="id" value="<?php echo $id; ?>">
		    <br>

		    Password:<br>
		    <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
		    <input type="hidden" name="id" value="<?php echo $id; ?>">
		    <br>

		    Name:<br>
		    <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
		    <input type="hidden" name="id" value="<?php echo $id; ?>">
		    <br>
		    <input type="submit" value="Update" class="btn btn-primary" name="update"a href="accounts.php"></a>
		  </fieldset>

		</form>	

		</div>
		

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

		</body>
		</html>

	<?php
	} else{
		// If the "fingerprint" value is not valid, redirect the user back to view.php page
		header('Location: accounts.php');
	}

}
?>