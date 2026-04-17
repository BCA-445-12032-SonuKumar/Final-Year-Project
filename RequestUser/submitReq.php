<?php
    define('TITLE', 'Submit Request');
    define('PAGE', 'SubmitRequest');
    include_once("includes/header.php");
?>
    <!-- second column start -->
    <div class=" col-md-10 mt-5">
        <form class="mx-5" action="" method="post" id="submitRequestForm">
            <div class="mb-3">
                <label for="Requestinfo" class="form-label">Request Info</label>
                <input type="text" class="form-control" id="RequestInfo" name="RequestInfo" placeholder="Request Info" required="required">
            <div class="mb-3">
                <label for="Requestdescription" class="form-label">Description</label>
                <input type="text" class="form-control" id="Requestdescription" name="Requestdesc" placeholder="Write description here of your problem" required="required">
            </div>
             <div class="mb-3">
                <label for="Name" class="form-label">Name</label>
                <input type="text" class="form-control" id="Name" name="RequesterName" placeholder="e.g. John Doe" required="required">
            </div>
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="InputAddress" class="form-label">Address Line 1</label>
                    <input type="text" class="form-control" id="InputAddress" name="Requesteradd1" placeholder="e.g. House No 123, ABC Street"  required="required">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="InputAddress2" class="form-label">Address Line 2</label>
                    <input type="text" class="form-control" id="InputAddress2" name="Requesteradd2" placeholder="e.g. Area, City"   required="required">
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="InputCity" class="form-label">City</label>
                    <input type="text" class="form-control" id="InputCity" name="RequesterCity" placeholder="e.g. Patna" required="required">
                </div>
                <div class="mb-3 col-md-4">
                    <label for="InputState" class="form-label">State</label>
                    <input type="text" class="form-control" id="InputState" name="RequesterState" placeholder="e.g. Bihar" required="required">
                </div>
                <div class="mb-3 col-md-2">
                    <label for="InputPin" class="form-label">Postal code</label>
                    <input type="text" class="form-control" id="InputPin" name="RequesterPin" placeholder="e.g. 123456" onkeypress="isInputNumber(event)" required="required">
                </div>
            </div>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="InputEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="InputEmail" name="RequesterEmail" placeholder="e.g. xyz@gmail.com" required="required">
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="InputMobile" class="form-label">Mobile</label>
                        <input type="number" class="form-control" id="InputMobile" name="RequesterMob" placeholder="e.g. 9876543210" onkeypress="isInputNumber(event)" required="required">
                    </div>
                    <div class="mb-3 col-md-2">
                        <label for="InputDate" class="form-label">Date</label>
                        <input type="Date" class="form-control" id="InputDate" name="RequestDate" placeholder="e.g. 12-05-2024" required="required">
                    </div>
                </div>
                <button type="submit" name="SubmitReq" class="btn btn-danger" id="submitBtn">Submit</button>
                 <button type="reset" class="btn btn-warning mx-3">Reset</button>
                 <div class="msg_box mt-3">

                 </div>
            </form>
    </div>
         <!-- second column end -->
          <script>
            //potal code validatin
            function isInputNumber(evt){
                var ch=String.fromCharCode(evt.which);
                if(!(/[0-9]/.test(ch))){
                    evt.preventDefault();
                }
            }
            //potal code validatin end
            //submit request ajax start
            $("#submitRequestForm").submit(function(e){
                e.preventDefault();
                var formData=$(this).serialize();
                $.ajax({
                    url:'../php/storeRequestInfo.php',
                    type:'POST',
                    data:formData,
                    beforeSend:function(){
                        $("#submitBtn").text("Please wait...");
                        $("#submitBtn").attr("disabled","disabled");
                    },
                    success:function(response){
                        $("#submitBtn").text("Submit");
                        $("#submitBtn").removeAttr("disabled");
                        if(response.trim()=="success"){
                            var p=document.createElement("P");
                            p.className="alert alert-success";
                            p.innerHTML="Request submitted successfully ! <i class='fa-solid fa-circle-check text-success m-1 fs-4'></i>";
                            $(".msg_box").append(p);
                            $('html, body').animate({scrollTop:$(document).height()},800);
                            setTimeout(()=>{
                                $(".msg_box").text("");
                                window.location="SubmitreqSuccess.php";
                            },3000);
                        }
                        else if(response.trim()=="required"){
                            var p=document.createElement("P");
                            p.className="alert alert-danger";
                            p.innerHTML="All fields are required ! <i class='fa-solid fa-circle-exclamation text-danger m-1 fs-4'></i>";
                            $(".msg_box").append(p);
                             $('html, body').animate({scrollTop:$(document).height()},800);
                            setTimeout(()=>{
                                $(".msg_box").text("");
                            },3000);
                        }
                        else{
                            var p=document.createElement("P");
                            p.className="alert alert-danger";
                            p.innerHTML="Request submission failed! Please try again. <i class='fa-solid fa-circle-exclamation text-danger m-1 fs-4'></i>";
                            $(".msg_box").append(p);
                            $('html, body').animate({scrollTop:$(document).height()},800);
                            setTimeout(()=>{
                                $(".msg_box").text("");
                            },3000);
                        }
    
                    }
                });
            });
            //submit request ajax end
          </script>
<?php
    include_once("includes/footer.php");
?>