<?php
require("dbconnection.php");
  if($_SERVER['REQUEST_METHOD']=="POST")
    {
        $uname=$_POST['username'];
        $email=$_POST['email'];
        $pass=md5($_POST['password']);
        $mobile_num=$_POST['mobile'];
        $check="select r_email from requesterlogin_tb where r_email='$email'";
        $result=$con->query($check);
        if($result->num_rows>0)
        {
          echo "usermatch";
        }
        else{
               $insert_query="insert into requesterlogin_tb(r_name,r_email,r_password,r_mobile)values('$uname','$email','$pass','$mobile_num')";
                if($con->query($insert_query))
                {
                  echo "success";
                }
                else{
                  echo "failed";
                }
           }
        }
  else{
        echo "Unautorised request.";
    }  
?>

