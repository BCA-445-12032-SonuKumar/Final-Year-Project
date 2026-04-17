<?php 
     define('PAGE','Bill Success');
     define('TITLE','Bill');
    include("../php/dbconnection.php");
    include("Includes/header.php");
    session_start();
    if(!isset($_SESSION['admin'])){
        header("Location:adminlogindesign.php");
    }
   
?>
<div class="col-md-7">
    <?php
    $sql = "SELECT * FROM customer_tb WHERE custid = {$_SESSION['genId']}";
    $result = $con->query($sql);
    if($result->num_rows ==1){
        $row = $result->fetch_assoc();
        echo "<div class='ml-5 mt-2'>
                <h2 class='text-center text-success fs-3'>Bill Generated Successfully</h2>
                <table class='table'>
                <tbody>
                    <tr>
                        <th>Customer Name</th>
                        <td>".$row['custname']."</td>
                    </tr>
                    <tr>
                        <th>Customer Address</th>
                        <td>".$row['custadd']."</td>
                    </tr>
                    <tr>
                        <th>Product Name</th>
                        <td>".$row['cpname']."</td>
                    </tr>
                    <tr>
                        <th>Quantity</th>
                        <td>".$row['cpquantity']."</td>
                    </tr>
                    <tr>
                        <th>Price Each</th>
                        <td>".$row['cpeach']."</td>
                    </tr>
                    <tr>
                        <th>Total Price</th>
                        <td>".$row['cptotal']."</td>
                    </tr>
                    <tr>
                        <th>Date of Purchase</th>
                        <td>".$row['cpdate']."</td>
                    </tr>
                    <tr class='d-print-none'>
                        <td>
                            <button type='submit' class='btn btn-primary' onclick='window.print()' name='print'>Print</button>
                        </td>  
                        <td>
                            <a href='asset.php' class='btn btn-secondary'>Close</a>
                        </td>  
                    </tr>
                </tbody>
                </table></div>";

    } else {
        echo "Failed to generate bill.";
    }
     ?>
    </div>
   
<?php
    include("Includes/footer.php");
?>