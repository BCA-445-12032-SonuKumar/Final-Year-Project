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
        <div class="row sidebar-row pt-5">
            <!-- sidebar coding start -->
            <!-- first column start --> 
            <nav class=" col-md-2 bg-light sidebar d-print-none">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column nav-pills">
                    <li class="nav-item ">
                    <a class="nav-link <?php if(PAGE == 'Dashboard') echo 'active'; ?>" href="admindashboard.php">
                     <i class="fa-solid fa-gauge"></i> Dashboard</a>
                    </li>
                     <li class="nav-item">
                    <a class="nav-link <?php if(PAGE == 'Work Order') echo 'active'; ?>" href="workorder.php">
                     <i class="fa-brands fa-accessible-icon m-1"></i> Work Order</a>
                    </li>
                     <li class="nav-item">
                    <a class="nav-link <?php if(PAGE == 'Request') echo 'active'; ?>" href="request.php">
                   <i class="fa-solid fa-code-pull-request"></i> Requests</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link <?php if(PAGE == 'Asset') echo 'active'; ?>" href="asset.php">
                    <i class="fa-solid fa-road m-1"></i >Asset</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link <?php if(PAGE == 'Technician') echo 'active'; ?>" href="technician.php">
                   <i class="fa-solid fa-wrench"></i> Technician</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link <?php if(PAGE == 'Users') echo 'active'; ?>" href="user.php">
                    <i class="fa-solid fa-users"></i> Users</a>
                    </li>
                     </li>
                    <li class="nav-item">
                    <a class="nav-link <?php if(PAGE == 'Work Report') echo 'active'; ?>" href="workreport.php">
                    <i class="fa-solid fa-table"></i> Work Report</a>
                    </li>
                     </li>
                    <li class="nav-item">
                    <a class="nav-link <?php if(PAGE == 'Sell Report') echo 'active'; ?>" href="sellreport.php">
                    <i class="fa-solid fa-table"></i> Sell Report</a>
                    </li>
                     <li class="nav-item">
                    <a class="nav-link <?php if(PAGE == 'Change Password') echo 'active'; ?>" href="changepass.php">
                    <i class="fa-solid fa-key m-1"></i>Change Password</a>
                    </li>
                     <li class="nav-item">
                    <a class="nav-link " href="adminlogout.php">
                     <i class="fa-solid fa-right-from-bracket m-1"></i>Log out</a>
                    </li>
                    </ul>
                </div>
            </nav>
            <!-- first column end -->
             <!-- sidebar coding end -->