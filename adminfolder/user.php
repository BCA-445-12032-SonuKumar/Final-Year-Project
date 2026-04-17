<?php 
    define('PAGE','Users');
    define('TITLE','Users');
    include("../php/dbconnection.php");
    include("Includes/header.php");
    session_start();
    if(!isset($_SESSION['admin'])){
        header("Location: adminlogindesign.php");
    }
?>
<!-- Start 2nd Column -->
 <div class="col-sm-9 col-md-10 text-center">
     <p class="text-center text-success fs-2">Our Users</p>
    <?php
        $sql = "SELECT * FROM requesterlogin_tb";
        $result = $con->query($sql);
        if($result->num_rows > 0){
            echo '<table class="table table-warning table-striped">
                    <thead>
                        <tr>
                            <th scope="col">User ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>';
            while($row=$result->fetch_assoc()){
                echo '<tr>';
                echo '<td>'.$row["r_login_id"].'</td>';
                echo '<td>'.$row["r_name"].'</td>';
                echo '<td>'.$row["r_email"].'</td>';
                echo '<td>
                <form action="edituser.php" method="POST" class="d-inline mx-2">
                    <input type="hidden" name="id" value='.$row["r_login_id"].'><button type="submit" class="btn btn-secondary mb-1" name="edit"><i class="fa-solid fa-pen-to-square"></i></button>
                </form>
                <form action="" method="POST" class="d-inline">
                <input type="hidden" name="id" value='.$row["r_login_id"].'><button type="submit" class="btn btn-danger mb-1" name="delete"><i class="fas fa-trash"></i></button></form></td>';
                echo '</tr>';
            }
            echo '</tbody></table>';
        }
        else{
            echo "No Users Found";
        }
    ?>
 </div>
 <!-- 2nd  Column end-->
  <?php
    if(isset($_POST['delete'])){
        $sql = "DELETE FROM requesterlogin_tb WHERE r_login_id = {$_POST['id']}";
        if($con->query($sql)===TRUE){
            echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
        }
        else{
            echo "Unable to delete data";
        }
    }
  
  ?>
<?php
    include("Includes/footer.php");
?>