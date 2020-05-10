<?php
ob_start();
session_start();
require_once 'connection.php';



if (isset($_POST['btn-login'])) {

	$contact = $_POST['contact'];  
	$stmt = $connection->prepare("SELECT * FROM users WHERE contact= ?");
	$stmt->bind_param("s", $contact);

    /* execute query */
    $stmt->execute();
    //get result
    $res = $stmt->get_result();
    $stmt->close();

    $row = mysqli_fetch_array($res, MYSQLI_ASSOC);

    $count = $res->num_rows;
    if ($count == 1 && $row['contact'] == $contact) {
        $_SESSION['admin'] = $row['id'];
        header("Location: index.php");
    } elseif ($count == 1) {
        $errMSG = "Bad password";
    }
     else $errMSG = "User not found! Please provide correct detail";
}
?>




<?php
if (isset($_POST['signup'])) {

    $name     	 = trim($_POST['name']);
	$contact     = trim($_POST['contact']);
	$address     = trim($_POST['address']);
	$ref_name    = trim($_POST['referal']);

    

    // check email exist or not
    $stmt = $connection->prepare("SELECT contact FROM users WHERE contact=?");
    $stmt->bind_param("s", $contact);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    $count = $result->num_rows;

	// if email is not found add user
	if ($count == 0) { 

		if($contact == $contact){

        $stmts = $connection->prepare("INSERT INTO users(`name`, `contact`, `address`, `ref_name`) VALUES(?, ?, ?, ?)");
        $stmts->bind_param("ssss", $name, $contact, $address, $ref_name);
		$res = $stmts->execute();//get result
		if($res){
		$errTyp = "User Created Successfully.";
		}
        $stmts->close();

        $user_id = mysqli_insert_id($connection);
        if ($user_id > 0) {
			// set session and redirect to index page
            $_SESSION['users'] = $user_id; 
            if (isset($_SESSION['users'])) {
                print_r($_SESSION);
					header("Location: index.php");
					$errMSG= "Student Record Deleted successfully";						
                exit;
			}
		}
	}
	
		else {
            $errTyp = "danger";
            $errMSG =  "passwords doesn't match";
		}	
}
	
	else {
        $errTyp = "warning";
        $errMSG = "Registration number already exists";
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
    <title>Canyon Mineral Water</title>
    <link href="layout/css/bootstrap.min.css" rel="stylesheet">
    <link href="layout/css/font-awesome.min.css" rel="stylesheet">
    <link href="layout/css/prettyPhoto.css" rel="stylesheet">
    <link href="layout/css/price-range.css" rel="stylesheet">
    <link href="layout/css/animate.css" rel="stylesheet">
	<link href="layout/css/main.css" rel="stylesheet">
	<link href="layout/css/responsive.css" rel="stylesheet">
    <link rel="shortcut icon" href="images/canyon.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head><!--/head-->


<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="index.php"><i class="fa fa-phone"></i> 0303-4408991</a></li>
								<li><a href="index.php"><i class="fa fa-envelope"></i> canyon.mineral.water@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href=""><i class="fa fa-facebook"></i></a></li>
								<li><a href=""><i class="fa fa-twitter"></i></a></li>
								<li><a href=""><i class="fa fa-linkedin"></i></a></li>
								<li><a href=""><i class="fa fa-dribbble"></i></a></li>
								<li><a href=""><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle">
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.php">
							<img src="images/canyon.png"  style="width:100px"alt=""></a>
						</div>
					</div>
			
			<div class="col-sm-8">
				<div class="shop-menu pull-right">
						<ul class="nav navbar-nav">
							<li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
							<li><a href="#"><i class="fa fa-user"></i> Account</a></li>
							<li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
							<li><a href="login.php"><i class="fa fa-lock"></i> Login</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.html">Home</a></li>
									<li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
										<ul role="menu" class="sub-menu"> 
											<li><a href="cart.php">Cart</a></li> 
											<li><a href="#">Login</a></li> 
										</ul>
									</li> 
								<li><a href="contact-us.html">Contact</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	<section id="form" ><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-3">
					<div class="login-form"><!--login form-->
		

						<?php
							if (isset($errMSG)) {
								?>
								<div class="form-group">
									<div class="alert alert-danger">
										<span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
									</div>
								</div>
								<?php
							}
						?>


					</div><!--/login form-->
				</div>

				
				<div class="col-sm-6">
					<div class="signup-form"><!--sign up form-->
						<h2><strong>Login </strong></h2>
						<form action="" method="POST">
							<input type="text" name="contact" placeholder="Enter Contact"/>
							<button type="submit"  name="btn-login" class="btn btn-default">Sign In</button>
						</form>
					</div><!--/sign up form-->
				</div>

				<div class="col-sm-6">
					<div class="signup-form"><!--sign up form-->
						<h2><strong>Sign Up</strong></h2>
						<form action="#" method="post">
							<input type="text" name="name" placeholder="Name"/>
							<input type="text" name="contact" placeholder="Cell"/>
							<input type="text" name="address" placeholder="Address"/>
							<input type="text" name="referal" placeholder="Enter Referal name"/>
							<button type="submit" name="signup" class="btn btn-default">Sign Up</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	
	
	<?php include("include/footer.php"); ?>
			<script src="layout/js/jquery.js"></script>
			<script src="layout/js/bootstrap.min.js"></script>
			<script src="layout/js/jquery.scrollUp.min.js"></script>
			<script src="layout/js/price-range.js"></script>
			<script src="layout/js/jquery.prettyPhoto.js"></script>
			<script src="layout/js/main.js"></script>
			<a id="scrollUp" href="#top" style="display: none; position: fixed; z-index: 2147483647;">
			<i class="fa fa-angle-up"></i>
			</a>
</body>
</html>