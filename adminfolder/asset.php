<?php 
     define('PAGE','Asset');
     define('TITLE','Assets');
    include("../php/dbconnection.php");
    include("Includes/header.php");
    session_start();
    if(!isset($_SESSION['admin'])){
        header("Location:adminlogindesign.php");
    }
?>
<!-- Start 2nd Column -->
<div class="col-sm-9 col-md-10 text-center">
    <p class="bg-success text-white p-2">List of Assets</p>
    <?php 
        $sql = "SELECT * FROM assets_tb";
        $result = $con->query($sql);
        if($result->num_rows > 0){
            echo '<table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Asset ID</th>
                            <th scope="col">Asset Name</th>
                            <th scope="col">Date of Purchase</th>
                            <th scope="col">Available</th>
                            <th scope="col">Total</th>
                            <th scope="col">Original Cost Each</th>
                            <th scope="col">Selling Price Each</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>';
            while($row = $result->fetch_assoc()){
                $sellDisabled = ($row['pava'] == 0) ? 'disabled' : '';
                $sellClass = ($row['pava'] == 0) ? 'btn btn-secondary mb-1' : 'btn btn-success mb-1';
                $sellTitle = ($row['pava'] == 0) ? 'title="Out of stock"' : '';

                echo '<tr>';
                echo '<td>'.$row['pid'].'</td>';
                echo '<td>'.$row['pname'].'</td>';
                echo '<td>'.$row['pdop'].'</td>';
                echo '<td>'.$row['pava'].'</td>';
                echo '<td>'.$row['ptotal'].'</td>';
                echo '<td>'.$row['poriginalcost'].'</td>';
                echo '<td>'.$row['psellingcost'].'</td>';
                echo '<td><form action="editasset.php" method="POST" class="d-inline">
                        <input type="hidden" name="id" value='.$row['pid'].'>
                        <button type="submit" class="btn btn-secondary mb-1" name="edit"><i class="fas fa-pencil-alt"></i></button>
                      </form>
                      <form action="" method="POST" class="d-inline">
                        <input type="hidden" name="id" value='.$row['pid'].'>
                        <button type="submit" class="btn btn-danger mb-1" name="delete"><i class="fas fa-trash"></i></button>
                      </form>
                      <form action="sellasset.php" method="POST" class="d-inline">
                        <input type="hidden" name="id" value='.$row['pid'].'>
                        <button type="submit" class="'.$sellClass.'" name="sell" '.$sellDisabled.' '.$sellTitle.'><i class="fa-solid fa-handshake"></i></button>
                      </form></td>';
                echo '</tr>';
            }
            echo '</tbody></table>';
        } else {
            echo "0 Results !";
        }
    ?>
</div>
<!-- End 2nd Column -->
  <?php
    if(isset($_POST['delete'])){
        $sql = "DELETE FROM assets_tb WHERE pid = {$_POST['id']}";
        if($con->query($sql)===TRUE){
            echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
        }
        else{
            echo "Unable to delete data";
        }
    }
  
  ?>
        </div>
        <div class="float-end">
            <a href="addasset.php" class="btn btn-danger box"><i class="fas fa-plus"></i></a>
        </div>
      </div>
       <!-- javascript links -->  
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/popper.min.js"></script>
    </script>
</body>
</html>