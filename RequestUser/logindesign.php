<?php
session_start();
if(isset($_SESSION['user']))
{
    header("Location: Userprofile.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- bootstrap css link -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <!-- animatation library link -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="container-fluid login_con">
  <div class="row justify-content-center align-items-center">
    <div class="col-sm-6 col-md-4 p-4 mt-5">
      <form class="bg-white p-4  rounded login_form animate__animated animate__flipInY" autocomplete="off">
        <h1 class="text-center login_heading text-info fs-3">Login ServiceHub</h1>
        <p class="text-center text-secondary">All Services. One Hub</p>
        <div class="mb-3 email_con">
        <i class="fa-solid fa-envelope m-1"></i><label for="email" class="form-label">Email</label>
        <input type="email" id="email" class="form-control" required="required">
        </div>
         <div class="mb-3 pass_box">
        <i class="fa-solid fa-lock m-1"></i><label for="password" class="form-label">Password</label>
        <input type="password" id="password" class="form-control" required="required">
        <i class="fa-solid fa-eye" id="eye_symbol"></i>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary w-50" id="login_btn">Login</button>
        </div>
        <div class="msg mt-3"></div>
      </form>
      <div class="text-center mt-3">
        <a href="../index.php" class="btn btn-outline-danger">Back to Home</a>
      </div>
    </div>
  </div>
</div>
    <!-- javascript links -->
     <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/popper.min.js"></script>
<script>
    //login now coding
    $(document).ready(function(){
        $(".login_form").submit(function(e){
            e.preventDefault();
            $.ajax({
                method:"POST",
                url:"../php/login.php",
                data:{
                  email:$("#email").val(),
                  pswd:$("#password").val()
                },
                beforeSend:function()
                {
                  $("#login_btn").text("Please wait...");
                   $("#login_btn").attr("disabled","disabled");
                },
                success:function(response){
                   $("#login_btn").text("Login");
                   $("#login_btn").removeAttr("disabled");
                   if(response.trim()=="success")
                   {
                       window.location="Userprofile.php";
                   }
                  else if(response.trim()=="notfound")
                   {
                        var p=document.createElement("P");
                        p.className="alert alert-warning";
                        p.innerText="Email is not registered!";
                        $(".msg").append(p);
                        setTimeout(()=>{
                        $(".msg").text("");
                         $(".login_form").trigger('reset');
                      },3000);
                   }
                   else if(response.trim()=="wrong")
                    {
                       var p=document.createElement("P");
                        p.className="alert alert-danger";
                        p.innerText="Wrong password!";
                        $(".msg").append(p);
                        setTimeout(()=>{
                        $(".msg").text("");
                      },3000);
                    }
                }
            })
        })
        //login now coding end
        //hide and show password in login start
        $("#eye_symbol").click(function(){ 
      if($("#password").attr("type")=="password")
      {
        $("#password").attr("type","text");
        $(this).css({color:"black"});

      }
      else{
          $("#password").attr("type","password");
           $(this).css({color:"#ddd"});
        }
    })
        //hide show password coding in login end
     
    })
</script>
</body>
</html>