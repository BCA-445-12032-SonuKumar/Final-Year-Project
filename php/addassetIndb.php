<?php
include("dbconnection.php");
session_start();
if(!isset($_SESSION['admin'])){
    header("Location:../adminfolder/adminlogindesign.php");
}
else{
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(empty($_POST['prodname']) || empty($_POST['dop']) || empty($_POST['pava']) || empty($_POST['ptotal']) || empty($_POST['pori_cost']) || empty($_POST['pselling_cost'])){
            echo "required";
        }
        else{
        $prodname = $_POST['prodname'];
        $dop = $_POST['dop'];
        $pava = $_POST['pava'];
        $ptotal = $_POST['ptotal'];
        $pori_cost = $_POST['pori_cost'];
        $pselling_cost = $_POST['pselling_cost'];
        $sql = "INSERT INTO assets_tb(pname,pdop,pava,ptotal,poriginalcost,psellingcost) VALUES('$prodname','$dop','$pava','$ptotal','$pori_cost','$pselling_cost')";
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