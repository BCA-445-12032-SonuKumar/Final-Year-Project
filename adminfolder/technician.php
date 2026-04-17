<?php 
     define('PAGE','Technician');
    define('TITLE','Technician');
    include("../php/dbconnection.php");
    include("Includes/header.php");
    session_start();
    if(!isset($_SESSION['admin']))
    {
        header("Location: adminlogindesign.php");
    }
?>
<!-- Start 2nd Column -->
 <div class="col-sm-9 col-md-10 text-center">
     <p class="text-center fs-2 text-success">Our Technicians</p>
    <?php
        $sql = "SELECT * FROM technician_tb";
        $result = $con->query($sql);
        if($result->num_rows > 0){
            echo '<table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Employee ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">City</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>';
            while($row=$result->fetch_assoc()){
                echo '<tr>';
                echo '<td>'.$row["empid"].'</td>';
                echo '<td>'.$row["empName"].'</td>';
                echo '<td>'.$row["empCity"].'</td>';
                echo '<td>'.$row["empMobile"].'</td>';
                echo '<td>'.$row["empEmail"].'</td>';
                echo '<td>
                <form action="edittechnician.php" method="POST" class="d-inline mx-2">
                    <input type="hidden" name="id" value='.$row["empid"].'><button type="submit" class="btn btn-secondary mb-1" name="edit"><i class="fa-solid fa-pen-to-square"></i></button>
                </form>
                <form action="" method="POST" class="d-inline">
                <input type="hidden" name="id" value='.$row["empid"].'><button type="submit" class="btn btn-danger mb-1" name="delete"><i class="fas fa-trash"></i></button></form></td>';
                echo '</tr>';
            }
            echo '</tbody></table>';
        }
        else{
            echo "0! results";
        }
    ?>
 </div>
 <!-- 2nd  Column end-->
  <?php
    if(isset($_POST['delete'])){
        $sql = "DELETE FROM technician_tb WHERE empid = {$_POST['id']}";
        if($con->query($sql)===TRUE){
            echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
        }
        else{
            echo "Unable to delete data";
        }
    }
  
  ?>
        </div>
        <div class="float-end ">
            <a href="addtechnician.php" class="btn btn-danger"><i class="fa-solid fa-plus"></i></a>
        </div>
      </div>
       <!-- javascript links -->  
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/popper.min.js"></script>
    </script>
</body>
</html>