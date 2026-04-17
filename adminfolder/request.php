<?php 
    session_start();
    if(isset($_SESSION['admin']))
        {
            $aEmail=$_SESSION['admin'];
        }
    else{
        header("Location:adminlogindesign.php");
    }
    define('PAGE','Request');
    define('TITLE','Request');
    include("../php/dbconnection.php");
    include("Includes/header.php");
?>
<!--second column starts here-->
<div class="col-md-4 mt-3">
    <?php
        $sql="select * from submitrequest_tb";
        $result=$con->query($sql);
        while($row=$result->fetch_assoc())
        {
            echo '<div class="card mb-3 mx-5">';
            echo '<div class="card-header bg-danger text-white">'.'Request Id: '.$row['request_id'].'</div>';
            echo '<div class="card-body">';
            echo '<h5 class="card-title fs-6">'.'Request Info: '.$row['request_info'].'</h5>';
            echo '<p class="card-text">'.'Request Description: '.$row['request_desc'].'</p>';
            echo '<p class="card-text">'.'Requested date: '.$row['request_date'].'</p>';
            echo '<div class="float-end">';
            echo '<form action="" method="post" >';
            echo '<input type="hidden" name="id" value='.$row['request_id'].'>';
            echo '<input type="submit" class="btn btn-success me-3" name="view" value="View" >';
            echo '<input type="submit" class="btn btn-secondary" name="close" value="Close" >';
            echo '</form>';
            echo '</div></div></div>';   
        }
    ?>
</div>
<!--second column ends here-->
<?php
    if(isset($_REQUEST['view']))
    {
        $sql="select * from submitrequest_tb where request_id={$_REQUEST['id']}";
        $result=$con->query($sql);
        $row=$result->fetch_assoc();
    }
     if(isset($_REQUEST['close']))
    {
        $sql="delete from submitrequest_tb where request_id={$_REQUEST['id']}";
        $result=$con->query($sql);
            if($result==true)
            {
                echo '<meta http-equiv="refresh" content="0;URL=?closed"/>';
            }
            else
            {
                echo '<div class="alert alert-danger mt-2" role="alert">Unable to close request</div>';
            }
    }
    ?>
