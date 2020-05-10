<?php
//include("check_session.php");
include("connection.php");  

if(isset($_POST["orders"])) {
    $result=mysqli_query($connection,"SELECT * FROM orders WHERE new_order = 0") or die ("query 1 incorrect.....");
    if ($result->num_rows > 0) {
    // output data of each row
    while($order = $result->fetch_assoc()) {
        	//echo $order->id;
        	?>
            <tr class="text-danger">
                <td>
                    <?php echo $order['p_names']; ?><br>
                    <small>(<?php echo $order['contact']; ?>)</small>
                </td>
                <td>
                    <a href="order_view.php?id=<?php echo $order["order_no"]; ?>" class="btn btn-danger btn-sm"><i class="fas fa-eye"></i></a>
                </td>
            </tr>
        	<?php
            $id = $order["order_no"];
            mysqli_query($connection,"UPDATE orders SET new_order = 1 WHERE order_no = '$id'") or die ("query 2 incorrect");
        }
    } else {
    	
    }
}


?>