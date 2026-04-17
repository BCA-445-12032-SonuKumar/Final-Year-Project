<?php
    session_start();
    require("dbconnection.php");
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        $email=$_POST['email'];
        $pass=md5($_POST['pswd']);
        $check_user="select r_email from requesterlogin_tb where r_email='$email'";
        $result=$con->query($check_user);
        if($result->num_rows>0)
        {
            $check_pass="select * from requesterlogin_tb where r_email='$email' && r_password='$pass'";
            $rs=$con->query($check_pass);
            if($rs->num_rows>0)
            {
                    echo "success";
                    $_SESSION['user']=$email;
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