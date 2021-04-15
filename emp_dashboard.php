<?php
	include("dbconfig.php");
	session_start();
	if(!isset($_SESSION['emp_submit']))
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
		
		.card-menu
		{
			margin-bottom: 5%;
		}
		
		.card-body
		{
			
		}
	</style>
</head>
<body>
	
		<header class="jumbotron" style="background: url(images/employee.jpg); background-repeat: no-repeat; background-size: cover;">
			<div class="container">
				<div class="row">
					<div class="col-12 col-sm-9">
						<h2 class="jumbotitle">POS Employee Portal</h2>
						<p class="jumbotext">A point of sale (POS) is a place where a customer executes the payment for goods or services and where sales taxes may become payable. A POS transaction may occur in person or online, with receipts generated either in print or electronically.</p>
						<p class="jumbotext d-none d-sm-block">Modern POS systems are commonly programmable or allow enhancement with third-party software programs. These systems can be tailored to meet specific needs. For example, many retailers use POS systems to manage membership programs that award points to frequent buyers and issue discounts on future purchases.</p>
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
							 <a class="nav-link" href="emp_dashboard.php">
								 <span class="fas fa-address-card fa-lg"></span>Dashboard
							 </a>
						 </l1>
						 <l1 class="nav-items active">
							 <a class="nav-link" href="shopping.php">
								 <span class="fas fa-drumstick-bite fa-lg"></span>Menu
							 </a>
						 </l1>
					 </ul>
					 <span class="navbar-text">
						 <a class="inven_logout" href="emp_logout.php">
						 	<span class="fa fa-sign-in"></span> Logout
						 </a>
					 </span>
				 </div>
			 </div>
		</nav>
	
		<div class="container">
			<div class="row">
			<div class="col-12 col-sm-6">
				<div class="card card-menu">
						 <h3 class="card-header card-hd-color text-white">Customer Satisfaction</h3>
						 <div class="card-body">
							 <dl class="row">
								 <img src="images/POS.jpg" class="img-fluid rounded-circle">
							 </dl>
						 </div>
				</div>
			</div>
			<div class="col-12 col-sm-6">
				<div class="card">
					<h3 class="card-header card-hd-color text-white">Pofile</h3>
					<div class="card-body">
						<dl class="row">
							<dt class="col-6">ID</dt>
							<dd class="col-6"><?php echo $_SESSION['emp_id']; ?></dd>
							<dt class="col-6">Name</dt>
							<dd class="col-6"><?php echo $_SESSION['emp_name']; ?></dd>
							<dt class="col-6">POS Employees</dt>
							<dd class="col-6">20</dd>
						</dl>
					</div>
				</div>
			</div>
			</div>
		</div>
		
<script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="./script/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
		
</script>
</body>
</html>