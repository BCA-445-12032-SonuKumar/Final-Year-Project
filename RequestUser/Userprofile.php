<?php
    define('TITLE', 'User Profile');
    define('PAGE', 'UserProfile');
    include("../php/dbconnection.php");
    session_start();
    if(!isset($_SESSION['user'])){
        header("location: logindesign.php");
    }
    else
    {
        $useremail = $_SESSION['user'];
        $sql="SELECT * FROM requesterlogin_tb WHERE r_email='$useremail'";
        $rs=$con->query($sql);
        $row=$rs->fetch_assoc();
        $username=$row['r_name'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE; ?></title>
    <!-- bootstrap css link -->
     <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- font awesome link -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <!-- custom css link -->
    <link rel="stylesheet" href="../css/style.css">
    <style>
    </style>
</head>
<body>
    <!-- nav bar coding start -->
     <nav class="navbar navbar-expand-sm navbar-dark bg-dark p-2 fixed-top">
        <a class="navbar-brand " href="">
            <img width="35" height="35" src="../images/wrench.webp" alt="logo" >&nbsp;&nbsp;ServiceHub
        </a>
        <span class="navbar-text">
            <i class="fa-solid fa-circle-check text-success m-1"></i>100% Service Guarantee !</span>
        </nav>
    <!-- nav bar coding end -->
     
      <div class="container-fluid  mt-5">
        <div class="row sidebar-row">
            <!-- sidebar coding start -->
            <!-- first column start --> 
            <nav class="col-sm-2 bg-light sidebar py-5">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column nav-pills">
                    <li class="nav-item ">
                    <a class="nav-link <?php if(PAGE == 'UserProfile') echo 'active'; ?>" href="Userprofile.php">
                     <i class="fa fa-user  m-1"></i>My Profile</a>
                    </li>
                     <li class="nav-item">
                    <a class="nav-link " href="submitReq.php">
                     <i class="fa-brands fa-accessible-icon m-1"></i>Submit Request</a>
                    </li>
                     <li class="nav-item">
                    <a class="nav-link " href="status.php">
                    <i class="fa-solid fa-road m-1"></i>Service Status</a>
                    </li>
                     <li class="nav-item">
                    <a class="nav-link " href="changepass.php">
                    <i class="fa-solid fa-key m-1"></i> Change Password</a>
                    </li>
                     <li class="nav-item">
                    <a class="nav-link " href="../php/logout.php">
                     <i class="fa-solid fa-right-from-bracket m-1"></i>Log out</a>
                    </li>
                    </ul>
                </div>
            </nav>
            <!-- first column end -->
             <!-- sidebar coding end -->
              <!-- second column start -->
              <div class="col-sm-6 mt-5">
                <h1 class="editProfile text-dark text-center fs-4"><i class="fa-solid fa-pen-to-square m-1"></i>Edit Profile</h1>
                <form class="mx-5 shadow-lg p-4 edituser_form" action="" method="post">
                    <div class="mb-3">
                        <label for="uemail" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="uemail" aria-describedby="emailHelp" disabled readonly="readonly" value="<?php echo $useremail; ?>" required="required">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="uname" class="form-label">Name</label>
                        <input type="text" class="form-control" id="uname" value="<?php echo $username; ?>" required="required">
                    </div>
                    <button type="submit" class="btn btn-primary" id="update_btn">Update</button>
                    <div class="msg mt-3"></div>
                </form>
              </div>
               <!-- second column end -->
        </div>
      </div>
      <!-- sidebar coding end -->
       <!-- javascript links -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>   
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script>
        //edit profile ajax start
        $(".edituser_form").submit(function(e){
      e.preventDefault();
      $.ajax({
        method:"POST",
        url:"../php/updateprofile.php",
        data:{
            name:$("#uname").val()
        },
        beforeSend:function(){
          $("#update_btn").text("Please wait...");
          $("#update_btn").attr("disabled","disabled");
        },
        success:function(response){
          $("#update_btn").text("Update");
          $("#update_btn").removeAttr("disabled");
          if(response.trim()=="success")
          {
            var p=document.createElement("P");
            p.className="alert alert-success";
            p.innerHTML="Name Updated successfully ! <i class='fa-solid fa-circle-check text-success m-1 fs-4'></i>";
            $(".msg").append(p);
            setTimeout(()=>{
              $(".msg").text("");
            },3000);
          }
          else{
              var p=document.createElement("P");
              p.className="alert alert-danger";
              p.innerHTML="Updation failed! Please try again. <i class='fa-solid fa-circle-exclamation text-danger m-1 fs-4'></i>";
              $(".msg").append(p);
                setTimeout(()=>{
              $(".msg").text("");
            },3000);
          }
        }
      })
    })
    //edit profile ajax end
    </script>
</body>
</html>