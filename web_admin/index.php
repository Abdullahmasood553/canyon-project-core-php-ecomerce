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
                        </div>
                    </div>

                    <!-- end pageheader  -->

                    <div class="ecommerce-widget">

                        <div class="row">
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">Total Revenue</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">$12099</h1>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                            <span><i class="fa fa-fw fa-arrow-up"></i></span><span>5.86%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">Affiliate Revenue</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">$12099</h1>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                            <span><i class="fa fa-fw fa-arrow-up"></i></span><span>5.86%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">Refunds</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">0.00</h1>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-primary font-weight-bold">
                                            <span>N/A</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">Avg. Revenue Per User</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">$28000</h1>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-secondary font-weight-bold">
                                            <span>-2.00%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

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