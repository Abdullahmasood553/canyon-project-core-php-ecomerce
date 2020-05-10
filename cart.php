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
/*print_r($userRow);
die;*/


if(isset($_POST["add_to_cart"])) {	
	
	// $quantity	= $_POST['quantity'];
	// mysqli_query($connection,"INSERT INTO orders( quantity) VALUES ('$quantity')") or die ("query 2 incorrect");
	if(isset($_SESSION["shopping_cart"])) {

	  	$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
	  	if(in_array($_GET["id"], $item_array_id)) {
			$_SESSION['shopping_cart'][$_GET["id"]]["item_quantity"] += $_POST["quantity"];
	  	} else {
		  	//$count = count($_SESSION["shopping_cart"]);
			$id = $_GET["id"];
			  //get all item detail
			$item_array = array(
					'item_id'       =>   $id,
					'product_img'   =>   $_POST["hidden_image"],
					'item_name'     =>   $_POST["hidden_name"],
					'item_price'    =>   $_POST['hidden_price'],
					'item_quantity' =>   $_POST["quantity"]	
			  );
			$_SESSION["shopping_cart"][$id] = $item_array;
			//product added then this block 
			//echo '<script>alert("Item allready added ")</script>';
			//echo '<script>window.location = "index.php"</script>';
	  	}
	} else {
	  	//cart is empty excute this block
	   	$item_array = array(
				'item_id'       =>   $_GET["id"],
				'product_img'   =>   $_POST["hidden_image"],
				'item_name'     =>   $_POST["hidden_name"],
				'item_price'    =>   $_POST['hidden_price'],
				'item_quantity' =>   $_POST["quantity"]
		  	);
		$_SESSION["shopping_cart"][$_GET["id"]] = $item_array;
	}
}
//Remove item in cart
if(isset($_GET["action"])) {	
	if($_GET["action"] == "delete") {
	  	foreach($_SESSION["shopping_cart"] as $key=>$value) {
			if($value["item_id"] == $_GET["id"]) {
			  	unset($_SESSION["shopping_cart"][$key]);
			  	echo '<script>alert("Item removed")</script>';
			  	echo '<script>window.location="index.php</script>';
			}	
		}
	}
}
?>
<?php //Empty cart code
if(isset($_POST['success'])) {
	if(isset($_POST['cmd']) && $_POST['cmd']=="emptycart") {
		unset($_SESSION["shopping_cart"]);
	}
}
?>
<?php //Cancel cart
if(isset($_GET['cmd']) && $_GET['cmd']=="emptycart") {
	unset($_SESSION["shopping_cart"]);
}
?>
<?php //section 3
$cartOutput="";
if(!isset($_SESSION["shopping_cart"]) || count ($_SESSION["shopping_cart"]) < 1 ) {
	$cartOutput="<h2 align='center'> Your shopping cart is empty</h2>";
} else {
	$i=0;
	foreach($_SESSION["shopping_cart"]as $each_item) {
		$i++;
		while(list($key, $value)= each($each_item)){			
		}
	}
}

