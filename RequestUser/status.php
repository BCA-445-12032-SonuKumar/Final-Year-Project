<?php
    define('TITLE', 'Track status');
    define('PAGE', 'TrackStatus');
    include_once("includes/header.php");
?>
<!-- Start 2nd column -->
 <div class="col-md-6 mt-5">
    <form action="" method="post" class="d-print-none">
        <div class="row g-3 align-items-center">
        <div class="col-auto">
            <label for="checkid" class="col-form-label">Enter request id:</label>
        </div>
        <div class="col-auto">
            <input type="number" id="check_id" class="form-control" name="checkid"  onkeypress="isInputNumber(event)" required="required">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-danger mb-3">Search</button>
        </div>
        </div>
</form>
    <?php
        if(isset($_POST['checkid'])){
            if($_REQUEST['checkid'] == ""){
                echo '<div class="alert alert-warning mt-4" role="alert">Please enter request id !</div>';
            }
            else{
            $checkid = $_POST['checkid'];
            $sql = "SELECT * FROM assignwork_tb WHERE request_id = '$checkid'";
            $result = $con->query($sql);
            if($result->num_rows > 0){
                $row=$result->fetch_assoc();
                if($row['assign_tech'] == ""){
                    echo '<div class="alert alert-info mt-4" role="alert">Your request is still pending !</div>';
                }
                else{
    ?>
    <h3 class="text-center mt-4">Assigned Work Details</h3>
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
        <form action="" class="d-print-none">
            <input type="submit" class="btn btn-danger" value="Print" onClick="window.print()">
            <input type="submit" class="btn btn-warning d-print-none" value="Close" onClick="window.close()">
        </form>
    </div>
    <?php }}
        else{
        echo '<div class="alert alert-danger mt-4" role="alert">No record found !</div>';
         }
    }
}
?>
 </div>
 <!--  2nd column end-->
<!--Only number allowed in input field-->
<script>
    function isInputNumber(evt){
    var ch=String.fromCharCode(evt.which);
    if(!(/[0-9]/.test(ch))){
        evt.preventDefault();
        }
    }
</script>
<?php
    include_once("includes/footer.php");
?>