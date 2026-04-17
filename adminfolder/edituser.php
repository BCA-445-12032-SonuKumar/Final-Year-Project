<?php 
    define('PAGE','Users');
    define('TITLE','Edit User');
    include("../php/dbconnection.php");
    include("Includes/header.php");
    session_start();
    if(!isset($_SESSION['admin'])){
        header("Location: adminlogindesign.php");
    }
?>
<!-- Start 2nd Column -->
 <div class="col-sm-6">
                <h1 class="editProfile text-dark text-center fs-4"><i class="fa-solid fa-pen-to-square m-1"></i>Update User Details</h1>
                <?php
                if(isset($_POST['edit'])){
                    $sql = "SELECT * FROM requesterlogin_tb WHERE r_login_id = {$_POST['id']}";
                    $result = $con->query($sql);
                    $row= $result->fetch_assoc();
                }
                ?>
                <form class="mx-5 shadow-lg p-4 edituser_form" action="" method="post">
                    <div class="mb-3">
                        <label for="uemail" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="uemail" aria-describedby="emailHelp" readonly="readonly" value="<?php echo $row['r_email']; ?>" required="required">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="u_id" class="form-label">User ID</label>
                        <input type="text" class="form-control" id="u_id" value="<?php echo $row['r_login_id']; ?>" required="required" readonly="readonly">
                    </div>
                    <div class="mb-3">
                        <label for="uname" class="form-label">Name</label>
                        <input type="text" class="form-control" id="uname" value="<?php echo $row['r_name']; ?>" required="required">
                    </div>
                    <button type="submit" class="btn btn-primary" id="update_btn">Update</button>
                    <a href="user.php" class="btn btn-secondary">Back</a>
                    <div class="msg mt-3"></div>
                </form>
    </div>
 <!-- 2nd  Column end-->
  <script>
      //edit profile ajax start
      $(".edituser_form").submit(function(e){
      e.preventDefault();
      $.ajax({
        method:"POST",
        url:"../php/updateUserByAdmin.php",
        data:{
            name:$("#uname").val(),
            user_id:$("#u_id").val()
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
<?php
    include("Includes/footer.php");
?>