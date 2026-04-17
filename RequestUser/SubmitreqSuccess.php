<?php
    define('TITLE', 'Success');
    include("../php/dbconnection.php");
    session_start();
    if(!isset($_SESSION['user'])){
        header("location: logindesign.php");
    }
    else{
         $reqid=$_SESSION['myid'];
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
                    <a class="nav-link" href="Userprofile.php">
                     <i class="fa fa-user  m-1"></i>My Profile</a>
                    </li>
                     <li class="nav-item">
                    <a class="nav-link " href="submitReq.php">
                     <i class="fa-brands fa-accessible-icon m-1"></i>Submit Request</a>
                    </li>
                     <li class="nav-item">
                    <a class="nav-link " href="status.php">
                    <i class="fa-solid fa-road m-1"></i>Service Status</a>
                    </li>
                     <li class="nav-item">
                    <a class="nav-link " href="changepass.php">
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
                <!-- second column start -->
                 <div class="col-md-6 mt-5 ">
                    <?php
                        $sql="SELECT *  FROM submitrequest_tb WHERE request_id='$reqid'";
                        $rs=$con->query($sql);
                        if($rs->num_rows > 0){
                            $row=$rs->fetch_assoc();
                        echo " <table class='table'>
                        <tbody>
                        <tr>
                        <th>Request ID</th>
                        <td>".$row['request_id']."</td>
                        </tr>
                        <tr>
                        <th>Name</th>
                        <td>".$row['requester_name']."</td>
                            </tr>
                            <tr>
                            <th>Email</th>
                            <td>".$row['requester_email']."</td>
                            </tr>
                            <tr>   
                            <th>Request Info</th>
                            <td>".$row['request_info']."</td>
                            </tr>
                            <tr>
                            <th>Request Description</th>
                            <td>".$row['request_desc']."</td>
                            </tr>
                            <tr>
                            <td><form class='d-print-none'><input class='btn btn-danger' type='submit' value='Print' onClick='window.print()'></form></td>
                            </tr>
                            </tbody>
                            </table>
                            </div>";
                        }
                        else{
                            echo "failed";
                        }
    
                    ?>

                </div>
                 <!-- second column end -->
         </div>
      </div>
       <!-- javascript links --> 
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/popper.min.js"></script>
</body>
</html>