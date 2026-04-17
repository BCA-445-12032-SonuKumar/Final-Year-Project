<?php
    define('TITLE', 'Change Password');
    define('PAGE', 'ChangePass');
    include_once("includes/header.php");
?>          
              <!-- second column start -->
             <div class="col-md-6  mt-5">
                <h1 class="editProfile text-dark text-center fs-4">Change Password</h1>
                <form class="mx-5 shadow-lg p-4 editpass_form" action="" method="post">
                    <div class="mb-3">
                        <label for="uemail" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="uemail" aria-describedby="emailHelp" disabled readonly="readonly" value="<?php echo $useremail; ?>" required="required">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3 pass_box">
                        <label for="password" class="form-label">New Password</label>
                        <input type="password" class="form-control" id="password" required="required">
                        <i class="fa-solid fa-eye" id="eye_symbol"></i>
                    </div>
                    <button type="submit" class="btn btn-primary" id="update_btn">Update</button>
                     <button type="reset" class="btn btn-secondary mx-3">Reset</button>
                    <div class="msg mt-3"></div>
                </form>
              </div>
               <!-- second column end -->
                <script>
                        //change password ajax coding start
                        $(document).ready(function(){  
                            $(".editpass_form").submit(function(e){
                          e.preventDefault();
                          $.ajax({
                            method:"POST",
                            url:"../php/changepassword.php",
                            data:{
                                password:$("#password").val()
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
                                p.innerText="Password changed successfully!";
                                $(".msg").append(p);
                                setTimeout(()=>{
                                  $(".msg").text("");
                                },3000);
                              }
                            }
                          });
                        });

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
                        });

                </script>
<?php
    include_once("includes/footer.php");
?>