// Order Confirmed and Store in db
if(isset($_POST['submit'])) {
	$finalcode  =  'CBI-'.rand(10000, 99999);
	$user_id 	=  $userRow['id'];
	$cname 		=  $userRow['name'];
	$contact 	=  $userRow['contact'];
	$address 	=  $userRow['address'];
	$total      =  $_POST['total'];	

	if(!isset($_SESSION['shopping_cart']) || count($_SESSION['shopping_cart'])) {

		// data insert in db 
		mysqli_query($connection,"INSERT INTO orders(order_no, total, p_names, address, contact, user_id, seen_status, new_order) VALUES ('$finalcode','$total', '$cname', '$address', '$contact', '$user_id', 0, 0)") or die ("query 2 incorrect (orders)");

		mysqli_query($connection,"INSERT INTO notification(admin_msg, order_id, `user_id`, seen_status) VALUES('Delivery Sucessful', '$finalcode', '$user_id', 0)") or die ("query 2 incorrect (notification)");

		foreach ($_SESSION["shopping_cart"] as $key) {
			//print_r($_SESSION["shopping_cart"]);
			// print_r($_SESSION["shopping_cart"][$key]['item_quantity']);		
			$id = $key['item_id'];
			$item_quantity = $key['item_quantity'];
			// echo 'The value of quantity is '.$item_quantity;
			// exit();
			//query
			 $results =  mysqli_query($connection,"SELECT product_id, product_name, price FROM products WHERE product_id ='$id'  Limit 1");
			while($row = mysqli_fetch_array($results)) {
				$id    	= $row["product_id"];
				$name 	= $row["product_name"];
				$price  = $row['price'];
			}
			/*mysqli_query($connection,"INSERT INTO orders(p_names, product_id, `address`, `user_id`, product_cost, `quantity`) VALUES ('$name','$id', '$address', '$user_id', '$price', '$item_quantity')") or die ("query 2 incorrect");*/
			mysqli_query($connection,"INSERT INTO order_items(order_no, product_id, `product_name`, `quantity`, product_cost) VALUES ('$finalcode','$id', '$name', '$item_quantity', '$price')") or die ("query 2 incorrect (order items");
			unset($_SESSION["shopping_cart"]);
			header("location: success_msg.php?success=1");
		}
	}
}
?>


		<!DOCTYPE html>
		<html lang="en">
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<meta name="description" content="">
			<meta name="author" content="">
			<title>Canyon | Water Company</title>
			<link href="layout/css/bootstrap.min.css" rel="stylesheet">
			<link href="layout/css/font-awesome.min.css" rel="stylesheet">
			<link href="layout/css/prettyPhoto.css" rel="stylesheet">
			<link href="layout/css/price-range.css" rel="stylesheet">
			<link href="layout/css/animate.css" rel="stylesheet">
			<link href="layout/css/main.css" rel="stylesheet">
			<link href="layout/css/responsive.css" rel="stylesheet">
			<link rel="shortcut icon" href="images/favicon.ico">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		</head><!--/head-->

						<body> 
							<?php include("include/header.php");?> 
								<section id="cart_items">
									<div class="container">
										<?php  //success message
										if(isset($_POST['success'])) {
										$success = $_POST["success"];
										echo "<h1 style='color:#1673b7'>Your Order has been placed Succesfully &nbsp;&nbsp;  <i class='fa fa-check'></i></h1>";
										} else {
										?>
										<div class="table-responsive cart_info">
											<table class="table table-condensed">
												<thead>
													<tr class="cart_menu">
														<td class="image"><strong>ITEM</strong></td>
														<td class="description"><strong>DETAILS</strong></td>
														<td class="total"><strong>PRICE</strong></td>
														<td class="quantity">Quantity</td>
														<td class="total">Total</td>
														<td>Action</td>
													</tr>
												</thead>
												<tbody>    
												<?php 
													if(!empty($_SESSION["shopping_cart"]))
														{
														$i = 1;	
														$total = 0;	
														foreach($_SESSION["shopping_cart"] as $key => $value)
														{ ?>
													<tr>
													<td class='cart_product' style='margin-right:40px'><a href='#'>
													<img src='images/products/<?php echo $value['product_img']; ?>' style='width:80px; height:80px; border:outset #1673b7'></a></td>  

													<td class='cart_total'>
															<p class='cart_total_price'> <?php echo $value['item_name']; ?></p>
														</td>

														<td class='cart_total'>
															<p class='cart_total_price'>Rs <?php echo $value['item_price']; ?></p>
														</td>
														
														<td class='cart_total'>
															<p class='cart_total_price'><?php echo $value['item_quantity']; ?></p>
														</td>
														<td><p class='cart_total_price'>Rs <?php echo number_format($value["item_quantity"] * $value["item_price"],2);?></p></td> 
														<td>
															<a href="cart.php?action=delete&id=<?php echo $value['item_id']; ?>" class="btn btn-danger btn-md"><i class="fa fa-trash"></i></a>
														</td>
													</tr>
													
														<?php $total = $total + ($value["item_quantity"] * $value['item_price']); } ?>
															
													<tr>  
														<td colspan="5" align="right" class='cart_total_price'>Total</td> 
						                                <td class='cart_total_price' > Rs <?php echo number_format($total);?></td>
						                          	</tr>
												<?php } ?>
												</tbody>
											</table>
										</div>
										<div class="container" align="center">
											<a class="btn btn-default check_out " style="font-size:16px; padding:7px" href="index.php">Continue Shopping</a>
											<!-- <a class="btn btn-default check_out " style="font-size:16px; padding:7px"  href="form.php">Continue to Payment</a> -->							
											<form action="cart.php" method="post" name="form1" style="display: inline-block;">
												<input type="hidden" name="total" value="<?php echo $total; ?>">
												<!--<input type="hidden" name="id" value="<?php echo $userRow['id']; ?>">-->
												<button type="submit" name="submit" class="btn btn-primary" style="font-size: 16px;padding: 7px;margin-left: 16px;" >Confirm Order</button>
											</form>
											<a class="btn btn-default check_out " style="font-size:16px; padding:7px"  href="cart.php?cmd=emptycart">Cancel Shopping</a>
										</div>
										<?php } ?>
									</div>
								</section> <!--/#cart_items-->
								<section id="do_action">
									
								</section><!--/#do_action-->
	
			<?php include("include/footer.php"); ?>
				<script src="layout/js/jquery.js"></script>
				<script src="layout/js/bootstrap.min.js"></script>
				<script src="layout/js/jquery.scrollUp.min.js"></script>
				<script src="layout/js/price-range.js"></script>
				<script src="layout/js/jquery.prettyPhoto.js"></script>
				<script src="layout/js/main.js"></script>
			<a id="scrollUp" href="#top" style="display: none; position: fixed; z-index: 2147483647;">
			<i class="fa fa-angle-up">
		</i></a>
	</body>
</html>