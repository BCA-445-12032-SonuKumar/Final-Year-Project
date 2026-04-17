<?php
include("dbconnection.php");
session_start();
if(!isset($_SESSION['admin'])){
    header("Location:../adminfolder/adminlogindesign.php");
}
else{
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(empty($_POST['pid']) || empty($_POST['pname']) || empty($_POST['pdop']) || empty($_POST['pava']) || empty($_POST['ptotal']) || empty($_POST['poriginalcost']) || empty($_POST['psellingcost'])){
            echo "required";
        }
        else{
        $pid = $_POST['pid'];
        $pname = $_POST['pname'];
        $pdop = $_POST['pdop'];
        $pava = $_POST['pava'];
        $ptotal = $_POST['ptotal'];
        $poriginalcost = $_POST['poriginalcost'];
        $psellingcost = $_POST['psellingcost'];
        $sql = "UPDATE assets_tb SET pname='$pname', pdop='$pdop', pava='$pava', ptotal='$ptotal', poriginalcost='$poriginalcost', psellingcost='$psellingcost' WHERE pid='$pid'";
        if($con->query($sql)==TRUE){
            echo "success";
        }
        else{
            echo "Failed";
        }
    }
}
 else{
        echo "Unauthorized";
    }
}
?>