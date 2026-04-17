<?php
    include("dbconnection.php");
    session_start();
    if(!isset($_SESSION['admin'])){
        header("location:../adminfolder/adminlogindesign.php");
    }
    else{
        $e_id = $_POST['emp_id'];
        $name = $_POST['name'];
        $city = $_POST['city'];
        $mobile = $_POST['mobile'];
        $sql="UPDATE technician_tb SET empName='$name', empCity='$city', empMobile='$mobile' WHERE empid='$e_id'";
        if($con->query($sql)===TRUE){
            echo "success";
        }
        else{
            echo "failed";
        }
    }
?>