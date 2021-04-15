<?php
	include("dbconfig.php");

	session_start();
	if(isset($_SESSION['inven_submit']))
	{
		header('location:Inven_dashboard.php');
		exit(1);
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Login</title>
	<link href="style/styles.css" rel="stylesheet">
	<link href="style/styles1.css" rel="stylesheet">
	<link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">
	<style>
		body
		{
			background-color: #e6e8eb;
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
		
		.nav-title
		{
			font-weight: bold;
			color: #f27435;
			font-size: 150%;
		}
		
		.content
		{
			background-color: white;
			width: 70%;
			padding: 5%;
			margin: 0 auto;
			border-radius: 4% 4%;
			margin-top: 21%;
			border: 4px solid #cccbca;
		}
		
		.form-title
		{
			color: #c26406;
			font-weight: bold;
			text-align: center;
			margin-top: 5%;
			margin-bottom: 5%;
		}
		
		.form-btn input
		{
			padding-top: 1%;
			padding-bottom: 1%;
			padding-left: 15%;
			padding-right: 15%;
			border-radius: 25px;
			background-color: #c26406;
			color: white;
			font-size: 120%;
			font-weight: bold;
		}
	</style>
</head>
<body>
	
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
		<div class="content">
			<div class="row">
				<div class="col-12 form-title">
					<h3>Inventory Login</h3>
				</div>
			</div>
			<div class="container">
				<form action="" method="post">
					<div class="form-group row">
						<div class="col-12 col-sm-12">
							<input type="number" class="form-control" id="id" name="inven_id" placeholder="Enter your ID" required>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-12 col-sm-12">
							<input type="text" class="form-control" id="firstname" name="inven_username" placeholder="Enter your name" required>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-12 col-sm-12">
							<input type="password" class="form-control" id="password" name="inven_password" placeholder="Enter your password" required>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-12 col-sm-12 text-center form-btn">
							<input type="submit" name="inven_submit" class="btn btn-light">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	
<script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>

<?php
if(isset($_POST['inven_submit']))
{	
	$id = (int)$_POST['inven_id'];
	$usrname = $_POST['inven_username'];
	$password = $_POST['inven_password'];
	
	$securepass = hash('sha512', $password);

	$query = "SELECT * FROM `inventory` WHERE `id` = '$id' AND `username` = '$usrname' AND `password` = '$securepass'";
	$check = mysqli_query($conn, $query);
	
	if($check == true)
	{
		$data = mysqli_fetch_assoc($check);
		$name = $data['username'];
		if($name)
		{
			$_SESSION['inven_id'] = $_POST['inven_id'];
			$_SESSION['inven_name'] = $_POST['inven_username'];
			$_SESSION['inven_submit'] = $_POST['inven_submit'];
			header('location:inven_dashboard.php');
		}
		else
		{
			?>
				<h4 style="color: white; text-align:center;">You are not registered</h4>
			<?php			
		}
	}
	else
	{
		echo "Connection is not well established:";
	}
}

?>