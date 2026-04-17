<?php 
    define('PAGE','Technician');
    define('TITLE','Add Technician');
    include("../php/dbconnection.php");
    include("Includes/header.php");
    session_start();
    if(!isset($_SESSION['admin']))
    {
        header("Location: adminlogindesign.php");
    }
?>
<!--2nd column start-->
    <div class="col-md-6">
        <p class="text-center fs-2">Add Technician</p>
            <form action="" method="POST" class="mx-5 shadow-lg p-4 addtech_form">
                <div class="mb-3">
                    <label for="tname" class="form-label">Name</label>
                    <input type="text" class="form-control" id="tname" name="tname" required="required">
                </div>
                <div class="mb-3">
                    <label for="temail" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="temail" name="temail" aria-describedby="emailHelp" required="required">
                </div>
                <div class="mb-3">
                    <label for="tmobile" class="form-label">Mobile</label>
                    <input type="text" class="form-control" id="tmobile" name="tmobile" required="required">
                </div>
                 <div class="mb-3">
                    <label for="tcity" class="form-label">City</label>
                    <input type="text" class="form-control" id="tcity" name="tcity" required="required">
                </div>
                <button type="submit" class="btn btn-primary" name="addtech_btn">Add</button>
                <a href="technician.php" class="btn btn-secondary">Back</a>
                 <div class="msg mt-3"></div>
            </form>
            
    </div>
<!--2nd column end-->
<!-- Insert Technician into Database using ajax start-->
 <script>
    $(document).ready(function(){
        $(".addtech_form").submit(function(e){
            e.preventDefault();
            $.ajax({
                method:"POST",
                url:"../php/insertTechnician.php",
                data:{
                    name:$("#tname").val(),
                    email:$("#temail").val(),
                    mobile:$("#tmobile").val(),
                    city:$("#tcity").val()
                },
                beforeSend:function(){
                    $("button[name='addtech_btn']").text("Please wait...");
                    $("button[name='addtech_btn']").attr("disabled","disabled");
                },
                success:function(response){
                    $("button[name='addtech_btn']").text("Add");
                    $("button[name='addtech_btn']").removeAttr("disabled");
                    if(response.trim()=="success"){
                            var p=document.createElement("P");
                            p.className="alert alert-success";
                            p.innerHTML="Technician added successfully ! <i class='fa-solid fa-circle-check text-success m-1 fs-4'></i>";
                            $(".msg").append(p);
                            $('html, body').animate({scrollTop:$(document).height()},800);
                            setTimeout(()=>{
                                $(".msg").text("");
                            },3000);
                    }
                    else if(response.trim()=="required"){
                            var p=document.createElement("P");
                            p.className="alert alert-danger";
                            p.innerHTML="All fields are required ! <i class='fa-solid fa-circle-exclamation text-danger'></i>";
                            $(".msg").append(p);
                            $('html, body').animate({scrollTop:$(document).height()},800);
                            setTimeout(()=>{
                                $(".msg").text("");
                            },3000);
                    }
                    else if(response.trim()=="exists"){
                            var p=document.createElement("P");
                            p.className="alert alert-warning";
                            p.innerHTML="Email already exists !";
                            $(".msg").append(p);
                            $('html, body').animate({scrollTop:$(document).height()},800);
                            setTimeout(()=>{
                                $(".msg").text("");
                            },3000);
                    }
                    else{
                            var p=document.createElement("P");
                            p.className="alert alert-danger";
                            p.innerHTML="Failed to add Technician !";
                            $(".msg").append(p);
                            $('html, body').animate({scrollTop:$(document).height()},800);
                            setTimeout(()=>{
                                $(".msg").text("");
                            },3000);
                    }
                }
            });
        });
    });
 </script>
 <!-- Insert Technician into Database using ajax end-->
<?php
    include("Includes/footer.php");
?>