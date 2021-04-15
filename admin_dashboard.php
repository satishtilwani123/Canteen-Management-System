<?php
	include("dbconfig.php");

	session_start();
	if(!isset($_SESSION['submit']))
	{
		?>
			<h1 style="text-align:center; color:#f27435;">You are not Login:</h1>
		<?php
		exit(1);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>dashboard</title>
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">
	<style>
		body
		{
			background-color: #e6e8eb;
		}
		
		.simple-card
		{
			margin-top: 5%;
			margin-bottom: 3%;
		}
		
		.nav-title
		{
			font-weight: bold;
			color: #f27435;
			font-size: 150%;
		}
		
		.navbar
		{
			background-color: white;
			color: black;
			padding: 2%;
		}
		
		.nav-color
		{
			background-color: #f27435;
			color: white;
			font-weight: bold;
		}

		.nav-link
		{
			font-size: 120%;
		}
		
		.jumbotron
		{
			padding-top: 20%;
			padding-bottom: 30%;
		}
		
		.jumbotext
		{
			font-size: 120%;
			color: white;
			font-style: italic
		}
		
		.jumbotitle
		{
			color: white;
		}
		
		.card-hd-color
		{
			background-color: #f27435;
		}
		
		.inven_logout
		{
			color: #f27435;
			font-size: 120%;
		}
		
		.inven_logout:hover
		{
			text-decoration: none;
			font-weight: bold;
			cursor: grab;
			color: #f27435;
		}
		
		.navbar-toggler
		{
			background-color: #f27435;
			color: white;
		}
		
		.nav-link
		{
			color: #f27435;
		}
		
		.nav-link:hover
		{
			color: #f27435;
		}
		
		.nav-link span
		{
			margin-right: 5px
		}
		
		.carousel
		{
			margin-top: 5%;
			margin-bottom: 5%;
			border: 5px solid #cccbca;
		}
		
		.nav-links button
		{
			font-size: 120%;
			color: #f27435;
		}
		
		.drop1
		{
			font-size: 120%;
			color: #f27435;
		}
		
		.drop1 span
		{
			margin-right: 5%;
		}
		
		.nav-links button:hover
		{
			color: #f27435;
		}
		
		.chat-span span
		{
			margin-right: 5%;
		}
	</style>
</head>
<body>
	
		<header class="jumbotron" style="background: url(images/adminimg.jpg); background-repeat: no-repeat; background-size: cover;">
			<div class="container">
				<div class="row">
					<div class="col-12 col-sm-9">
						<h2 class="jumbotitle">Admin Portal</h2>
						<p class="jumbotext">Restaurant administrators, often called restaurant managers, are in charge of the day-to-day operation of a restaurant. They make sure the place is operating smoothly, under budget and lawfully while doing their best to ensure customer satisfaction and generate repeat business.</p>
						<p class="jumbotext d-none d-sm-block">Another concern for the restaurant manager is ensuring customer satisfaction. Part of restaurant administration is being responsible for the quality and presentation of the food and being sure the food complies with the company's and the government's sanitation standards. This job entails being skilled at dealing with irate customers, defusing the situation and having the customer walk away with the best possible view of the establishment. The primary task of the restaurant administrator, like most bosses, is to ensure the business is turning a profit.</p>
					</div>
				</div>
			</div>
		</header>
	
		<nav class="navbar navbar-expand-sm fixed-top">
			 <div class="container">
				 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
				 	<span class="fa fa-bars"></span>
				 </button>
				 <a class="navbar-brand nav-title" href="Home.php">
					 <i class="fa fa-calculator"></i>Point of Sale
				 </a>
				 <div class="collapse navbar-collapse" id="Navbar">
					 <ul class="navbar-nav mr-auto">
						 <l1 class="nav-items active">
							 <a class="nav-link" href="admin_dashboard.php">
								 <span class="fas fa-address-card fa-lg"></span>Dashboard
							 </a>
						 </l1>
						 <l1 class="nav-items active">
							 <a class="nav-link" href="emp_management.php">
								 <span class='far fa-address-book fa-lg'></span>Employee Management
							 </a>
						 </l1>
 						 <l1 class="nav-items">
							 <div class="dropdown nav-links">
							 	<button class="btn dropdown-toggle drop-btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									 <span class="far fa-comment fa-lg"></span> Chat with Inventory
								</button>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									<?php
										$query = 'SELECT * FROM `inventory`';
										$run = mysqli_query($conn, $query);
									
										while($data = mysqli_fetch_assoc($run))
										{
											?>
												<a class="dropdown-item chat-span" href="chatting_with_Inven.php">
													<span class="fas fa-user-alt fa-lg check" data-id="<?php echo $data['id'] ?>">&nbsp; &nbsp; &nbsp;<?php echo $data['username'] ?></span>
												</a>
											<?php
										}	
									?>
								</div>
							 </div>
						 </l1>
						 <l1 class="nav-items">
							 <div class="dropdown nav-links">
							 	<button class="btn dropdown-toggle drop-btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									 <span class="fa fa-window-maximize fa-lg"></span> Others
								</button>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									<a class="dropdown-item drop1" href="sales.php">
										<span class='fas fa-poll-h fa-lg'></span><label>Sales</label>
									</a>
									<a class="dropdown-item drop1" href="Add_Dishes.php">
										<span class='fas fa-hamburger fa-lg'></span><label>ADD Dishes</label>
									</a>
									<a class="dropdown-item drop1" href="Add_grocery.php">
										<span class='fas fa-egg fa-lg'></span><label>ADD Groceries</label>
									</a>
								</div>
							 </div>
						 </l1>
					 </ul>
					 <span class="navbar-text">
						 <a class="inven_logout" href="admin_logout.php">
						 	<span class="fa fa-sign-in"></span> Logout
						 </a>
					 </span>
				 </div>
			 </div>
		</nav>
	
		<div class="container">
			<div class="row">
			<div class="col-12 col-sm-6">
				<h3>OUR HISTORY:</h3>
				<p>Started in 2010, Ristorante con Fusion quickly established itself as a culinary icon par excellence in Hong Kong. With its unique brand of world fusion cuisine that can be found nowhere else, it enjoys patronage from the A-list clientele in Hong Kong. Featuring four of the best three-star Michelin chefs in the world, you never know what will arrive on your plate the next time you visit us.</p>
				<p>The restaurant traces its humble beginnings to The Frying Pan, a successful chain started by our CEO, Mr. Peter Pan, that featured for the first time the world's best cuisines in a pan.</p>
			</div>
			<div class="col-12 col-sm-6">
				<div class="card">
					<h3 class="card-header card-hd-color text-white">Pofile</h3>
					<div class="card-body">
						<dl class="row">
							<dt class="col-6">Name</dt>
							<dd class="col-6"><?php echo $_SESSION['admin_username']; ?></dd>
							<dt class="col-6">Total Admins</dt>
							<dd class="col-6">1</dd>
						</dl>
					</div>
				</div>
			</div>
			</div>
			<div class="row">
				<div class="col-12 col-sm-12">
					<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
					  <ol class="carousel-indicators">
						<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					  </ol>
					  <div class="carousel-inner">
						<div class="carousel-item active">
						  <img class="d-block w-100" src="images/slide1.jpg" alt="First slide">
						  <div class="carousel-caption">
							<h5>Restaurant</h5>
							<p class="d-none d-md-block">Your restaurant gives potential customers a window into what it's like to dine at your restaurant.</p>
						  </div>
						</div>
						<div class="carousel-item">
						  <img class="d-block w-100" src="images/slide2.jpg" alt="Second slide">
						  <div class="carousel-caption">
							<h5>Food</h5>
							<p class="d-none d-md-block">your dishes. People are driven by their senses, and by using simple yet tantalizing terms that speak to the each of the five senses, you paint a clear picture of what diners can expect from the dish.</p>
						  </div>
						</div>
						<div class="carousel-item">
						  <img class="d-block w-100" src="images/slide3.jpg" alt="Third slide">
						  <div class="carousel-caption">
							<h5>Kitchen</h5>
							<p class="d-none d-md-block">A typical restaurant kitchen has a layout featuring several different stations. A station is a designated area where a certain type of food is prepared.</p>
						  </div>
						</div>
					  </div>
					  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					  </a>
					  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					  </a>
					</div>
				</div>
			</div>
		</div>
		
<script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="./script/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
		$(document).ready(function(){
			
		 $('.check').click(function(){
		   
			var el = this;
		    var id = $(this).data('id');
			
			$.ajax({
				type: 'post',
				url: 'getinventoryid.php',
				data: {id:id}
			}).done(function( msg )
			   {
			   		// see alert is come or not
			   });

		 });

		});
</script>
</body>
</html>