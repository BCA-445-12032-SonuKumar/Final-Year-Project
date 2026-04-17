<?php
    include("dbconnection.php");
    session_start();
    if(!isset($_SESSION['admin'])){
        header("location:../adminfolder/adminlogindesign.php");
    }
    else{
        $u_id = $_POST['user_id'];
        $name = $_POST['name'];
        $sql="UPDATE requesterlogin_tb SET r_name='$name' WHERE r_login_id='$u_id'";
        if($con->query($sql)===TRUE){
            echo "success";
        }
        else{
            echo "failed";
        }
    }
?>