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
        <link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css">
        <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">
        <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="assets/vendor/charts/c3charts/c3.css">
        <link rel="stylesheet" href="assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" >
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
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="page-header">
                                        <h2 class="pageheader-title">Admin Dashboard </h2>
                                        <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                                        <div class="page-breadcrumb">
                                            <nav aria-label="breadcrumb">
                                                <ol class="breadcrumb">
                                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                                    <li class="breadcrumb-item active" aria-current="page">Welcome Saad</li>
                                                </ol>
                                            </nav>
                                        </div>
                                    </div>
                    <table id="example" class="table table-default table-responsive table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Contact</th>
                                    <th>Address</th>
                                    <th>Referal Name</th>
                                    <th>Date</th>
                                    <th>Action</th>          
                                </tr>
                        </thead>
                            <tbody>
                                <?php
                                include('connection.php');
                                $sql = "SELECT id, `name`, `address`, contact, ref_name, created_at FROM users";
                                $result = $connection->query($sql);

                                if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) { ?>
                                    <tr>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['contact']; ?></td>
                                        <td><?php echo $row['address']; ?></td>
                                        <td><?php echo $row['ref_name']; ?></td>
                                        <td><?php echo date("Y/m/d")  ?></td>
                                        <td><button class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
                                    </tr>
                                    <?php } }?>
                                </tbody>
                            </table>
                        </div>          
                    </div>
                </div>
            </div>
                 <?php include('includes/footer.php'); ?>
        </div>
        <!-- end wrapper  -->
    </div>
    <?php include('includes/script.blade.php'); ?>
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