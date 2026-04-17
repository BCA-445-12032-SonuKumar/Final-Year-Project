<?php 
     define('PAGE','Work Report');
     define('TITLE','Product Report');
    include("../php/dbconnection.php");
    include("Includes/header.php");
    session_start();
    if(!isset($_SESSION['admin'])){
        header("Location:adminlogindesign.php");
    }
?>
<!--2nd Column start-->
<div class="col-md-9 me-5">
    <form class="row g-3" method="post" action="">
    <div class="col-auto">
        <input type="date"  class="form-control-plaintext" id="startdate" name="startdt" required="required">
    </div>
    <span class="col-auto">to</span>
    <div class="col-auto">
        <input type="date" class="form-control" id="enddate" name="enddt" required="required">
    </div>
    <div class="col-auto">
        <input type="submit" value="Search" class="btn btn-primary mb-3" name="searchsubmit">
    </div>
    </form>
    <?php
        if(isset($_POST['searchsubmit'])){
            $startdate = $_POST['startdt'];
            $enddate = $_POST['enddt'];
            $sql = "SELECT * FROM assignwork_tb  WHERE  assign_date  BETWEEN '$startdate' AND '$enddate'";
            $result = mysqli_query($con,$sql);
            if(mysqli_num_rows($result) > 0){
                echo '<h3 class="text-center">Work Details</h3>';
                echo '<table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">Request ID</th>
                    <th scope="col">Request Info</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">City </th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Technician </th>
                    <th scope="col">Assigned Date</th>
                    </tr>
                </thead>';
                while($row = mysqli_fetch_assoc($result)){
                    echo '<tbody>
                    <tr>
                    <td>'.$row['request_id'].'</td>   
                    <td>'.$row['request_info'].'</td>
                    <td>'.$row['requester_name'].'</td>
                    <td>'.$row['requester_add1'].'</td>
                    <td>'.$row['requester_city'].'</td>
                    <td>'.$row['requester_mobile'].'</td>
                    <td>'.$row['assign_tech'].'</td>
                    <td>'.$row['assign_date'].'</td>
                    </tr>
                    </tbody>';
                }
                echo '</table>';
            }else{
                echo '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">No Records Found !</div>';
            }
        }
    ?>
 </div>
<?php
include("Includes/footer.php");
?>