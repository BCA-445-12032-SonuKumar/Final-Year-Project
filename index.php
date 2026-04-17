<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ServiceHub</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <!-- Font Awesome CSS -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />
     <!-- google fonts -->
      <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
      <!-- animatation library link -->
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
  />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css" >
</head>
<body>
    <!-- nav coding start -->
     <nav class="navbar navbar-expand-sm navbar-dark bg-dark p-2 fixed-top">
        <a class="navbar-brand " href="">
            <img width="35" height="35" src="images/wrench.webp" alt="logo" >&nbsp;&nbsp;ServiceHub
        </a>
        <span class="navbar-text">Customers' satisfation is our Priority !</span>
     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#Mymenubar" >
         <span class="navbar-toggler-icon"></span>
    </button>
     <div class="collapse navbar-collapse " id="Mymenubar">
      <ul class="navbar-nav custom-nav ms-auto"> ">
        <li class="nav-item">
          <a class="nav-link active" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#services_section">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="RequestUser/logindesign.php">Login</a>
        </li>
          <li class="nav-item">
          <a class="nav-link" href="#contact_section">Contact Us</a>
        </li>
      </ul>
    </div>

     </nav>
    <!-- nav coding end -->
     <!-- header coding start -->
    <header class="head " style="background-image: url('images/standingtech.png');">
      <div class="p-5 welcome">
        <h1 class="text-white fw-bold animate__animated animate__zoomIn animate__infinite	infinite animate__slow	2s">Welcome to ServiceHub</h1>
        <p style="color:#F8F9FA" class="fst-italic fs-5">Your one-stop solution for reliable home services</p>
        <a href="#register_section" class="btn btn-success btn-lg">Sign Up</a>
        <a href="RequestUser/logindesign.php" class="btn btn-primary btn-lg">Login</a>
      </div>
    </header>
    <!-- header coding end -->
    <!-- About osms coding start -->
     <div class="container  mt-4" >
       <h1 class="text-center text-danger fs-1 offer_heading">What We Offer</h1>
      <div class="row bg-light p-4 mb-5 rounded-3">
        <div class="col-xm-12">
        <p class=" text-justify-custom fs-6 text-secondary" style="font-family: sans-serif;">
          At ServiceHub, we pride ourselves on delivering top-notch home services that cater to your every need. Whether you're looking for expert plumbing, reliable electrical work, efficient cleaning services, or skilled handyman solutions, we've got you covered. Our team of certified professionals is dedicated to providing exceptional service with a focus on quality, reliability, and customer satisfaction. With ServiceHub, you can rest easy knowing that your home is in the hands of trusted experts who are committed to making your life easier and more comfortable.
        </p>
        </div>
      </div>
     </div>
    <!-- About osms coding end -->
     <!-- our services coding start -->
  <div class="container-fluid bg-light mb-5 p-3" id="services_section">
    <h1 class="text-center services_heading fs-1 text-secondary">Our Services</h1>
   <div class="row mt-5 rowfont text-center">
     <div class="col-sm-4">
      <a href="#"><i class="fa-solid fa-tv fa-8x text-warning"></i></a>
      <h3 class="mt-4 fs-4">Electronic Appliances<br>Repairing</h3>
    </div> 

     <div class="col-sm-4">
      <a href="#"><i class="fa-solid fa-sliders fa-8x text-success"></i></a>
       <h3 class="mt-4 fs-4">Periodic Maintenance</h3>
    </div> 

     <div class="col-sm-4 ">
      <a href="#"><i class="fa-solid fa-screwdriver-wrench fa-8x text-danger"></i></a>
      <h3 class="mt-4 fs-4">Fault Repair</h3>
    </div> 
   </div>
  </div>
     <!-- our services coding end -->
      <!-- sign up coding start -->
      <div class="container-fluid  mb-4" id="register_section">
  <div class="row ">
    <div class="col-md-3"></div>
    <div class="col-md-6">
       <h1 class="text-center signup_heading">Create Your account</h1>
        <p class="text-center text-secondary">Join ServiceHub to book trusted home services</p>
      <form class="bg-white p-4 rounded-4 signup_form" autocomplete="off" method="POST">
       
        <div class="mb-3">
        <i class="fa-solid fa-user m-1"></i><label for="username" class="form-label">Full Name</label>
        <input type="text" id="username" class="form-control" required="required" name="uname">
        </div>

         <div class="mb-3 pass_box">
       <i class="fa-solid fa-envelope m-1"></i><label for="user_email" class="form-label">Email</label>
        <input type="email" id="user_email" class="form-control" required="required" name="uemail">
        </div>

        <div class="mb-3 mob_con">
        <i class="fa-solid fa-phone m-1"></i><label for="mob_num" class="form-label">Mobile Number</label>
        <input type="number" id="mob_num" class="form-control" required="required" name="umob" maxlength="10" minlength="10">
        </div>

         <div class="mb-3 pass_box">
        <i class="fa-solid fa-key m-1"></i><label for="password" class="form-label">Password</label>
        <input type="password" id="password" class="form-control" required="required" name="upass">
        <i class="fa-solid fa-eye" id="eye_symbol"></i>
        </div>

        <div class="text-center">
          <button type="submit" class="btn btn-success col-6 mx-auto mt-3"  id="register_btn" name="reg_btn">Register</button>
        </div>
        <!-- message div -->
        <div class="msg mt-3"></div>
      </form>
      </div>
       <div class="col-md-3"></div>
  </div>
