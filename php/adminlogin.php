<?php
    session_start();
    require("dbconnection.php");
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        $email=$_POST['email'];
        $pass=$_POST['pswd'];
        $check_admin="select * from adminlogin_tb where a_email='$email'";
        $result=$con->query($check_admin);
        if($result->num_rows>0)
        {
            $check_pass="select * from adminlogin_tb where a_email='$email' && a_password='$pass'";
            $rs=$con->query($check_pass);
            if($rs->num_rows>0)
            {
                    $_SESSION['admin']=$email;
                    echo "success";
            }
            else{
                echo "wrong";
            }
        }
        else{
            echo "notfound";
        }

    }
    else{
        echo "unauthorised user.";
    }

?>