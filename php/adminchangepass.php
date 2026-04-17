<?php
    include("dbconnection.php");
    session_start();
    if(!isset($_SESSION['admin'])){
        header("location:../adminfolder/adminlogindesign.php");
    }
    else{
        $useremail = $_SESSION['admin'];
        $pass =$_POST['password'];
        $sql="UPDATE adminlogin_tb SET a_password='$pass' WHERE a_email='$useremail'";
        if($con->query($sql)===TRUE){
            echo "success";
        }
        else{
            echo "failed";
        }
    }
?>