</div>
      <!-- sign up coding end -->
       <!-- Customers' testimonial coding start -->
  <div class="container-fluid bg-warning p-5 mb-3 ">
    <h1 class="text-center testimonial_heading fs-1 animate__animated animate__flipInX  animate__infinite	infinite animate__slow	2s text-dark">Customers' Testimonials</h1>
    <div class="row mt-3">
  <div class="col-sm-3 mb-3">
    <div class="card">
      <img src="images/women.jpg" class="card-img-top img-thumbnail" alt="woman image">
      <div class="card-body">
        <h5 class="card-title">Olivia</h5>
        <p class="card-text">
          Excellent service! They fixed my refrigerator quickly and professionally. Highly recommend ServiceHub!
        </p>
      </div>
    </div>
  </div>
  <div class="col-sm-3 mb-3">
    <div class="card">
      <img src="images/men.jpg" class="card-img-top img-thumbnail" alt="woman image">
      <div class="card-body">
        <h5 class="card-title">Mario Leo</h5>
        <p class="card-text">
          The electrician from ServiceHub was punctual and knowledgeable. My home's wiring is now safe and efficient. Thank you!
        </p>
      </div>
    </div>
  </div>
   <div class="col-sm-3 mb-3">
    <div class="card">
      <img src="images/women2.jpg" class="card-img-top img-thumbnail" alt="men image">
      <div class="card-body">
        <h5 class="card-title">Rosie</h5>
        <p class="card-text">
          I booked a cleaning service through ServiceHub, and they did an amazing job. My house has never looked better!
        </p>
      </div>
    </div>
  </div>
   <div class="col-sm-3">
    <div class="card">
      <img src="images/men2.jpg" class="card-img-top img-thumbnail" alt="men image">
      <div class="card-body">
        <h5 class="card-title">Jhon</h5>
        <p class="card-text">
          The handyman service was fantastic! They repaired my leaking faucet quickly and at a great price.
        </p>
      </div>
    </div>
  </div>
</div>
  </div>
  <!-- Customers' testimonial coding end -->
   <!-- Contact us coding start -->
    <?php require("php/contact.php"); ?>
   <!-- Contact us coding end -->
       <!-- footer coding start -->
        <div class="container-fluid bg-dark">
       <div class="row">
         <footer class=" text-white text-center p-3">
          <p  class="mb-0">© 2024 ServiceHub. All rights reserved | Designed by ServiceHub Team</p>
          <small><a href="adminfolder/adminlogindesign.php" class="text-white">Admin Login</a></small>
        </footer>
       </div>
        </div>
       <!-- footer coding end -->
      
     <!-- javascript links-->
       <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
       <script src="js/popper.min.js"></script>
       <script src="js/bootstrap.min.js"></script>
       <script>
        //password show hide coding
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
    //password show hide coding end
     //register student coding
    $(".signup_form").submit(function(e){
      e.preventDefault();
      $.ajax({
        method:"POST",
        url:"php/userRegistrationfile.php",
        data:{
          username:$("#username").val(),
          mobile:$("#mob_num").val(),
          email:$("#user_email").val(),
          password:$("#password").val()
        },
        beforeSend:function(){
          $("#register_btn").text("Please wait...");
          $("#register_btn").attr("disabled","disabled");
        },
        success:function(response){
          $("#register_btn").text("Register");
          $("#register_btn").removeAttr("disabled");
          if(response.trim()=="success")
          {
            var p=document.createElement("P");
            p.className="alert alert-success";
            p.innerText="Registered successfully!";
            $(".msg").append(p);
            setTimeout(()=>{
              $(".msg").text("");
              window.location="RequestUser/logindesign.php";
            },3000);
          }
          else if(response.trim()=="usermatch")
          {
              var p=document.createElement("P");
              p.className="alert alert-warning";
              p.innerText="User already exits!";
              $(".msg").append(p);
              setTimeout(()=>{
              $(".msg").text("");
              $(".signup_form").trigger('reset');
            },3000);
          }
          else{
              var p=document.createElement("P");
              p.className="alert alert-danger";
              p.innerText="Registration failed! Please try again.";
              $(".msg").append(p);
                setTimeout(()=>{
              $(".msg").text("");
              $(".signup_form").trigger('reset');
            },3000);
          }
        }
      })
    })
    //register student coding end
       </script>
</body>
</html>