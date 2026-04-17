<?php
    include("dbconnection.php");
    session_start();
    if(isset($_POST['RequestInfo'])){
        if($_POST['RequestInfo']=="" || $_POST['Requestdesc']=="" || $_POST['RequesterName']=="" || $_POST['Requesteradd1']=="" || $_POST['Requesteradd2']=="" || $_POST['RequesterCity']=="" || $_POST['RequesterState']=="" || $_POST['RequesterPin']=="" || $_POST['RequesterEmail']=="" || $_POST['RequesterMob']=="" || $_POST['RequestDate']==""){
            echo "required";
        }
        else
        { 
            $rinfo=$_POST['RequestInfo'];
            $rdesc=$_POST['Requestdesc'];
            $rname=$_POST['RequesterName'];
            $radd1=$_POST['Requesteradd1'];
            $radd2=$_POST['Requesteradd2'];
            $rcity=$_POST['RequesterCity'];
            $rstate=$_POST['RequesterState'];
            $rpin=$_POST['RequesterPin'];
            $remail=$_POST['RequesterEmail'];
            $rmob=$_POST['RequesterMob'];
            $rdate=$_POST['RequestDate'];

            $sql="INSERT INTO submitrequest_tb(request_info, request_desc, requester_name, requester_add1, requester_add2, requester_city, requester_state, requester_zip, requester_email, requester_mobile, request_date) VALUES ('$rinfo', '$rdesc', '$rname', '$radd1', '$radd2', '$rcity', '$rstate', '$rpin', '$remail', '$rmob', '$rdate')";
        if($con->query($sql)){
            $request_id=mysqli_insert_id($con);
            $_SESSION['myid']=$request_id;
            echo "success";
        }
        else{
            echo "failed";
        }
    }
        
}

?>