<!--third column starts here-->
<div class="col-md-6 mt-3 bg-light p-2">
     <form class="mx-5" action="" method="post" id="showRequestinfo">
        <h5 class="text-center ">Assign Work Order Request</h5>
            <div class="mb-3">
                <label for="Requestid" class="form-label">Request Id</label>
                <input type="text" class="form-control" id="Requestid" name="Requestid" value="<?php if(isset($row['request_id'])) {echo $row['request_id'];} ?>" readonly>
            <div class="mb-3">
                <label for="Requestinfo" class="form-label">Request Info</label>
                <input type="text" class="form-control" id="Requestinfo" name="Requestinfo" value="<?php if(isset($row['request_info'])) {echo $row['request_info'];} ?>" readonly>
            </div>
             <div class="mb-3">
                <label for="Requestdescription" class="form-label">Request Description</label>
                <input type="text" class="form-control" id="Requestdesc" name="Requestdesc" value="<?php if(isset($row['request_desc'])) {echo $row['request_desc'];} ?>" readonly>
            </div>
             <div class="mb-3">
                <label for="Name" class="form-label">Name</label>
                <input type="text" class="form-control" id="Name" name="RequesterName" value="<?php if(isset($row['requester_name'])) {echo $row['requester_name'];} ?>" readonly>
            </div>
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="InputAddress" class="form-label">Address Line 1</label>
                    <input type="text" class="form-control" id="InputAddress" name="Requesteradd1" value="<?php if(isset($row['requester_add1'])) {echo $row['requester_add1'];} ?>" readonly>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="InputAddress2" class="form-label">Address Line 2</label>
                    <input type="text" class="form-control" id="InputAddress2" name="Requesteradd2" value="<?php if(isset($row['requester_add2'])) {echo $row['requester_add2'];} ?>" readonly>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-md-4">
                    <label for="InputCity" class="form-label">City</label>
                    <input type="text" class="form-control" id="InputCity" name="RequesterCity" value="<?php if(isset($row['requester_city'])) {echo $row['requester_city'];} ?>" readonly>
                </div>
                <div class="mb-3 col-md-4">
                    <label for="InputState" class="form-label">State</label>
                    <input type="text" class="form-control" id="InputState" name="RequesterState" value="<?php if(isset($row['requester_state'])) {echo $row['requester_state'];} ?>" readonly>
                </div>
                <div class="mb-3 col-md-4">
                    <label for="InputPin" class="form-label">Postal code</label>
                    <input type="text" class="form-control" id="InputPin" name="RequesterPin" value="<?php if(isset($row['requester_zip'])) {echo $row['requester_zip'];} ?>" readonly>
                </div>
            </div>
                <div class="row">
                    <div class="mb-3 col-md-8">
                        <label for="InputEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="InputEmail" name="RequesterEmail" value="<?php if(isset($row['requester_email'])) {echo $row['requester_email'];} ?>" readonly>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="InputMobile" class="form-label">Mobile</label>
                        <input type="number" class="form-control" id="InputMobile" name="RequesterMob" onkeypress="isInputNumber(event)" value="<?php if(isset($row['requester_mobile'])) {echo $row['requester_mobile'];} ?>" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-8">
                        <label for="technician" class="form-label">Assign to technician</label>
                        <input type="text" class="form-control" id="technician" name="technician">
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="inputdate" class="form-label">Date</label>
                        <input type="date" class="form-control" id="inputdate" name="RequesteDate"  onkeypress="isInputNumber(event)">
                    </div>
                </div>
               <div >
                 <button type="submit" name="SubmitReq" class="btn btn-danger" id="submitBtn">Assign</button>
                 <button type="reset" class="btn btn-warning mx-3">Reset</button>
               </div>
                 <div class="msg_box mt-3">

                 </div>
            </form>
</div>
<!--third column ends here-->
<script>
    //store assigned work order in database using ajax start
    $(document).ready(function(){   
        $("#showRequestinfo").submit(function(e){
            e.preventDefault();
             var formData=$(this).serialize();
            $.ajax({
                method:"POST",
                url:"../php/assignwork.php",
                data:formData,
                beforeSend:function(){
                    $("#submitBtn").text("Please wait...");
                    $("#submitBtn").attr("disabled","disabled");
                },
                success:function(response){
                    $("#submitBtn").text("Assign");
                    $("#submitBtn").removeAttr("disabled");
                    if(response.trim()=="success")
                    {
                        var p=document.createElement("P");
                        p.className="alert alert-success";
                        p.innerText="Work assigned successfully!";
                        $(".msg_box").append(p);
                        $('html, body').animate({scrollTop:$(document).height()},800);
                        setTimeout(()=>{
                            $(".msg_box").text("");
                        },3000);
                    }
                    else if(response.trim()=="required")
                    {
                        var p=document.createElement("P");
                        p.className="alert alert-warning";
                        p.innerText="Please fill in all  fields!";
                        $(".msg_box").append(p);
                        $('html, body').animate({scrollTop:$(document).height()},800);
                        setTimeout(()=>{
                            $(".msg_box").text("");
                        },3000);
                    }
                    else
                    {
                        var p=document.createElement("P");
                        p.className="alert alert-danger";
                        p.innerText="Failed to assign work!";
                        $(".msg_box").append(p);
                        $('html, body').animate({scrollTop:$(document).height()},800);
                        setTimeout(()=>{
                            $(".msg_box").text("");
                        },3000);
                    }
                }
            });
        });
    });
    //store assigned work order in database using ajax end
</script>
<?php
    include("Includes/footer.php");
?>  