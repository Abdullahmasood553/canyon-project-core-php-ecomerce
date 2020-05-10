	<header id="header">
		<div class="header_top">
			<div class="container">
				<div class="row">		
						<div class="col-sm-6">
							<div class="contactinfo">
									<ul class="nav nav-pills">
											<li><a href="index.php"><i class="fa fa-phone"></i> 0303-4408991</a></li>
											<li><a href="index.php"><i class="fa fa-envelope"></i> canyon.mineral.water@gmail.com</a></li>
											<li><a href="history.php" style="color: #1673b7;"><i class="fa fa-history" aria-hidden="true"></i> Check History</a></li>
											<li><a href="index.php" style="color: #1673b7"><i class="fa fa-user"></i> <?php echo $userRow['name']; ?></li>
											
									</ul>
								</div>
							</div>
							
							
						<div class="col-sm-6">
							<div class="social-icons pull-right">
								<ul class="nav navbar-nav">
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
									<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
									<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		
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
							<?php if(isset($_SESSION['admin'])) { ?>
								<li><a href="logout.php?logout"> <i class="fa fa-unlock"></i>Logout</a></li>
							<?php } else { ?>  <li><a href="login.php"> <i class="fa fa-lock"></i>Login</a></li> <?php } ?> 
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	
		<div class="header-bottom">
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
									<li><a href="index.php">Home</a></li>
									<li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
										<ul role="menu" class="sub-menu"> 
											<li><a href="cart.php">Cart</a></li> 
											<li><a href="#">Login</a></li> 
										</ul>
									</li> 
									<li><a href="contact.php">Contact</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header><!--/header-->