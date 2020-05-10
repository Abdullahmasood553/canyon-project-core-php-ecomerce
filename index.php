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

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Canyon | Bottles Provider</title>
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
	<section id="slider"><!--slider-->
	<div class="container">
	<div class="row">
	<div class="col-sm-12">
	<div id="slider-carousel" class="carousel slide" data-ride="carousel">
	
	
	
	<ol class="carousel-indicators">
		<li data-target="#slider-carousel" data-slide-to="0" class=""></li>
	</ol>

				<div class="carousel-inner">
					<div class="item active">
						<div class="col-sm-6">
							<h1 style="color:black;"><span>Canyon</span> Mineral Water</h1>
							<h2>Our Product</h2>
							<p>Under the circumstances where our under ground water sources are polluted and unhealthy, there is a dire need to treat water and make it healthy for drinking. We treat water with RO and complete its minerals contents to internationally defined limits, making water a definite source of health for you.</p>
						</div>
					
								<div class="col-sm-6">
									<img src="images/water.png" class="girl img-responsive" alt="">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	
	<section>
	
			<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
					<h2>Category</h2>
					<div class="panel-group category-products" id="accordian">
					
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title"><a href="#">Bottles</a></h4>
						</div>
					</div>
				</div>				
			</div>
		</div>


				
			<div class="col-sm-9 padding-right">
				<div class="features_items"><!--features_items-->
					<h2 class="title text-center">Mineral Water</h2>
					<h2 style="text-align:center; font-style:italic; font-size: 20px; font-family: sans-serif; color:red; padding: 20px; background: #f5f5f5f5;"><strong>Free Delivery at Door Step.</strong></h2>
							<?php
								include_once('connection.php');
								$query = "SELECT * FROM products ORDER BY product_id ASC";
								$result = mysqli_query($connection, $query);
								if(mysqli_num_rows($result) > 0)
								{
								while($row = mysqli_fetch_array($result))
								{ 
								?>
							<form method="POST" action="cart.php?action=add&id=<?php echo $row["product_id"];?>">		
								<div class="col-sm-4">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
													<a href="#" class="thumbnail"><img src="images/products/<?php echo $row['image']; ?>" alt='' style="width:250px; height:250px"></a>
													<h2>Rs: <?php echo $row['price']; ?> 
													<span><strike><p>Rs: <?php echo $row['c_price']; ?></p></strike></span></h2>
													<p style="color: #1673b7"><?php echo $row['product_name']; ?></p>
													<p  style="color: #1673b7; font-weight: bold;">Enter Quantity: <input type="number" name="quantity" min="1" max="500"></p>

												
												<?php if(isset($_SESSION['admin'])) { ?>
													<input type="submit" name="add_to_cart" value="Place Order" class="btn btn-primary btn-sm">
													<?php }
													else { ?>
													<p>Please loggedin to place order!!</p> <?php } ?> 
													


													<input type="hidden" name="hidden_name" value="<?php echo $row['product_name'] ?>" />	
													<input type="hidden" name="hidden_image" value="<?php echo $row['image'];?>">
													<input type="hidden" name="hidden_price" value="<?php echo $row['price'];?>">
													<input type="hidden" name="product_id" value="<?php echo $row['product_id'];?>">
											</div>
										<img src="images/new.jpg" class="new" alt=""></div>
									</div>
								</div>
							</form>	
						<?php } } ?>	
					</div>				
				</div>
			</div>				
		</div>
</section>
			<br>
	
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