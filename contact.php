<?php  
 // Message Vars
 $msg = '';
 $msgClass = '';

// Check for submit
if(filter_has_var(INPUT_POST, 'submit')) {
	// Get Form Data
	$name    =  htmlspecialchars($_POST['name']);
	$email   =  htmlspecialchars($_POST['email']);
	$message =  htmlspecialchars($_POST['message']);

	// Check required fields
	if(!empty($email) && !empty($name) && !empty($message)) {
		// Check Email
		if(filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
			// Failed
			$msg = 'Please enter valid email';
			$msgClass = 'alert-danger';
		}
		else {
			// Passed
			// Recipent Email
			$toEmail = 'canyon.mineral.water@gmail.com';
			// Subject
			$subject = 'Contact Request From '.$name;
			$body = '<h2>Contact Request</h2>
					<h4>Name</h4><p>'.$name.'</p>
					<h4>Email</h4><p>'.$email.'</p>
					<h4>Message</h4><p>'.$message.'</p>
			';
			// Email Headers
			$headers = "MINE-Version: 1.0" ."\r\n";
			$headers .="Content-Type:text/html;charset=UTF-8" . "\r\n";

			// Additional Headers
			$headers .="From: " .$name. "<".$email.">". "\r\n";

			if(mail($toEmail, $subject, $body, $headers)) {
				$msg = 'Your email has been sent';
				$msgClass = 'alert-success';
			} else {
				// Failed
				$msg = 'Your email has not sent';
				$msgClass = 'alert-danger';
			}
		}
	} else {
		// Failed
		$msg = 'Please fill in all fields';
		$msgClass = 'alert-danger';
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
    <title>Home|E-Shopper</title>
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
	 
	 <div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">    			   			
					<h2 class="title text-center">Contact <strong>Us</strong></h2>    			    			
				</div>

				<?php if($msg != ''): ?>
						<div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
				<?php endif ?>		 		
			</div>    	
    		
			
			<div class="row">  	
	    		<div class="col-sm-8">
	    			<div class="contact-form">
	    				<h2 class="title text-center">Get In Touch</h2>
							<div class="status alert alert-success" style="display: none"></div>
				    			<form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" class="contact-form row" >
									<div class="form-group col-md-6">
										<input type="text" name="name" class="form-control" required placeholder="Name">
									</div>

									<div class="form-group col-md-6">
										<input type="email" name="email" class="form-control" required placeholder="Email">
									</div>


									<div class="form-group col-md-12">
										<textarea name="message" id="message" required class="form-control" rows="8" placeholder="Your Message Here"></textarea>
									</div>

									<div class="form-group col-md-12">
									<input type="submit" class="btn btn-default btn-primary " name="submit" value="Submit">
									</div>
				        	</form>
	    				</div>
	    			</div>
	    		
				
				<div class="col-sm-4">
	    			<div class="contact-info">
	    				<h2 class="title text-center">Contact US</h2>
	    				<address>
	    					<p class="text-center" style="color: #000000;"><img src="images/canyon.png" alt=""> <br></p>

							<!-- <p class="text-center" style="color: #000000;">Lahore Pakistan</p> -->
							<p style="color: #000000; margin-top: 25px;"><strong>Contact:</strong> 0303-4408991</p>
							<br>
							<p style="color: #000000;"><strong>Email:</strong><span style="color: blue"> canyon.mineral.water@gmail.com</span></p>
							<br>
							<p style="color: #000000;"><strong>Address:</strong><span style="font-style:italic;">13-B, Public Health Society <br> Main Boulevard LDA Avenue-1, Raiwind Road, Lahore</span></p>
	    				</address>
	    				<div class="social-networks">
	    					<h2 class="title text-center">Social Networking</h2>
							<ul>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></a></i>
								<li><a href="#"><i class="fa fa-youtube"></i></a></li>
							</ul>
	    				</div>
	    			</div>
    			</div>    			
	    	</div>  
    	</div>	
    </div>


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