<?php 
    define('PAGE','Work Order');
    define('TITLE','Work Order');
    include("../php/dbconnection.php");
    include("Includes/header.php");
    session_start();
    if(!isset($_SESSION['admin']))
    {
        header("Location: adminlogindesign.php");
    }
?>
<!-- start 2nd column -->
 <div class="col-sm-9 col-md-10 mt-2">
    <?php
        $sql="select * from assignwork_tb";
        $result=$con->query($sql);
        if($result->num_rows>0)
        {
            echo '<table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Request ID</th>
                            <th scope="col">Request Info</th>
                            <th scope="col">Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">City</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Technician</th>
                            <th scope="col">Assigned Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>';
                    while($row=$result->fetch_assoc())
                    {
                        echo '<tr>';
                        echo '<td>'.$row["request_id"].'</td>';
                        echo '<td>'.$row["request_info"].'</td>';
                        echo '<td>'.$row["requester_name"].'</td>';
                        echo '<td>'.$row["requester_add1"].'</td>';
                        echo '<td>'.$row["requester_city"].'</td>';
                        echo '<td>'.$row["requester_mobile"].'</td>';
                        echo '<td>'.$row["assign_tech"].'</td>';
                        echo '<td>'.$row["assign_date"].'</td>';
                        echo '<td><form action="Viewassignedwork.php" method="post" class="d-inline me-2 ">
                                    <input type="hidden" name="id" value='.$row["request_id"].'>
                                   <button type="submit" class="btn btn-warning mb-1" name="view"><i class="fa-solid fa-eye"></i></button>
                                </form>';
                        echo '<form action="" method="post" class="d-inline" >
                                <input type="hidden" name="id" value='.$row["request_id"].'>
                                <button type="submit" class="btn btn-danger mb-1" name="delete"><i class="fa-solid fa-trash"></i></button>
                                </form></td>';
                        echo '</tr>';
                    }
            echo '</tbody></table>';
        }
        else{
            echo '<div class="alert alert-info" role="alert">
                    No Work Assigned Yet!
                </div>';
        }
    ?>
 </div>
 <!-- end 2nd column -->
<?php
        if(isset($_POST['delete']))
        {
            $sql="DELETE FROM assignwork_tb WHERE request_id={$_POST['id']}";
            if($con->query($sql)===TRUE)
            {
                echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
            }
            else{
                echo "Unable to Delete Data";
            }
        }
?>
<?php
    include("Includes/footer.php");
?>