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
		function myFunction()
		{
			window.print();
		}
	</script>
</head>
<body>
		<nav class="navbar navbar-expand-sm fixed-top">
			 <div class="container">
				 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
				 	<span class="fa fa-bars"></span>
				 </button>
				 <a class="navbar-brand nav-title" href="#">
					 <i class="fa fa-calculator"></i>PAYMENT GATEWAY RECEIPT
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
						  <th scope="col" colspan="2">Information</th>
						</tr>
					  </thead>
					  <tbody>
						<?php
									
										$query = "SELECT * FROM `payment`";
										$res = mysqli_query($conn, $query);
										if($res == true)
										{
											$sum = 0;
														while($details = mysqli_fetch_assoc($res))
														{
															$sum = $sum + $details['total_price'];
															?>
														<tr>
															<td><?php echo $details['ordername']?></td>
															<td><?php echo $details['orderquantity']?></td>
															<td><?php echo $details['orderprice']?></td>
															<td><?php echo $details['total_price']?></td>
														</tr>
															<?php
														}
													?>
						  								<tr>
															<th>Total Price</th>
															<td></td>
															<td></td>
						  									<td><?php echo $sum; ?></td>
						  								</tr>
						  							<?php
														

										}
										else
										{
											echo "database connection error:";
										}
									
							?>
					  </tbody>
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
									 <input type="submit" name="remove" value="Remove Cart" class="btn btn-danger">
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

<?php

	if(isset($_POST['remove']))
	{
		$query = "DELETE FROM `shopping_cart`";
		$run = mysqli_query($conn, $query);

		if($run == true)
		{
			?>
				<script>
					window.location.href = "shopping.php";
				</script>
			<?php
		}
	}

?>