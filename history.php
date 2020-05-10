<?php
session_start();
include("connection.php");
if (!isset($_SESSION['admin'])) {
		header("Location: login.php");
		exit;
}
// select logged in users detail
$res = $connection->query("SELECT * FROM users WHERE id=" . $_SESSION['admin']);
$userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);

// Order Confirmed and Store in db
if(isset($_POST['search'])) {    
    $start =  $_POST['startDate'];
    $end   =  $_POST['endDate'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" >
    <title>Customers </title>
</head>
<body>
    <h2 style="color: #fff; padding: 20px; background: #333; text-align:center; ">
        My History <span style="color: red;"><?php echo  $userRow['name']; ?></span>
    </h2>
    <div class="container">
        <form action="" method="GET" class="mt-5 p-4">
            <h4 class="text-success">Choose Month </h4>
            <div class="row">
                <div class="col-md-3">
                    <input type="date" class="form-control" name="startDate">
                </div>
                <div class="col-md-3">
                     <input type="date" class="form-control" name="endDate" >
                </div>
                <input type="submit" class="btn btn-success btn-md" value="Search">
            </div> 
        </form>
        <table id="example" class="table table-dark table-bordered table-responsive" style="width:100%">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Rate</th>
                    <th>Total</th>
                    <th>Order Status</th>
                    <th>Cash Paid</th>
                    <th>Cash Pending</th>
                    <th>Delivery Person Name</th>   
                </tr>
            </thead>
            <tbody>
            <?php
            include('connection.php');
            if (isset($_GET['startDate']) and isset($_GET['endDate'])) {
                $start = $_GET['startDate'];
                $end   = $_GET['endDate'];
                $sql = "SELECT users.id, users.name, users.contact, users.ref_name, orders.*, order_items.* FROM users
                JOIN orders ON orders.user_id = users.id
                JOIN order_items ON order_items.order_no = orders.order_no
                WHERE orders.created_at BETWEEN '$start' AND '$end' AND users.id = ". $_SESSION['admin'];
            } else {
                $sql = "SELECT users.id, users.name, users.contact, users.ref_name, orders.*, order_items.* FROM users
                    JOIN orders ON orders.user_id = users.id
                    JOIN order_items ON order_items.order_no = orders.order_no
                    WHERE users.id = ". $_SESSION['admin'];
            }

            $i = 1;
            $result = $connection->query($sql);
            //print_r($result);
            if ($result->num_rows > 0) {

            // output data of each row
            while($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php 
                        $date = str_replace('/', '-', $row['created_at'] );
                        $newDate = date("Y-m-d", strtotime($date));
                        echo $newDate;
                    ?></td>
                    <td><?php echo $row['product_name']; ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td><?php echo $row['product_cost']; ?></td>
                    <td><?php if ($row['quantity'] > 0) {echo $row['product_cost']*$row['quantity']; } else { echo '';} ?></td>
                    <td>
                        <?php 
                        if ($row['seen_status'] == 0) {
                            echo 'Pending';
                        } else {
                            echo 'Complete';
                        }
                        ?>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php } }?>
            </tbody>
        </table>
        <a class="btn btn-primary btn-sm" href="index.php">Back</a>
    </div>     
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
        $('#example').DataTable();
          
        } );
    </script>
</body>
</html>