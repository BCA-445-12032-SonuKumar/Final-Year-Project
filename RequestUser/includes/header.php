<?php
    include("../php/dbconnection.php");
    session_start();
    if(!isset($_SESSION['user'])){
        header("location: logindesign.php");
    }
    else{
        $useremail = $_SESSION['user'];
        $sql="SELECT r_email, r_name FROM requesterlogin_tb WHERE r_email='$useremail'";
        $rs=$con->query($sql);
        $row=$rs->fetch_assoc();
        $username=$row['r_name'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE; ?></title>
    <!-- bootstrap css link -->
     <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- font awesome link -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <!-- custom css link -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- jquery link -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>  
    <style>
    </style>
</head>
<body>
    <!-- nav bar coding start -->
     <nav class="navbar navbar-expand-sm navbar-dark bg-dark p-2 fixed-top d-print-none">
        <a class="navbar-brand " href="">
            <img width="35" height="35" src="../images/wrench.webp" alt="logo" >&nbsp;&nbsp;ServiceHub
        </a>
        <span class="navbar-text">
            <i class="fa-solid fa-circle-check text-success m-1"></i>100% Service Guarantee !</span>
        </nav>
    <!-- nav bar coding end -->
     
      <div class="container-fluid  mt-5">
        <div class="row sidebar-row">
            <!-- sidebar coding start -->
            <!-- first column start --> 
            <nav class="col-md-2 bg-light sidebar py-5 d-print-none">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column nav-pills">
                    <li class="nav-item ">
                    <a class="nav-link <?php if(PAGE == 'UserProfile') echo 'active'; ?>" href="Userprofile.php">
                     <i class="fa fa-user  m-1"></i>My Profile</a>
                    </li>
                     <li class="nav-item">
                    <a class="nav-link  <?php if(PAGE == 'SubmitRequest') echo 'active'; ?>" href="submitReq.php">
                     <i class="fa-brands fa-accessible-icon m-1"></i>Submit Request</a>
                    </li>
                     <li class="nav-item">
                    <a class="nav-link  <?php if(PAGE == 'TrackStatus') echo 'active'; ?>" href="status.php">
                    <i class="fa-solid fa-road m-1"></i>Service Status</a>
                    </li>
                     <li class="nav-item">
                    <a class="nav-link  <?php if(PAGE == 'ChangePass') echo 'active'; ?>" href="changepass.php">
                    <i class="fa-solid fa-key m-1"></i> Change Password</a>
                    </li>
                     <li class="nav-item">
                    <a class="nav-link " href="../php/logout.php">
                     <i class="fa-solid fa-right-from-bracket m-1"></i>Log out</a>
                    </li>
                    </ul>
                </div>
            </nav>
            <!-- first column end -->
             <!-- sidebar coding end -->