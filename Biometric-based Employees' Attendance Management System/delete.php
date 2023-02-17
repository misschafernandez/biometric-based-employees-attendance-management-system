<?php 
include "db_conn.php";
// if the 'id' variable is set in the URL, we know that we need to edit a record
if (isset($_GET['id'])) {
	$emp_id = $_GET['id'];

	// write delete query
	$sql = "DELETE FROM `employees` WHERE `emp_id`='$emp_id'";

	// Execute the query

	$result = $conn->query($sql);
	if ($result == TRUE) {
		 ?>
                                <script type="text/javascript">
                                    swal({
                                      title: "Success!",
                                      text: "<?php echo 'Employee record successfully deleted!!'; ?>",
                                      type: "success",
                                      timer: 1500,
                                      showConfirmButton: false,
                                      html: true,
                                    });
                                </script>
                            <?php
		echo '<script>alert("Employee Records Successfully Deleted!");</script>';
		echo '<script>window.open("view.php", "_self");</script>';
	}else{
		echo "Error:" . $sql . "<br>" . $conn->error;
	}
}
?>
