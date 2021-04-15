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
	<link rel="stylesheet" href="css/design1.css">
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
		
		.content
		{
			background-color: #e6e8eb;
			width: 90%;
			height: 70px;
			margin: 0 auto;
			margin-top: 20%;
		}
		
		.form-btn input
		{
			background-color: #f27435;
			border: 3px solid #f27435;
		}
		
		.form-btn input:hover
		{
			background-color: orangered;
			border: 3px solid orangered;
		}
		
		.form-btn a
		{
			background-color: #f27435;
			border: 3px solid #f27435;
		}
		
		.form-btn a:hover
		{
			background-color: orangered;
			border: 3px solid orangered;
		}
		
		.table
		{
			background-color: white;
			border: 10px solid #e6e8eb;
		}
		
		.seek h5
		{
			color: #f27435;
			text-shadow: 2px 2px white;
		}
	</style>
	<script>
		var total_cost = 0;
		
		function myFunction()
		{
			window.print();
		}
		
		function receipt_data()
		{
			var key = "";
			var value = "";
			var i = 0;
			list = "";
			for (i = 0; i < localStorage.length; i++) {
				key = localStorage.key(i);
				var storedNames = JSON.parse(localStorage.getItem(key));
				list += "<tr><td>" + key + "</td><td>$"
					+ storedNames[0] + ".00</td><td>" + storedNames[1] + "</td><td>" + storedNames[0]*storedNames[1] + "</td></tr>";
				total_cost = total_cost + storedNames[1]*storedNames[0];
			}
			document.getElementById("main_data").innerHTML = list;
			document.getElementById("cost").innerHTML = total_cost;
		}
		
		function remove_data()
		{
			<?php
				$value = "<script>document.write(total_cost);</script>";
				$query = "INSERT INTO `accounts` (`sales`) VALUES ('$value')";
				$run = mysqli_query($conn, $query);
			    if($run == true)
				{
					?>
						alert("Inserted");
					<?php
				}
				else
				{
					?>
						alert("Not Inserted");
					<?php
				}
			?>
		}
	</script>
</head>
<body onload="receipt_data();">
		<nav class="navbar navbar-expand-sm fixed-top">
			 <div class="container">
				 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
				 	<span class="fa fa-bars"></span>
				 </button>
				 <a class="navbar-brand nav-title" href="#">
					 <i class="fa fa-calculator"></i>RECEIPT
				 </a>
				 <div class="collapse navbar-collapse" id="Navbar">
					 <ul class="navbar-nav mr-auto">
					 </ul>
					 <span class="navbar-text">
					 </span>
				 </div>
			 </div>
		</nav>	
		<div class="container">
			<div class="content">
				<div class="row">
					<div class="col-12">
						<h1 style="text-align: center;">Point Of Sale</h1>
					</div>
				</div>
			<div class="row">
				<div class="col-12 col-md-12">
					<table class="table table-hover">
					  <thead>
						<tr>
						  <th>Items</th>
						  <th>Quantity</th>
						  <th>Price</th>
						  <th>Total Price</th>
						</tr>
					  </thead>
					  <tbody id="main_data">
						  					
					  </tbody>
					  <tr>
						<th>Total Price</th>
						<td></td>
						<td></td>
						<td id="cost"></td>
					  </tr>	
					</table>
				</div>
			</div>
			<div class="row">
					<div class="col-12">
						<h1 style="text-align:center">THANK YOU</h1>
					</div>
			</div>
			<div class="row">
					<div class="col-12">
						<p style="text-align:center">Hope you will enjoy!</p>
					</div>
			</div>
			<div class="row">
				<div class="col-12 col-md-12 main-form">
					<div class="container">
						<form action="" method="post">
							<div class="form-group row">
								<div class="col-6 col-md-2 form-btn">
									 <input type="button" class="btn btn-danger" value="Remove Cart" onclick="remove_data();">
								</div>
								<div class="col-6 col-md-2 form-btn" align="right">
									 <a class="btn btn-primary" onclick="myFunction();">Printing</a>
								</div>
							</div>
						</form>
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
