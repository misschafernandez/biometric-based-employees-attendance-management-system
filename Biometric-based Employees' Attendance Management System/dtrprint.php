<?php
	include 'db_conn.php';

	date_default_timezone_set('Asia/Manila');

	$yearcurrent = date('Y');
	$endyear = $yearcurrent - 10;
?>
<!DOCTYPE html>
<html>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<title>Print DTR</title>
	<style type="text/css">
		table{
			border-collapse: collapse;
			width: 100%;
		}

		table, td, th{
			border: 1px solid black;
		}

		th, td{
			padding: 5px;
		}

		.editable, .editable td, .editable th{ border: none; } form { width:
		 500px; border: 2px solid #ccc; padding: 30px; background: #fff;
		 border-radius: 15px; } body {  display: flex;
		 padding: 10px; align-items: center; height: 100vh; flex-direction:
		 column; }	

		body{
			background-color: gray;
		}
		button{
			background-color: lightgreen;
			font-family: Time New Roman;
			font-size: 20px;
		}	

	</style>
</head>
<body>
	<center>
		<form method="POST" action="dtrprint.php">
			<div id="tohide">
				<label for="selectedmonth">MONTH:</label>
				<select name="selectedmonth" id="selectedmonth" class="form-select form-select-sm"  required>
					<option value="" disabled selected>Select</option>
					<option value="1">JANUARY</option>
					<option value="2">FEBRUARY</option>
					<option value="3">MARCH</option>
					<option value="4">APRIL</option>
					<option value="5">MAY</option>
					<option value="6">JUNE</option>
					<option value="7">JULY</option>
					<option value="8">AUGUST</option>
					<option value="9">SEPTEMBER</option>
					<option value="10">OCTOBER</option>
					<option value="11">NOVEMBER</option>
					<option value="12">DECEMBER</option>
				</select>
				<br>
				<label for="selectedyear">YEAR:</label>
				<select name="selectedyear" id="selectedyear" class="form-select form-select-sm"  required>
					<option value="" disabled selected>Select</option>
					<?php
						for ($i = $yearcurrent; $i >= $endyear; $i--) { 
					?>
							<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
					<?php
						}
					?>
				</select>
				<br>
				<label for="emp_id">EMPLOYEE:</label>
				<select name="emp_id" id="emp_id" class="form-select form-select-sm"  required>
					<option value="" disabled selected>Select</option>
					<?php
						$checkemp = $conn -> query("SELECT * FROM employees ORDER BY lastname, firstname, middlename") or die($conn -> error);
						while ($fetchemp = $checkemp -> fetch_assoc()) { 
					?>
							<option value="<?php echo $fetchemp['emp_id']; ?>"><?php echo $fetchemp['lastname'] . ', ' . $fetchemp['firstname'] . ' ' . $fetchemp['middlename']; ?></option>
					<?php
						}
					?>
				</select>
				<button name="submit" type="submit" class="btn btn-primary">
					SUBMIT
				</button>
				<button class="btn btn-primary my-5"><a href="home.php" class="text-light">Dashboard</a></button>
			</div>
		</form>
	</center>
	<br><br><br>
