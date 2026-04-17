<?php 
     define('PAGE','Asset');
     define('TITLE','Edit Asset');
    include("../php/dbconnection.php");
    include("Includes/header.php");
    session_start();
    if(!isset($_SESSION['admin'])){
        header("Location:adminlogindesign.php");
    }
?>
<!--2nd Column start-->
<div class="col-md-6">
                <h1 class=" text-dark text-center fs-4"><i class="fa-solid fa-pen-to-square m-1"></i>Update Asset Details</h1>
                <?php
                if(isset($_POST['edit'])){
                    $sql = "SELECT * FROM assets_tb WHERE pid = {$_POST['id']}";
                    $result = $con->query($sql);
                    $row= $result->fetch_assoc();
                }
                ?>
                <form class="mx-5 shadow-lg p-4 editasset_form" action="" method="post">
                    <div class="mb-3">
                        <label for="pid" class="form-label">Asset ID</label>
                        <input type="number" class="form-control" id="pid" value="<?php echo $row['pid']; ?>" required="required" readonly="readonly">
                    </div>
                    <div class="mb-3">
                        <label for="pname" class="form-label">Asset Name</label>
                        <input type="text" class="form-control" id="pname" value="<?php echo $row['pname']; ?>" required="required">
                    </div>
                    <div class="mb-3">
                        <label for="pdate" class="form-label">Date of Purchase</label>
                        <input type="date" class="form-control" id="pdate" value="<?php echo $row['pdop']; ?>" required="required">
                    </div>
                    <div class="mb-3">
                        <label for="pava" class="form-label">Available</label>
                        <input type="number" class="form-control" id="pava" value="<?php echo $row['pava']; ?>" required="required">
                    </div>
                    <div class="mb-3">
                        <label for="ptotal" class="form-label">Total</label>
                        <input type="number" class="form-control" id="ptotal" value="<?php echo $row['ptotal']; ?>" required="required">
                    </div>
                     <div class="mb-3">
                        <label for="poriginalcost" class="form-label">Cost Price</label>
                        <input type="number" class="form-control" id="poriginalcost" value="<?php echo $row['poriginalcost']; ?>" required="required">
                    </div>
                     <div class="mb-3">
                        <label for="psellingcost" class="form-label">Selling Price</label>
                        <input type="number" class="form-control" id="psellingcost" value="<?php echo $row['psellingcost']; ?>" required="required">
                    </div>
                    <button type="submit" class="btn btn-primary" id="update_btn">Update</button>
                    <a href="asset.php" class="btn btn-secondary">Back</a>
                    <div class="msg mt-3"></div>
                </form>
    </div>
 <!-- 2nd  Column end-->
  <script>
      //edit asset ajax start
      $(".editasset_form").submit(function(e){
      e.preventDefault();
      $.ajax({
        method:"POST",
        url:"../php/updateAssetByAdmin.php",
        data:{
            pid:$("#pid").val(),
            pname:$("#pname").val(),
            pdop:$("#pdate").val(),
            pava:$("#pava").val(),
            ptotal:$("#ptotal").val(),
            poriginalcost:$("#poriginalcost").val(),
            psellingcost:$("#psellingcost").val()
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
    //edit asset ajax end
    </script>

<!-- end 2nd Column -->
<?php
include("Includes/footer.php");
?>