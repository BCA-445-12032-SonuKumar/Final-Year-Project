<?php
    include("dbconnection.php");
    session_start();
    if(!isset($_SESSION['admin'])){
        header("location:../adminfolder/adminlogindesign.php");
    }
    else{
        if(!isset($_POST['name']) || !isset($_POST['city']) || !isset($_POST['mobile']) || !isset($_POST['email'])){
            echo "required";
        }
        else{
            $email = $_POST['email'];
            $sql="SELECT * FROM technician_tb WHERE empEmail='$email'";
            $result = $con->query($sql);
            if($result->num_rows > 0){
                echo "exists";
            }
            else{
                 $email = $_POST['email'];
                $name = $_POST['name'];
                $city = $_POST['city'];
                $mobile = $_POST['mobile'];
                $sql="INSERT INTO technician_tb (empName, empCity, empMobile, empEmail) VALUES ('$name', '$city', '$mobile', '$email')";
                if($con->query($sql)===TRUE){
                    echo "success";
                }
                else{
                    echo "failed";
                }
            }
        }
        
    }
?>