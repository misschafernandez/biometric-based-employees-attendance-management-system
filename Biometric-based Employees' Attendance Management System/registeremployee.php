<?php
	session_start();
	include 'db_conn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add Employee</title>


   <!--  style -->
    <link rel="stylesheet" type="text/css" href="bootstrap5/css/bootstrap.min.css">

   <!--  font -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

    <style>
       
        h1{
            color: black;
        }
        center{
            background-color: gray;
        }
        
    </style>
<body id="page-top" >

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-school"></i>
                </div>
                <!-- <div class="sidebar-brand-text mx-3">CSUA<sup>AMS</sup></div> -->
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="home.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Manage
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
             <li class="nav-item">
                <a class="nav-link collapsed" href="registeremployee.php"  data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-plus"></i>
                    <span>Add employee</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="view.php"  data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-book"></i>
                    <span>View employee records</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="attendance.php"  data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-clock"></i>
                    <span>View attendance </span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="accounts.php"  data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-user"></i>
                    <span>View accounts </span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                       
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">ADMIN ACCOUNT</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                               
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="index2.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
               <!--  End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-black-800">Add Employee</h1>

                    <div class="row">

                    	<?php
		if (isset($_POST['submit'])) {
			$_SESSION['lastname'] = addslashes(trim(strtoupper($_POST['lastname'])));
			$_SESSION['firstname'] = addslashes(trim(strtoupper($_POST['firstname'])));
			$_SESSION['middlename'] = addslashes(trim(strtoupper($_POST['middlename'])));
			$_SESSION['sex'] = addslashes(trim(strtoupper($_POST['sex'])));
			$_SESSION['position'] = addslashes(trim(strtoupper($_POST['position'])));

	?>
			<center>
				<h1 style="color: black;">
					NOTE: Please scan the Finger print to register the employee.
				</h1>
				<form method="POST" action="finalizeregistration.php">
					<label>
						Scanner Section: 
					</label>
					<input type="text" name="emp_id" class="form-control" autofocus style="text-align: center;"> 
				</form>
			</center>
	<?php
		}else{
			if(isset($_SESSION['lastname']) AND isset($_SESSION['firstname']) AND isset($_SESSION['middlename']) AND isset($_SESSION['sex']) AND isset($_SESSION['position'])){
				unset($_SESSION['emp_id']);
				unset($_SESSION['lastname']);
				unset($_SESSION['firstname']);
				unset($_SESSION['middlename']);
				unset($_SESSION['sex']);
				unset($_SESSION['position']);

			}
	?>
			<center>
				<form method="POST" action="registeremployee.php">
					<h1>Employee Register</h1>
					<input type="text" name="lastname" class="form-control" placeholder="Lastname" required autofocus>
					<br>
					<input type="text" name="firstname" class="form-control" placeholder="Firstname" required>
					<br>
					<input type="text" name="middlename" class="form-control"  placeholder="Middlename" required>
					<br>
					<select name="sex" select class="form-select form-select-sm"   required>
						<option value="" disabled selected>Select Gender</option>
						<option value="MALE">MALE</option>
						<option value="FEMALE">FEMALE</option>
					</select>
                    <br>
					<select name="position" select class="form-select form-select-sm" required >
						<option value="" disabled selected>Select Position</option>
						<option value="SCHOOL HEAD">SCHOOL HEAD</option>
                        <option value="TEACHER I">TEACHER I</option>
                        <option value="TEACHER II">TEACHER II</option>
					</select>
					<br>
					<button type="submit" name="submit" class="btn btn-primary">
						PROCEED
					</button>
					
				</form>
			</center>
	<?php
		}
	?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span style="">BIOMETRIC BASED EMPLOYEE ATTENDANCE MANAGEMENT @ 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="index2.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>