<?php 
	if (isset($_POST['submit'])) {
		$emp_id = $_POST['emp_id'];
		$selectedyear = $_POST['selectedyear'];
		$selectedmonth = $_POST['selectedmonth'];
?>
	<center>
		<?php
			$month = "";

			if ($selectedmonth == '1') {
				$month = 'January';
			}elseif ($selectedmonth == '2') {
				$month = 'February';
			}elseif ($selectedmonth == '3') {
				$month = 'March';
			}elseif ($selectedmonth == '4') {
				$month = 'April';
			}elseif ($selectedmonth == '5') {
				$month = 'May';
			}elseif ($selectedmonth == '6') {
				$month = 'June';
			}elseif ($selectedmonth == '7') {
				$month = 'July';
			}elseif ($selectedmonth == '8') {
				$month = 'August';
			}elseif ($selectedmonth == '9') {
				$month = 'September';
			}elseif ($selectedmonth == '10') {
				$month = 'October';
			}elseif ($selectedmonth == '11') {
				$month = 'November';
			}elseif ($selectedmonth == '12') {
				$month = 'December';
			}
		?>
		<center>
		<table class="editable">
			<tr>
				
				<th>
					<div>
					<img style=" width: 100px; height: 100px; 
					margin: 50px;" src="img/logo2.jpg">
					</div>
				
					<h2 class="text-center" style="margin: 0px; padding: 5px;">DAILY TIME RECORD</h2>
				</th>
			</tr>
			<tr>
				<th class="text-center"><?php echo $month . ' ' . $selectedyear; ?></th>
			</tr>
			<?php
				$checkprofile = $conn -> query("SELECT * FROM employees WHERE emp_id = '$emp_id'") or die($conn -> error);
				$fetchprofile = $checkprofile -> fetch_assoc();
			?>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>Name: <b><?php echo $fetchprofile['lastname'] . ', ' . $fetchprofile['firstname'] . ' ' . $fetchprofile['middlename']; ?></td>
			</tr>
			<tr>
				<td>Position: <b><?php echo $fetchprofile['position']; ?></td>
			</tr>
		</table>
		<br>
		<table>
			<?php
				$numdays = cal_days_in_month(CAL_GREGORIAN, $selectedmonth, $selectedyear);
			?>
		</table>
		</center>
		<table>
			<tr>
				<?php
					for ($k=1; $k <= 8; $k++) {
						$num = 0;
						if ($k < 10) {
							$num = '0' . $k;
						}else{
							$num = $k;
						}

						$datedate = $selectedyear . '-' . $selectedmonth . '-' . $num;
				?>
						<th width="12.5%">
							<?php echo $k; ?>
							<br>
							<?php 
								$reps = date('l', strtotime($datedate));
								echo $reps;
							?>
						</th>
				<?php
					}
				?>
			</tr>
			<tr>
				<?php
					for ($l=1; $l <= 8; $l++) { 
				?>

						<th>
							<?php
								$num = 0;
								if ($l < 10) {
									$num = '0' . $l;
								}else{
									$num = $l;
								}


								$datedate = $selectedyear . '-' . $selectedmonth . '-' . $num;
								
								$query = $conn -> query("SELECT * FROM attendance WHERE emp_id = '$emp_id' AND date_attend = '$datedate'");
								$fetcher = $query -> fetch_assoc();
								$numer = $query -> num_rows;


								if ($numer == 0) {
									echo '-';
								}else{
									echo $fetcher['timein_am'] . ' - ' . $fetcher['timeout_am'] . '<br>' . $fetcher['timein_pm'] . ' - ' . $fetcher['timeout_pm'];
								}
							?>
						</th>
				<?php
					}
				?>
			</tr>
			<tr>
				<?php
					for ($m=9; $m <= 16; $m++) {
						$num = 0;
						if ($m < 10) {
							$num = '0' . $m;
						}else{
							$num = $m;
						}
								
						$mon = 0;
						$mon = $selectedmonth;

						$datedate = $selectedyear . '-' . $mon . '-' . $num;
				?>
						<th width="12.5%">
							<?php echo $m; ?>
							<br>
							<?php 
								$reps = date('l', strtotime($datedate));
								echo $reps;
							?>
						</th>
				<?php
					}
				?>
			</tr>
			<tr>
				<?php
					for ($n=9; $n <= 16; $n++) { 
				?>
						<th>
							<?php
								$num = 0;
								if ($n < 10) {
									$num = '0' . $n;
								}else{
									$num = $n;
								}
								
								$mon = 0;
								$mon = $selectedmonth;

								$datedate = $selectedyear . '-' . $mon . '-' . $num;
								
								$query = $conn -> query("SELECT * FROM attendance WHERE emp_id = '$emp_id' AND date_attend = '$datedate'");
								$fetcher = $query -> fetch_assoc();
								$numer = $query -> num_rows;

								if ($numer == 0) {
									echo '-';
								}else{
									echo $fetcher['timein_am'] . ' - ' . $fetcher['timeout_am'] . '<br>' . $fetcher['timein_pm'] . ' - ' . $fetcher['timeout_pm'];
								}
							?>
						</th>
				<?php
					}
				?>
			</tr>
			<tr>
				<?php
					for ($o=17; $o <= 24; $o++) {
						$num = 0;
						if ($o < 10) {
							$num = '0' . $o;
						}else{
							$num = $o;
						}
								
						$mon = 0;
						$mon = $selectedmonth;

						$datedate = $selectedyear . '-' . $mon . '-' . $num;
				?>
						<th width="12.5%">
							<?php echo $o; ?>
							<br>
							<?php 
								$reps = date('l', strtotime($datedate));
								echo $reps;
							?>
						</th>
				<?php
					}
				?>
			</tr>
			<tr>
				<?php
					for ($p=17; $p <= 24; $p++) { 
				?>
						<th>
							<?php
								$num = 0;
								if ($p < 10) {
									$num = '0' . $p;
								}else{
									$num = $p;
								}
								
								$mon = 0;
								$mon = $selectedmonth;

								$datedate = $selectedyear . '-' . $mon . '-' . $num;
								
								$query = $conn -> query("SELECT * FROM attendance WHERE emp_id = '$emp_id' AND date_attend = '$datedate'");
								$fetcher = $query -> fetch_assoc();
								$numer = $query -> num_rows;


								if ($numer == 0) {
									echo '-';
								}else{
									echo $fetcher['timein_am'] . ' - ' . $fetcher['timeout_am'] . '<br>' . $fetcher['timein_pm'] . ' - ' . $fetcher['timeout_pm'];
								}
							?>
						</th>
				<?php
					}
				?>
			</tr>
			<tr>
				<?php
					for ($q=25; $q <= $numdays; $q++) {
						$num = 0;
						if ($q < 10) {
							$num = '0' . $q;
						}else{
							$num = $q;
						}
								
						$mon = 0;
						$mon = $selectedmonth;

						$datedate = $selectedyear . '-' . $mon . '-' . $num;
				?>
						<th width="12.5%">
							<?php echo $q; ?>
							<br>
							<?php 
								$reps = date('l', strtotime($datedate));
								echo $reps;
							?>
						</th>
				<?php
					}
				?>
			</tr>
			<tr>
				<?php
					for ($r=25; $r <= $numdays; $r++) { 
				?>
						<th>
							<?php
								$num = 0;
								if ($r < 10) {
									$num = '0' . $r;
								}else{
									$num = $r;
								}
								
								$mon = 0;
								$mon = $selectedmonth;

								$datedate = $selectedyear . '-' . $mon . '-' . $num;
								
								$query = $conn -> query("SELECT * FROM attendance WHERE emp_id = '$emp_id' AND date_attend = '$datedate'");
								$fetcher = $query -> fetch_assoc();
								$numer = $query -> num_rows;


								if ($numer == 0) {
									echo '-';
								}else{
									echo $fetcher['timein_am'] . ' - ' . $fetcher['timeout_am'] . '<br>' . $fetcher['timein_pm'] . ' - ' . $fetcher['timeout_pm'];
								}
							?>
						</th>
				<?php
					}
				?>
			</tr>
		</table>
		<br>
		<div id="tohide2">
			<button onclick="printdtr()">PRINT</button>

			
		</div>
	</center>
<?php
	}
?>
<script type="text/javascript">
	function printdtr(){
		document.getElementById("tohide").hidden = true;
		document.getElementById("tohide2").hidden = true;
		window.print();
		document.getElementById("tohide").hidden = false;
		document.getElementById("tohide2").hidden = false;
	}
</script>
</body>
</html>