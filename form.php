<?php  

	session_start();
	include('connection.php');

	// select logged in users detail
	$res = $connection->query("SELECT * FROM users WHERE id=" . $_SESSION['admin']);	
	$userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);


	if(isset($_POST['submit'])) {
		$user_id 		= 	$_POST['id'];
		$address 		= 	$_POST['address'];
		$quantity       =   $_POST['quantity'];
		if(!isset($_SESSION['shopping_cart']) || count($_SESSION['shopping_cart'])) {
			foreach ($_SESSION["shopping_cart"] as $key) {
				print_r($_SESSION["shopping_cart"]);
				// print_r($_SESSION["shopping_cart"][$key]['item_quantity']);	
	
			
				$id = $key['item_id'];
			
				// $item_quantity = $key['item_quantity'];
				// echo 'The value of quantity is '.$item_quantity;
				// exit();
	
				//query
				 $results =  mysqli_query($connection,"SELECT product_id, product_name, price FROM products WHERE product_id ='$id'  Limit 1");


				while($row = mysqli_fetch_array($results))
				{
					$id    	= $row["product_id"];		
					$name 	= $row["product_name"];
					$price   = $row['price'];
									
				}
	
				mysqli_query($connection,"INSERT INTO orders(p_names, product_id, `address`, `user_id`, product_cost, `quantity`) VALUES ('$name','$id', '$address', '$user_id', '$price', '$quantity')") or die ("query 2 incorrect");
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
		<title>Canyon | Water Supply</title>
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
	<?php include("include/header.php"); ?>

	<section id="cart_items">
		<div class="container">
		<div class="register-req">
				<p>Please Fill your form carefully so that you get your Order correlty</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
                <div class="col-sm-1">
						<div class="order-message">

						<form></form>
						</div>
					</div>
						
			<div class="col-sm-8 clearfix">
				<div class="bill-to">
					<p>Information Form</p>
						<div class="form-one">
							<form action="form.php" method="post" name="form1">
								<input type="text" name="address" placeholder="Address *" required>	
								<input type="hidden" name="id" value="<?php echo $userRow['id']; ?>">
								<input type="hidden" name="quantity" value="<?php  foreach($_SESSION["shopping_cart"] as $key)  ?>
								<?php print_r($_SESSION["shopping_cart"][0]['item_quantity'])   ?>">
													
								<a class="btn btn-primary" href="cart.php?cmd=emptycart">Cancel</a>
								<button type="submit" name="submit" class="btn btn-primary" >Confirm Order</button>
							</div>
						</div>				
					</form>
				</div>
			</div>
		</div>
	</div>
</section> <!--/#cart_items--><br>


			<?php include("include/footer.php"); ?>
			<script src="layout/js/jquery.js"></script>
			<script src="layout/js/bootstrap.min.js"></script>
			<script src="layout/js/jquery.scrollUp.min.js"></script>
			<script src="layout/js/price-range.js"></script>
			<script src="layout/js/jquery.prettyPhoto.js"></script>
			<script src="layout/js/main.js"></script>
			<a id="scrollUp" href="#top" style="display: none; position: fixed; z-index: 2147483647;">
			<i class="fa fa-angle-up"></i></a>
	</body>
</html>