<?php 
    define('PAGE','Technician');
    define('TITLE','Edit Technician');
    include("../php/dbconnection.php");
    include("Includes/header.php");
    session_start();
    if(!isset($_SESSION['admin'])){
        header("Location: adminlogindesign.php");
    }
?>
<!-- Start 2nd Column -->
 <div class="col-md-6">
                <h1 class="editProfile text-dark text-center fs-4"><i class="fa-solid fa-pen-to-square m-1"></i>Update Technician Details</h1>
                <?php
                if(isset($_POST['edit'])){
                    $sql = "SELECT * FROM technician_tb WHERE empid = {$_POST['id']}";
                    $result = $con->query($sql);
                    $row= $result->fetch_assoc();
                }
                ?>
                <form class="mx-5 shadow-lg p-4 edituser_form" action="" method="post">
                    <div class="mb-3">
                        <label for="e_id" class="form-label">Employee ID</label>
                        <input type="text" class="form-control" id="e_id" value="<?php echo $row['empid']; ?>" required="required" readonly="readonly">
                    </div>
                    <div class="mb-3">
                        <label for="e_email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="e_email" aria-describedby="emailHelp" readonly="readonly" value="<?php echo $row['empEmail']; ?>" required="required">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="e_name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="e_name" value="<?php echo $row['empName']; ?>" required="required">
                    </div>
                    <div class="mb-3">
                        <label for="e_city" class="form-label">City</label>
                        <input type="text" class="form-control" id="e_city" value="<?php echo $row['empCity']; ?>" required="required">
                    </div>
                    <div class="mb-3">
                        <label for="e_mobile" class="form-label">Mobile</label>
                        <input type="text" class="form-control" id="e_mobile" value="<?php echo $row['empMobile']; ?>" required="required">
                    </div>
                    <button type="submit" class="btn btn-primary" id="update_btn">Update</button>
                    <a href="technician.php" class="btn btn-secondary">Back</a>
                    <div class="msg mt-3"></div>
                </form>
    </div>
 <!-- 2nd  Column end-->
  <script>
      //edit technician ajax start
      $(".edituser_form").submit(function(e){
      e.preventDefault();
      $.ajax({
        method:"POST",
        url:"../php/updateTechnicianByAdmin.php",
        data:{
            name:$("#e_name").val(),
            city:$("#e_city").val(),
            mobile:$("#e_mobile").val(),
            emp_id:$("#e_id").val()
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
            p.innerHTML="Details Updated successfully ! <i class='fa-solid fa-circle-check text-success m-1 fs-4'></i>";
            $(".msg").append(p);
             $('html, body').animate({scrollTop:$(document).height()},800);
            setTimeout(()=>{
              $(".msg").text("");
            },3000);
          }
          else{
              var p=document.createElement("P");
              p.className="alert alert-danger";
              p.innerHTML="Updation failed! Please try again. <i class='fa-solid fa-circle-exclamation text-danger m-1 fs-4'></i>";
              $(".msg").append(p);
                $('html, body').animate({scrollTop:$(document).height()},800);
                setTimeout(()=>{
              $(".msg").text("");
            },3000);
          }
        }
      })
    })
    //edit technician ajax end
    </script>
<?php
    include("Includes/footer.php");
?>