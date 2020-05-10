<?php
//fetch.php;
if(isset($_POST["view"])){
	
	include("connection.php");
	if($_POST["view"] != ''){
		mysqli_query($connection,"UPDATE `notification` SET seen_status='1' WHERE seen_status='0'");
	}
	
	$query=mysqli_query($connection,"SELECT * from `notification` order by id desc limit 5");
	$output = '';
 
	if(mysqli_num_rows($query) > 0){
	while($row = mysqli_fetch_array($query)){
	$output .= '
	<li>
		<a href="#">
		Status: <strong>'.$row['admin_msg'].'</strong><br />
		Date: <strong>'.date('d M Y h:i a',strtotime($row['created_at'])).'</strong>
		</a>
	</li>
	<hr>
	';
	}
	}
	else{
	$output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
	}
	
	$query1 = mysqli_query($connection,"SELECT * FROM `notification` WHERE seen_status='0'");
	$count  = mysqli_num_rows($query1);
	$data = array(
		'notification'   => $output,
		'unseen_notification' => $count
	);
	echo json_encode($data);
	
}
?>