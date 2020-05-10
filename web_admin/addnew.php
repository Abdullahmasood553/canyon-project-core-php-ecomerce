<?php

if(isset($_POST["order_id"]))
{
	include('connection.php');
	//$admin_msg = mysqli_real_escape_string($connection, $_POST['admin_msg']);
	
	$order_id  = mysqli_real_escape_string($connection, $_POST['order_id']);
	//$user_id   = mysqli_real_escape_string($connection, $_POST['user_id']);
	

	/*mysqli_query($connection,"INSERT INTO notification(admin_msg, order_id, `user_id`, seen_status) VALUES('$admin_msg', '$order_id', '$user_id', 0)") or die ("query 2 incorrect (orders)");*/

	mysqli_query($connection,"UPDATE orders SET seen_status = 1 WHERE order_no = '$order_id'") or die ("query 2 incorrect (orders)");
	
}

?>