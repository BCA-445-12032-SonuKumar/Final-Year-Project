<?php 
     define('PAGE','Asset');
     define('TITLE','Add Asset');
    include("../php/dbconnection.php");
    include("Includes/header.php");
    session_start();
    if(!isset($_SESSION['admin'])){
        header("Location:adminlogindesign.php");
    }
?>
<!-- Start 2nd Column -->
 <div class="col-md-7">
    <p class="text-center text-primary fs-3">Add New Asset</p>
    <form action="" method="POST" class="mx-5 shadow-lg p-4 addasset_form">
    <div class="mb-3">
        <label for="prodname" class="form-label">Product Name</label>
        <input type="text" class="form-control" id="prodname" name="prodname" required>
    </div>
    <div class="mb-3">
        <label for="dop" class="form-label">Date of Purchase</label>
        <input type="date" class="form-control" id="dop" name="dop" required>
    </div>
     <div class="mb-3">
        <label for="pava" class="form-label">Available</label>
        <input type="number" class="form-control" id="pava" name="pava" required onkeyPress="isInputNumber(event)">
    </div>
     <div class="mb-3">
        <label for="ptotal" class="form-label">Total</label>
        <input type="number" class="form-control" id="ptotal" name="ptotal" required onkeyPress="isInputNumber(event)">
    </div>
     <div class="mb-3">
        <label for="pori_cost" class="form-label">Original Cost Each</label>
        <input type="number" class="form-control" id="pori_cost" name="pori_cost" required onkeyPress="isInputNumber(event)">
    </div>
     <div class="mb-3">
        <label for="pselling_cost" class="form-label">Selling Price Each</label>
        <input type="number" class="form-control" id="pselling_cost" name="pselling_cost" required onkeyPress="isInputNumber(event)">
    </div>
    <button type="submit" class="btn btn-primary" id="addasset_btn">Add</button>
    <button type="reset" class="btn btn-success">Reset</button>
    <a href="asset.php" class="btn btn-secondary">Back</a>
    <div class="msg mt-3"></div>
    </form>
 </div>
 <!-- end 2nd Column -->
  <!--add asset to database using ajax start-->
 <script>
    function isInputNumber(evt){
        var ch = String.fromCharCode(evt.which);
        if(!(/[0-9]/.test(ch))){
            evt.preventDefault();
        }
    }
    $(document).ready(function(){
        $(".addasset_form").submit(function(e){
            e.preventDefault();
            $.ajax({
                method:"POST",
                url:"../php/addassetIndb.php",
                data:{
                    prodname:$("#prodname").val(),
                    dop:$("#dop").val(),
                    pava:$("#pava").val(),
                    ptotal:$("#ptotal").val(),
                    pori_cost:$("#pori_cost").val(),
                    pselling_cost:$("#pselling_cost").val()
                },
                beforeSend:function(){
                    $("button[name='addasset_btn']").text("Please wait...");
                    $("button[name='addasset_btn']").attr("disabled","disabled");
                },
                success:function(response){
                    $("button[name='addasset_btn']").text("Add");
                    $("button[name='addasset_btn']").removeAttr("disabled");
                    if(response.trim()=="success"){
                            var p=document.createElement("P");
                            p.className="alert alert-success";
                            p.innerHTML="Asset added successfully ! <i class='fa-solid fa-circle-check text-success m-1 fs-4'></i>";
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
                    else{
                            var p=document.createElement("P");
                            p.className="alert alert-danger";
                            p.innerHTML="Failed to add Asset !";
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
  <!--add asset to database using ajax end-->
<?php
    include("Includes/footer.php");
?>