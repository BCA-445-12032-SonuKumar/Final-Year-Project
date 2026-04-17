<?php 

    define('PAGE','Dashboard');
    define('TITLE','Dashboard');
    include("../php/dbconnection.php");
    include("Includes/header.php");
    session_start();
    if(isset($_SESSION['admin']))
        {
            $aEmail=$_SESSION['admin'];
        }
    else{
        header("Location:adminlogindesign.php");
    }
    $sql="select count(request_id) from submitrequest_tb";
    $result=$con->query($sql);
    $row=$result->fetch_row();
    $total_req=$row[0];

    $sql="select count(rno) from assignwork_tb";
    $result=$con->query($sql);
    $row=$result->fetch_row();
    $assignwork=$row[0];

    $sql="select count(empid) from technician_tb";
    $result=$con->query($sql);
    $row=$result->fetch_row();
    $total_tech=$row[0];
?>
               <!-- second column dashboard  start -->
              <div class="col-md-10 mt-4">
                <div class="row text-center ">
                    <div class="col-sm-4">
                    <div class="card  mb-3 bg-danger text-white" style="max-width: 18rem;">
                        <div class="card-header">Requests Received</div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $total_req; ?></h5>
                          <a class="btn text-white" href="request.php">View Details</a>
                        </div>
                     </div>
                     </div>
                    <div class="col-sm-4">
                    <div class="card bg-success text-white mb-3" style="max-width: 18rem;">
                        <div class="card-header">Assigned Work</div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $assignwork; ?></h5>
                            <a class="btn text-white " href="workorder.php">View Details</a>
                        </div>
                     </div>
                     </div>
                    <div class="col-sm-4">
                    <div class="card  bg-warning mb-3" style="max-width: 18rem;">
                        <div class="card-header">No. of technicians</div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $total_tech; ?></h5>
                           <a class="btn" href="technician.php">View Details</a>
                        </div>
                    </div>
                    </div>
                    <!-- list of users coding start-->
                    <div class=" mt-5 text-center">
                         <p class="text-center bg-dark text-white p-1">List of users</p>
                         <?php
                            $sql="select * from requesterlogin_tb";
                            $result=$con->query($sql);
                            if($result->num_rows>0)
                            {
                                echo '<table class="table table-bordered table-light">
                                <thead>
                                    <tr>
                                        <th scope="col">User ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                    </tr>
                                </thead>';
                                while($row=$result->fetch_assoc())
                                {
                                    echo '<tbody>
                                    <tr>
                                        <td>'.$row["r_login_id"].'</td>
                                        <td>'.$row["r_name"].'</td>
                                        <td>'.$row["r_email"].'</td>
                                    </tr>';
                                }
                                echo '</tbody></table>';
                            }
                            else{
                                echo "No users found.";
                            }
                         ?>
                    </div>
                   <!-- list of users coding end -->
                </div>
              </div>
               <!-- second column dashboard end -->
<?php
    include("Includes/footer.php");
?>