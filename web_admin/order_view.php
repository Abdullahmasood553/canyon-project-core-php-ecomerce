<?php
	include("check_session.php");
	include("connection.php");  
	$user_id=$_SESSION['user_id'];
?>
<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/buttons.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/select.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/fixedHeader.bootstrap4.css">
    <title>Admin Panel</title>
</head>

<body>
    <!-- main wrapper -->
    <div class="dashboard-main-wrapper">
        <?php include('includes/header.php'); ?>
        <?php include('includes/sidebar.php'); ?>
        <!-- wrapper  -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                <!-- ============================================================== -->
                <!-- pageheader  -->
                <!-- ============================================================== -->
                    <div class="row">
                        <!-- ============================================================== -->
                        <!-- data table  -->
                        <!-- ============================================================== -->
                        <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                            <?php
                            $id = $_GET['id'];
                            $ord = $connection->query("SELECT * FROM orders WHERE order_no = '$id'");
                            $orderRow = mysqli_fetch_array($ord, MYSQLI_ASSOC);
                            ?>
                            <div class="card">
                                <div class="card-header p-4">
                                     <a class="pt-2 d-inline-block" href="index.php">canyon</a>
                                    <div class="float-right"> 
                                        <h3 class="mb-0">Invoice # <?php echo $_GET['id'];?></h3>
                                        Date: <?php echo date('d M, Y',strtotime($orderRow['created_at']));?>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-4">
                                        <div class="col-sm-6">
                                            <h5 class="mb-3">From:</h5>                                            
                                            <h3 class="text-dark mb-1"><?php echo $orderRow['p_names'];?></h3>
                                            <div><?php echo $orderRow['address'];?></div>
                                            <div>Phone: <?php echo $orderRow['contact'];?></div>
                                        </div>
                                        <div class="col-sm-6">
                                            
                                        </div>
                                    </div>
                                    <div class="table-responsive-sm">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="center">#</th>
                                                    <th>Item</th>
                                                    <th class="right">Unit Cost</th>
                                                    <th class="center">Qty</th>
                                                    <th class="right">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                include('connection.php');
                                                $order_no = $_GET['id'];
                                                $result=mysqli_query($connection,"SELECT * FROM orders 
                                                    JOIN order_items ON order_items.order_no = orders.order_no
                                                    WHERE orders.order_no = '$order_no'") or die ("query 1 incorrect.....");
                                                $i = 1;
                                                $total = 0;
                                                if ($result->num_rows > 0) {
                                                // output data of each row
                                                while($row = $result->fetch_assoc()) { 
                                                    $total = $row['total'];
                                                ?>
                                                <tr>
                                                    <td class="center"><?php echo  $i++; ?></td>
                                                    <td class="left strong"><?php echo $row['product_name']; ?></td>
                                                    <td class="right"><?php echo $row['product_cost']; ?></td>
                                                    <td class="center"><?php echo $row['quantity']; ?></td>
                                                    <td class="right">
                                                        <?php 
                                                        if ($row['quantity'] > 0) { 
                                                            echo $row['product_cost']*$row['quantity']; 
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                            <?php } }?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-5">
                                        </div>
                                        <div class="col-lg-5 col-sm-5 ml-auto">
                                            <table class="table table-clear">
                                                <tbody>
                                                    <tr>
                                                        <td class="left">
                                                            <strong class="text-dark">Total</strong>
                                                        </td>
                                                        <td class="right">
                                                            <strong class="text-dark"><?php echo $total;?></strong>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="card-footer bg-white">
                                    <p class="mb-0">2983 Glenview Drive Corpus Christi, TX 78476</p>
                                </div> -->
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end data table  -->
                        <!-- ============================================================== -->
                    </div>
                </div>
            </div>
            <?php include('includes/footer.php'); ?>
        </div>
        <!-- end wrapper  -->
    </div>                          
    <?php include('includes/script.blade.php'); ?>
</body>
 
</html>