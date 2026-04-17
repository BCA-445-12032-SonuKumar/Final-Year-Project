<?php
  include("dbconnection.php");
    if(isset($_SERVER['REQUEST_METHOD'])=="POST"){
        if($_POST['Requestid']=="" || $_POST['Requestinfo']=="" || $_POST['Requestdesc']=="" || $_POST['RequesterName']=="" || $_POST['Requesteradd1']=="" || $_POST['Requesteradd2']=="" || $_POST['RequesterCity']=="" || $_POST['RequesterState']=="" || $_POST['RequesterPin']=="" || $_POST['RequesterEmail']=="" || $_POST['RequesterMob']=="" || $_POST['technician']=="" || $_POST['RequesteDate']==""){
            echo "required";
        }
        else
        { 
            $rid=$_POST['Requestid'];
            $rinfo=$_POST['Requestinfo'];
            $rdesc=$_POST['Requestdesc'];
            $rname=$_POST['RequesterName'];
            $radd1=$_POST['Requesteradd1'];
            $radd2=$_POST['Requesteradd2'];
            $rcity=$_POST['RequesterCity'];
            $rstate=$_POST['RequesterState'];
            $rpin=$_POST['RequesterPin'];
            $remail=$_POST['RequesterEmail'];
            $rmob=$_POST['RequesterMob'];
            $rtech=$_POST['technician'];
            $rdate=$_POST['RequesteDate'];



            $sql="INSERT INTO assignwork_tb(request_id,request_info,request_desc,requester_name,requester_add1,requester_add2,requester_city,requester_state,requester_zip,requester_email,requester_mobile,assign_tech,assign_date) VALUES ('$rid','$rinfo','$rdesc','$rname','$radd1', '$radd2', '$rcity', '$rstate', '$rpin', '$remail', '$rmob','$rtech','$rdate')";
            if($con->query($sql)){
                echo "success";
            }
            else{
                echo "failed";
            }
         }      
}

?>   
