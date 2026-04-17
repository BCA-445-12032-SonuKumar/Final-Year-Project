<?php 
     define('PAGE','Asset');
     define('TITLE','Sell Asset');
    include("../php/dbconnection.php");
    include("Includes/header.php");
    session_start();
    if(!isset($_SESSION['admin'])){
        header("Location:adminlogindesign.php");
    }

    $statusMsg = '';
    $statusClass = '';
    if(isset($_SESSION['sellStatusMsg']) && $_SESSION['sellStatusMsg'] !== ''){
        $statusMsg = $_SESSION['sellStatusMsg'];
        $statusClass = $_SESSION['sellStatusClass'];
        unset($_SESSION['sellStatusMsg'], $_SESSION['sellStatusClass']);
    }

    if(isset($_POST['issue'])){
        $pid = $_POST['pid'];
        $cname = $_POST['cname'];
        $cadd = $_POST['cadd'];
        $pname = $_POST['pname'];
        $pava = $_POST['pava'];
        $pquant = $_POST['pquant'];
        $psellingcost = $_POST['psellingcost'];
        $tprice = $_POST['tprice'];
        $date = $_POST['date'];

        if($pquant > $pava){
            $_SESSION['sellStatusMsg'] = 'Quantity exceeds available stock.Press back and try again.';
            $_SESSION['sellStatusClass'] = 'alert-danger';
            header('Location: sellasset.php');
            exit;
        } else {
            // Insert into sales table
            $sql = "INSERT INTO customer_tb ( custname, custadd, cpname, cpquantity, cpeach, cptotal, cpdate) VALUES ( '$cname', '$cadd', '$pname', '$pquant', '$psellingcost', '$tprice', '$date')";
            if($con->query($sql) === TRUE){
                $genId = mysqli_insert_id($con); // Get the generated sale ID
                $_SESSION['genId'] = $genId; // Store it in session for later use (e.g., generating bill)
                // Update the assets table to reduce the available quantity
                $newAva = $pava - $pquant;
                $updateSql = "UPDATE assets_tb SET pava = '$newAva' WHERE pid = '$pid'";
                $con->query($updateSql);
                echo "<script>location.href='productsellsuccess.php';</script>";
            }
           
        }
    }
?>
<!--2nd Column start-->
<div class="col-md-7">
                <div id="sellMessage"></div>
                <h1 class=" text-danger text-center fs-4">Customer Bill</h1>
                <?php
                if(isset($_POST['sell'])){
                    $sql = "SELECT * FROM assets_tb WHERE pid = {$_POST['id']}";
                    $result = $con->query($sql);
                    $row= $result->fetch_assoc();
                }
                ?>
                <form class="mx-5 shadow-lg p-4 Sell_form" action="" method="post">
                    <div class="mb-3">
                        <label for="pid" class="form-label">Asset ID</label>
                        <input type="number" class="form-control" id="pid" value="<?php if(isset($row['pid'])){ echo $row['pid']; } ?>" required="required" readonly="readonly" name="pid">
                    </div>
                     <div class="mb-3">
                        <label for="cname" class="form-label">Customer Name</label>
                        <input type="text" class="form-control" id="cname" name="cname"  required="required">
                    </div>
                     <div class="mb-3">
                        <label for="cadd" class="form-label">Customer Adress</label>
                        <input type="text" class="form-control" id="cadd" name="cadd"  required="required">
                    </div>
                    <div class="mb-3">
                        <label for="pname" class="form-label">Asset Name</label>
                        <input type="text" class="form-control" id="pname"   value="<?php if(isset($row['pname'])){ echo $row['pname']; } ?>" required="required" readonly="readonly" name="pname">
                    </div>
                    <div class="mb-3">
                        <label for="pava" class="form-label">Available</label>
                        <input type="number" class="form-control" id="pava" name="pava" value="<?php if(isset($row['pava'])){ echo $row['pava']; } ?>" required="required" readonly="readonly">
                    </div>
                    <div class="mb-3">
                        <label for="pquant" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="pquant" name="pquant" required="required">
                    </div>
                     <div class="mb-3">
                        <label for="psellingcost" class="form-label">Price Each</label>
                        <input type="number" class="form-control" id="psellingcost" name="psellingcost" value="<?php if(isset($row['psellingcost'])){ echo $row['psellingcost']; } ?>" required="required" readonly="readonly">
                    </div>
                    <div class="mb-3">
                        <label for="tprice" class="form-label">Total Price</label>
                        <input type="number" class="form-control" id="tprice" name="tprice" required="required" readonly="readonly">
                    </div>
                     <div class="mb-3">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" class="form-control" id="date" required="required" name="date">
                    </div>
                    <button type="submit" class="btn btn-outline-primary" id="sell_btn" name="issue">Sell</button>
                    <a href="asset.php" class="btn btn-outline-danger">Back</a>
                </form>
    </div>
 <!-- 2nd  Column end-->
<script>
function showSellMessage(message, type) {
    var $msg = $('#sellMessage');
    $msg.html('<div class="alert ' + type + ' alert-dismissible fade show" role="alert">' +
        '<strong>' + message + '</strong>' +
        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
        '</div>');


    setTimeout(function(){
        $msg.find('.alert').alert('close');
        $msg.empty();
    }, 3000);
}

<?php if(!empty($statusMsg)): ?>
showSellMessage(<?php echo json_encode($statusMsg); ?>, <?php echo json_encode($statusClass); ?>);
<?php endif; ?>

// Calculate total price based on quantity and price each
$(function() {
    function calcTotal() {
        var qty = parseFloat($('#pquant').val()) || 0;
        var price = parseFloat($('#psellingcost').val()) || 0;
        $('#tprice').val((qty * price).toFixed(2));
    }

    $('#pquant').on('input change', calcTotal);
    $('#psellingcost').on('input change', calcTotal);

    // Optional: set initial total when page loads
    calcTotal();
});
</script>
<?php
include("Includes/footer.php");
?>