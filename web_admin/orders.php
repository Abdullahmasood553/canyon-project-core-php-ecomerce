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
    <style type="text/css">
        .notification-dropdown li{
            padding: 0 20px;
        }
    </style>
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
                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">Order Table</h5>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No#</th>
                                                    <th>Customer Name</th>
                                                    <th>Address</th>
                                                    <th>Total</th>
                                                    <th>Status</th>
                                                    <th>Date/Time</th>
                                                    <th>Delivery Person</th>
                                                    <th>Notification</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                include('connection.php');                        
                                                $result=mysqli_query($connection,"SELECT users.id, users.name, users.contact, users.ref_name, orders.id as order_id, orders.order_no, orders.total, orders.user_id, orders.address, orders.seen_status, orders.created_at FROM users 
                                                    JOIN orders ON orders.user_id = users.id 
                                                    order by created_at Desc") or die ("query 1 incorrect.....");
                                                $i = 1;
                                                if ($result->num_rows > 0) {
                                                // output data of each row
                                                while($row = $result->fetch_assoc()) { ?>
                                                    <tr class="">
                                                        <td><?php echo  $i++; ?></td>
                                                        <td><?php echo $row['name']; ?></td>
                                                        <td><?php echo $row['address']; ?></td>
                                                        <td><?php echo $row['total']; ?></td>
                                                        <td>
                                                            <?php 
                                                            if ($row['seen_status'] == 0) {
                                                                echo '<span class="badge badge-warning">Pending</span>';
                                                            } else {
                                                                echo '<span class="badge badge-success">Complete</span>';
                                                            }
                                                            ?>
                                                        </td>
                                                        <td><?php echo date('d M Y h:i a',strtotime($row['created_at'])); ?></td>
                                                        <td>
                                                         <select >
                                                         <?php
                                                             $sessAllQuery = $connection->query("SELECT * FROM delivery");
                                                                if ($sessAllQuery->num_rows > 0) {
                                                                // output data of each row
                                                                    while ($sessRow = $sessAllQuery->fetch_assoc()) {
                                                                        echo "<option value='" . $sessRow['id'] . "'>" . $sessRow['name'] . "</option>";
                                                                }
                                                            }
                                                             ?> 
                                                        </select>
                                                        </td>  
                                                        <!-- <td><button class="btn btn-primary btn-md" onclick="myFunction()"><i class="fa fa-print"></i></button></td>
                                                        <td>
                                                        <form action="excel.php" method="post">  
                                                         <a class="btn btn-warning" href="export_excel.php" target="_new" ><i class="fa fa-download"></i> Export to Excel</a>
                                                        </form>                                           
                                                        </td>-->
                                                        <td>
                                                            <form method="POST" id="add_form">
                                                                <!-- <input type="hidden" id="admin_msg" name="admin_msg" value="Delivery Sucessful">
                                                                <input type="hidden" id="user_id" name="user_id" value="<?php //echo $row["user_id"] ?>"> -->
                                                                <input type="hidden" id="order_id" name="order_id" value="<?php echo $row["order_no"] ?>">
                                                                <input type="submit" name="addnew" id="addnew" class="btn btn-success" value="Status" >
                                                            </form>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-danger btn-md">Delete</button>
                                                            <a href="order_view.php?id=<?php echo $row["order_no"] ?>" class="btn btn-info btn-md">View</a>
                                                        </td>
                                                    </tr>
                                                <?php } }?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>No#</th>
                                                    <th>Customer Name</th>
                                                    <th>Address</th>
                                                    <th>Total</th>
                                                    <th>Status</th>
                                                    <th>Date/Time</th>
                                                    <th>Delivery Person</th>
                                                    <th>Notification</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">New Order</h5>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="getresult">
                                                <tr class="dataTables_empty">
                                                    <td colspan="2">No data available in table</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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
    <?php //include('includes/script.blade.php'); ?>
    <!-- Optional JavaScript -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="assets/libs/js/main-js.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="assets/vendor/datatables/js/buttons.bootstrap4.min.js"></script>
    <script src="assets/vendor/datatables/js/data-table.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>    
<script type = "text/javascript">

// function dataFilter(&$str_val)
// {
// 	$str_val = preg_replace("/\t/", "\\t", $str_val);
// 	$str_val = preg_replace("/\r?\n/", "\\n", $str_val);
// 	if(strstr($str_val, '"')) $str_val = '"' . str_replace('"', '""', $str_val) . '"';
// }


// $post_list = array();
 
// //get rows query
// $query = mysqli_query($con, "SELECT users.id, users.name, users.contact, users.ref_name, orders.order_id, orders.p_names, orders.quantity, orders.product_id, orders.user_id, orders.quantity, orders.address, orders.product_cost, orders.created_at  FROM users JOIN orders ON orders.user_id = users.id order by created_at Desc");
 
// //number of rows
// $rowCount = mysqli_num_rows($query);
 
// $sno = 1;
// if($rowCount > 0){
// 	while($row = mysqli_fetch_assoc($query)){
// 		$post_list[] = array( "Sno"=>$sno,  "p_names"=>$row["p_names"],  "product_cost"=>$row["product_cost"] );
// 		$sno++;
// 	}
// }


 
// // headers for exporting excel
 
// header("Content-Disposition: attachment; filename='file_name_goes_here.xls'");
 
// header("Content-Type: application/vnd.ms-excel");
 
// $title_flag = false;
// foreach($post_list as $post) {
// 	if(!$title_flag) {
// 		// Showing column names 
// 		echo implode("\t", array_keys($post)) . "\n";
// 		$title_flag = true;
// 	}
// 	// data filtering
// 	array_walk($post, 'dataFilter');
// 	echo implode("\t", array_values($post)) . "\n";
 
// }
    $(document).ready(function(){
        
        function load_unseen_notification(view = '')
        {
            $.ajax({
                url:"fetch.php",
                method:"POST",
                data:{view:view},
                dataType:"json",
                success:function(data)
                {
                $('.notification-dropdown').html(data.notification);
                if(data.unseen_notification > 0){
                $('.count').html(data.unseen_notification);
                }
                }
            });
        }
    
        load_unseen_notification();
    
        $('#add_form').on('submit', function(event){
            event.preventDefault();
            //if($('#admin_msg').val() != '' && $('#user_id').val() != '' && $('#order_id').val() != ''){
            if($('#order_id').val() != ''){
                var form_data = $(this).serialize();
                alert(form_data);
                $.ajax({
                    url:"addnew.php",
                    method:"POST",
                    data:form_data,
                    success:function(data)
                    {
                    $('#add_form')[0].reset();
                    load_unseen_notification();
                    }
                });
            }
            else{
                alert("Enter Data First");
            }
        });
    
        $(document).on('click', '.dropdown-toggle', function(){
        $('.count').html('');
        load_unseen_notification('yes');
        });
    
        setInterval(function(){ 
            load_unseen_notification();
        }, 5000);
    });

</script>
<script type="text/javascript">
    function executeQuery() {
      $.ajax({
        url: 'result.php',
        method:"POST",
        data : 'orders=new',
        success: function(data) {
            $( "#getresult" ).append( data );
            //.dataTables_empty{display: none;}                          
            if (data) {
                $('.dataTables_empty').hide();
            }
        }
      });
      setTimeout(executeQuery, 30000); // you could choose not to continue on failure...
    }

    $(document).ready(function() {
      // run the first time; all subsequent calls will take care of themselves
      setTimeout(executeQuery, 30000);
    });

</script>
<script type="text/javascript">
    function blink(selector){
        $(selector).fadeOut('slow', function(){
            $(this).fadeIn('slow', function(){
                blink(this);
            });
        });
    }
    // run the first time; all subsequent calls will take care of themselves
    setTimeout(blink("#getresult"), 10000);
</script>
</body>
 
</html>