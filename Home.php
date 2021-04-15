<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>dashboard</title>
	<link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">
	<script type="text/javascript">
		window.onload = function()
		{
        	location.href=document.getElementById("selectbox").value;
    	}   
	</script>
	<style>
		body
		{
			background-color: #e6e8eb;
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

		.design
		{
			float: right;
		}
		
		.card-des
		{
			padding-bottom: 0%;
		}
		
		.simple-card
		{
			margin-top: 5%;
			margin-bottom: 3%;
		}
		
		.card-txt
		{
			font-size: 110%;
		}
		
		.card-menu
		{
			margin-bottom: 5%;
		}
		
		.nav-title
		{
			font-weight: bold;
			color: #f27435;
			font-size: 150%;
		}
	</style>
</head>
<body>
	
		<header class="jumbotron" style="background: url(images/download.jpg); background-repeat: no-repeat; background-size: cover;">
			<div class="container">
				<div class="row">
					<div class="col-12 col-sm-9">
						<p class="jumbotext">POS stands for Point Of Sale, a system that is used throughout the restaurant and retail industry. ... This computerized system allows business owners to track sales, cash flow, food inventory and can help simplify your bookkeeping enormously.</p>
						<p class="jumbotext d-none d-sm-block">One benefit of a POS system is that it simplifies communications between the kitchen and the wait staff. Orders go through the computer, directly to the kitchen printer. Another benefit of a restaurant POS program is that it can track everything from food usage to the most popular menu items. Because the POS system acts as a time clock, it can also help prepare payroll. This can save you a lot of money in your bookkeeping department. Along with the daily operations of running a restaurant, a POS system can organize profit and loss statement and sales tax.</p>
					</div>
				</div>
			</div>
		</header>
	
		<nav class="navbar navbar-expand-sm fixed-top">
			 <div class="container">
				 <a class="navbar-brand nav-title" href="Home.php" style="position: absolute;">
					 <i class="fa fa-calculator"></i>Point of Sale
				 </a>
				 <div class="navbar-collapse" id="Navbar">
					 <ul class="navbar-nav mr-auto">

					 </ul>
					 <span class="navbar-text" style="float: right">
						 <select class="form-control nav-color" onchange="javascript:location.href = this.value;">
							<option value="Home.php">Login as</option>
							<option value="Adminlogin.php">Admin</option>
							<option value="Inventorylogin.php">Inventory</option>
							<option value="Employeelogin.php">Employee</option>
						 </select>
					 </span>
				 </div>
			 </div>
		</nav>
	
		<div class="container">
			<div class="row">
				<div class="col-12 col-sm-6">
					 <div class="card card-menu">
						 <h3 class="card-header bg-primary text-white">Menu Card</h3>
						 <div class="card-body">
							 <dl class="row">
								 <img src="images/menu.png" class="img-fluid">
							 </dl>
						 </div>
					 </div>
				</div>
				<div class="col-12 col-sm-6">
					 <div class="card ">
						 <h3 class="card-header bg-dark text-white">History</h3>
						 <div class="card-body card-des">
							 <dl class="row">
								 <p class="d-none d-sm-block card-txt">In a restaurant, the menu is a list of food and beverages offered to customers and the prices. A menu may be à la carte – which presents a list of options from which customers choose – or table d'hôte, in which case a pre-established sequence of courses is offered. Menus may be printed on paper sheets provided to the diners, put on a large poster or display board inside the establishment, displayed outside the restaurant, or put on a digital screen. Since the late 1990s, some restaurants have put their menus online.</p>
								 <p class="card-txt">Menus are also often a feature of very formal meals other than in restaurants, for example at weddings. In the 19th and 20th centuries printed menus were often used for society dinner-parties in homes; indeed this was their original use in Europe.</p>
							 </dl>
						 </div>
					 </div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					 <div class="card card-body bg-light simple-card">
						 <blockquote class="blockquote">
							 <p class="mb-0">Yor better cut the pizza in ofur pieces because I,m not hungry enough to eat six.</p>
							 <footer class="blockquote-footer">Yogi Berra,
							 <cite title="Source Title">The Wit and Wisdom of Yogi Berra, p. pepe, Diversion Books, 2014</cite>
							 </footer>
						 </blockquote>
					 </div>
			    </div>
			</div>
		</div>
		
<script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>