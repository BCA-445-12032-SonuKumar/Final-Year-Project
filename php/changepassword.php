<?php
    include("dbconnection.php");
    session_start();
    if(!isset($_SESSION['user'])){
        header("location:../RequestUser/logindesign.php");
    }
    else{
        $useremail = $_SESSION['user'];
        $pass = md5($_POST['password']);
        $sql="UPDATE requesterlogin_tb SET r_password='$pass' WHERE r_email='$useremail'";
        if($con->query($sql)===TRUE){
            echo "success";
        }
        else{
            echo "failed";
        }
    }
?>