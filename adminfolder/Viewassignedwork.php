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
 <div class="col-md-6">
    <h3 class="text-center mt-4">Assigned Work Details</h3>
    <?php
      if(isset($_POST['view'])){
        $checkid = $_POST['id'];
        $sql = "SELECT * FROM assignwork_tb WHERE request_id = '$checkid'";
        $result = $con->query($sql);
        $row=$result->fetch_assoc();
?>
    <table class="table table-bordered">
        <tbody>
            <tr>
                <td>Request ID</td>
                <td><?php if(isset($row['request_id'])){echo $row['request_id'];} ?></td>
            </tr>
            <tr>
                <td>Request Info</td>
                <td><?php if(isset($row['request_info'])){echo $row['request_info'];} ?></td>
            </tr>
            <tr>
                <td>Request Description</td>
                <td><?php if(isset($row['request_desc'])){echo $row['request_desc'];} ?></td>
            </tr>
            <tr>
                <td>Requester Name</td>
                <td><?php if(isset($row['requester_name'])){echo $row['requester_name'];} ?></td>
            </tr>
            <tr>
                <td>Requester Address1</td>
                <td><?php if(isset($row['requester_add1'])){echo $row['requester_add1'];} ?></td>
            </tr>
            <tr>
                <td>Requester Address2</td>
                <td><?php if(isset($row['requester_add2'])){echo $row['requester_add2'];} ?></td>
            </tr>
            <tr>
                <td>Requester City</td>
                <td><?php if(isset($row['requester_city'])){echo $row['requester_city'];} ?></td>
            </tr>
            <tr>
                <td>Requester State</td>
                <td><?php if(isset($row['requester_state'])){echo $row['requester_state'];} ?></td>
            </tr>
            <tr>
                <td>Requester Zip</td>
                <td><?php if(isset($row['requester_zip'])){echo $row['requester_zip'];} ?></td>
            </tr>
            <tr>
                <td>Requester Mobile</td>
                <td><?php if(isset($row['requester_mobile'])){echo $row['requester_mobile'];} ?></td>
            </tr>
            <tr>
                <td>Assigned Date</td>
                <td><?php if(isset($row['assign_date'])){echo $row['assign_date'];} ?></td>
            </tr>
            <tr>
                <td>Technician Name</td>
                <td><?php if(isset($row['assign_tech'])){echo $row['assign_tech'];} ?></td>
            </tr>
             <tr>
                <td>Technician Sign</td>
                <td><?php if(isset($row['tech_sign'])){echo $row['tech_sign'];} ?></td>
            </tr>
             <tr>
                <td>Customer Sign</td>
                <td><?php if(isset($row['customer_sign'])){echo $row['customer_sign'];} ?></td>
        </tbody>
    </table>
    <div class="text-center mb-3">
        <form action="workorder.php" class="d-print-none d-inline">
            <input type="submit" class="btn btn-danger " value="Print" onClick="window.print()"></form>
             <form action="workorder.php" class="d-print-none d-inline">
            <input type="submit" class="btn btn-warning d-print-none" value="Close" onClick="workorder.php"></form>
        </form>
    </div>
    <?php }?>
 </div>
<!--2nd column end-->
<?php
    include("Includes/footer.php");
?>