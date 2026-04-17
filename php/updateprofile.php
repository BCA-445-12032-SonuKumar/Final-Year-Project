<?php
    include("dbconnection.php");
    session_start();
    if(!isset($_SESSION['user'])){
        header("location:../RequestUser/logindesign.php");
    }
    else{
        $useremail = $_SESSION['user'];
        $name = $_POST['name'];
        $sql="UPDATE requesterlogin_tb SET r_name='$name' WHERE r_email='$useremail'";
        if($con->query($sql)===TRUE){
            echo "success";
        }
        else{
            echo "failed";
        }
    }
?>