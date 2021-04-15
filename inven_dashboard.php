<?php
	include("dbconfig.php");
	session_start();
	if(!isset($_SESSION['inven_submit']))
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
		
		.nav-links button
		{
			font-size: 120%;
			color: #f27435;
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
	
		<header class="jumbotron" style="background: url(images/inven_dash.jpg); background-repeat: no-repeat; background-size: cover;">
			<div class="container">
				<div class="row">
					<div class="col-12 col-sm-9">
						<h2 class="jumbotitle">Inventory Portal</h2>
						<p class="jumbotext">A restaurant inventory consists of all the items or raw materials required to prepare dishes, and a restaurant inventory management system helps you track each ingredient used in the recipe.</p>
						<p class="jumbotext d-none d-sm-block">A restaurant inventory consists of all the items or raw materials required to prepare dishes, and a restaurant inventory management system helps you track each ingredient used in the recipe. Restaurant inventory management systems integrated with the restaurant POS allow you to control and organize every aspect of the stock, maintains a smooth flow of supply, and also helps you boost your overall profit. As the volume of business grows in a restaurant, inventory management becomes a crucial part of restaurant operations.</p>
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
							 <a class="nav-link" href="inven_dashboard.php">
								 <span class="fas fa-address-card fa-lg"></span>Dashboard
							 </a>
						 </l1>
						 <l1 class="nav-items active">
							 <a class="nav-link" href="grocery.php">
								 <span class="fa fa-list fa-lg"></span>Grocery
							 </a>
						 </l1>
 						 <l1 class="nav-items">
							 <div class="dropdown nav-links">
							 	<button class="btn dropdown-toggle drop-btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									 <span class="far fa-comment fa-lg"></span> Chat with Admin
								</button>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									<?php
										$query = 'SELECT * FROM `admin`';
										$run = mysqli_query($conn, $query);
									
										while($data = mysqli_fetch_assoc($run))
										{
											?>
												<a class="dropdown-item chat-span" href="chatting_with_admin.php">
													<span class="fas fa-user-alt fa-lg check" data-id="<?php echo $data['id'] ?>">&nbsp; &nbsp; &nbsp;<?php echo $data['username'] ?></span>
												</a>
											<?php
										}	
									?>
								</div>
							 </div>
						 </l1>
					 </ul>
					 <span class="navbar-text">
						 <a class="inven_logout" href="inven_logout.php">
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
							<dt class="col-6">ID</dt>
							<dd class="col-6"><?php echo $_SESSION['inven_id']; ?></dd>
							<dt class="col-6">Name</dt>
							<dd class="col-6"><?php echo $_SESSION['inven_name']; ?></dd>
							<dt class="col-6">Inventory Employees</dt>
							<dd class="col-6">40</dd>
						</dl>
					</div>
				</div>
			</div>
			</div>
			<div class="row">
				<div class="col-12 col-sm-12">
					<div class="card card-body bg-light simple-card">
						<blockquote class="blockquote">
							<p class="mb-0">Yor better cut the pizza in ofur pieces because I,m not hungry enough to eat six.</p>
							<footer class="blockquote-footer">Yogi Berra, <cite title="Source Title">The Wit and Wisdom of Yogi Berra, p.pepe, Diversion Books 2014</cite>
					 </footer>
						</blockquote>
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
				url: 'getadminid.php',
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