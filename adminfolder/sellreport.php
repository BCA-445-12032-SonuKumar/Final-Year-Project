<?php 
    define('PAGE','Sell Report');
    define('TITLE','Product Report');
    include("../php/dbconnection.php");
    include("Includes/header.php");
    session_start();
    if(!isset($_SESSION['admin'])){
        header("Location:adminlogindesign.php");
    }
?>
<!--2nd Column start-->
<div class="col-md-10">
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
            $sql = "SELECT * FROM customer_tb  WHERE  cpdate  BETWEEN '$startdate' AND '$enddate'";
            $result = mysqli_query($con,$sql);
            if(mysqli_num_rows($result) > 0){
                echo '<h4 class="text-center ">Product Details</h4>';
                echo '<table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">Customer ID</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Quantity </th>
                    <th scope="col">Price Each</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Date</th>
                    </tr>
                </thead>';
                while($row = mysqli_fetch_assoc($result)){
                    echo '<tbody>
                    <tr>
                    <td>'.$row['custid'].'</td>   
                    <td>'.$row['custname'].'</td>
                    <td>'.$row['custadd'].'</td>
                    <td>'.$row['cpname'].'</td>
                    <td>'.$row['cpquantity'].'</td>
                    <td>'.$row['cpeach'].'</td>
                    <td>'.$row['cptotal'].'</td>
                    <td>'.$row['cpdate'].'</td>
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