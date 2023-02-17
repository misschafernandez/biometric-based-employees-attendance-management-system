 <?php 
session_start();
include 'db_conn.php';
    date_default_timezone_set("Asia/Manila");

    $datetoday = date('y-m-d');
    $timetoday = date('h:i');
    $ampm = date('A');
 ?>
 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="css/home.css">

    <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
    <script src="js/sweetalert.min.js"></script>
    <script src="js/sweetalert.js"></script>
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    
    <title>Dashboard</title>

    <style>

section .container{
    display: flex;
    align-items: center;
    justify-content: center;
    height: 220px;
    width: 550px;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
}
section .container .time{
    display: flex;
    align-items: center;
}
.container .time .time-colon{
    display: flex;
    align-items: center;
    position: relative;
}
.time .time-colon .am_pm{
    position: absolute;
    top: 0;
    right: -50px;
    font-size: 20px;
    font-weight: 700;
    letter-spacing: 1px;
}
.time .time-colon .time-text{
    height: 100px;
    width: 100px;
    display: flex;
    align-items: center;
    flex-direction: column;
    justify-content: center;
    background: lightpink;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
}
.time .time-colon .time-text,
.time .time-colon .colon{
    font-size: 35px;
    font-weight: 600;
}
.time .time-colon .colon{   
    font-size: 40px;
    margin: 0 12px;
}
.time .time-colon .time-text .text{
    font-size: 12px;
    font-weight: 700;
}

.tag {
    display: block;     
    width: 40%;
    height: calc(5em + 0.75rem + 2px);
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: lightpink;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
     }
    </style>
</head>

<body>
    <!-- <header class="header">
        <div class="header__container">
            <img src="img/logo.jpg" alt="" class="header__img">

            <a href="#" class="header__logo"></a>

            <div class="header__toggle">
                <i class='bx bx-menu' id="header-toggle"></i>
            </div>
        </div>
    </header>

     <div class="nav" id="navbar">
        <nav class="nav__container">
            <div>
                <a href="#" class="nav__link nav__logo">
                    <i  class="fas fa-school"></i>
                    <span style="margin-left: 10px;" class="nav__logo-name">CSUA_AMS</span>
                </a>

                <div class="nav__list">
                    <div class="nav__items">
                        <h3 class="nav__subtitle">NAVIGATION</h3>

                        <a href="#" class="nav__link active">
                            <i class='bx bx-home nav__icon'></i>
                            <span class="nav__name">Home</span>
                        </a>

                    </div>
                    <a href="index2.php" class="nav__link">
                        <i class='bx bx-log-in nav__icon'></i>
                        <span class="nav__name">Log in</span>
                    </a>

                </div>
                
            </div>
    </div>
    </nav>

    </div>
     -->

    <center>
         <form method="POST" action="index.php">
            <h2 class="h2">SCAN FINGERPRINT</h2>
            <input type="text" class="tag" name="emp_id" style="text-align: center;" autofocus required>
        </form> 
        <br>
        <br>
        <section>
        <div class="container">
            <div class="time">
                <div class="time-colon">
                    <div class="time-text">
                        <span class="num hour_num">08</span>
                        <span class="text">Hours</span>
                    </div>
                    <span class="colon">:</span>
                </div>
                <div class="time-colon">
                    <div class="time-text">
                        <span class="num min_num">45</span>
                        <span class="text">Minutes</span>
                    </div>
                    <span class="colon">:</span>
            </div>
            <div class="time-colon">
                <div class="time-text">
                    <span class="num sec_num">06</span>
                    <span class="text">Seconds</span>
                </div>
                <span class="am_pm">AM</span>
        </div>


    </section>
        <h1>BIOMETRIC BASED EMPLOYEE ATTENDANCE MANAGEMENT</h1>
<!--         <p style="text-decoration: underline; font-family: Bodoni MT;">APARRI CAMPUS</p>
          <img style="width: 120px;, height: 120px;" src="img/logo2.png"> -->

          <a href="login.php">LOGIN</a>
    </div>
      <script>
        setInterval(()=>{
                let date = new Date(),
                hour = date.getHours(),
                min = date.getMinutes(),
                sec = date.getSeconds();
                let d;
                        d = hour < 12 ? "AM" : "PM";
                hour = hour > 12 ? hour - 12 : hour;
                hour = hour == 0 ? hour = 12 : hour;

                // adding 0 to all the value if they will less than 10

                hour = hour < 10 ? "0" + hour : hour;
                min = min < 10 ? "0" + min : min;
                sec = sec < 10 ? "0" + sec : sec;
                console.log(hour);
                document.querySelector(".hour_num").innerText = hour;
                document.querySelector(".min_num").innerText = min;
                document.querySelector(".sec_num").innerText = sec;
            document.querySelector(".am_pm").innerText = d;
        }, 1000)
      </script>
    </center>



    <?php
    if (isset($_POST['emp_id'])) {
        $emp_id = addslashes($_POST['emp_id']);

        $checkregister = $conn -> query("SELECT *  FROM employees WHERE emp_id = '$emp_id'") or die($conn -> error);
        $countregister = $checkregister -> num_rows;

        if ($countregister == 0) {
                            ?>
                                <script type="text/javascript">
                                    swal({
                                      title: "Ooops!",
                                      text: "<?php echo 'Your Fingerprint is not yet registered!'; ?>",
                                      type: "warning",
                                      timer: 1500,
                                      showConfirmButton: false,
                                      html: true,
                                    });
                                </script>
                            <?php
            // echo '<script>alert("Fingerprint NOT REGISTERED!");</script>';
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

            //echo '<script>alert("Attendance Success!");</script>';
                            ?>
                                <script type="text/javascript">
                                    swal({
                                      title: "Success!",
                                      text: "<?php echo 'Your attendance was saved!'; ?>",
                                      type: "success",
                                      timer: 1500,
                                      showConfirmButton: false,
                                      html:true,
                                    });
                                </script>
                            <?php
        }
    }

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {


    ?>

</body>

</html>

<?php 
}else{
      // header("Location: index.php");
      // exit();
}
 ?>