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
			background-color: white;
			width: 80%;
			margin: 0 auto;
			margin-top: 20%;
			border: 4px solid #cccbca;
		}
		
		.nav-tabs
		{
			background-color: #f27435; 
		}
		
		.nav-tabs .nav-item a
		{
			color: white;
			font-weight: bold;
		}
		
		#accordion
		{
			margin-top: 5%;
		}
		
		.collapsed
		{
			color: #f27435;
			text-shadow: 2px 2px white;
		}
		
		.collapsed:hover
		{
			text-decoration: none;
			color: white;
			text-shadow: 2px 2px black;
		}
		
		.danger
		{
			color: red;
			font-weight: bold;
			cursor: grab;
		}
		
		.main-form
		{
			margin-top: 4%;
		}
		
		.form-btn input
		{
			padding-top: 1%;
			padding-bottom: 1%;
			padding-left: 15%;
			padding-right: 15%;
			border-radius: 25px;
			background-color: #f27435;
			color: white;
			font-size: 120%;
			font-weight: bold;
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
		
		.drop1
		{
			font-size: 120%;
			color: #f27435;
		}
		
		.drop1 span
		{
			margin-right: 5%;
		}
		
		.img-fluid
		{
			width: 7%;
		}
		
		.card-header
		{
			background-color: #f27435;
		}
	</style>
</head>
<body>
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
			<div class="content">
						 	<div class="row">
								<div class="col-12 col-sm-12">
									<div class="card">
										<h3 class="card-header text-white"><img src="images/grocery.png" class="img-fluid">Grocery</h3>
										<div class="card-body">
											<form action="" method="post" class="main-form">
												<div class="form-group row">
													<div class="col-12 col-sm-12">
														<input type="text" class="form-control" id="groceryname" name="gro_name" placeholder="Name of grocery" required>
													</div>
												</div>
												<div class="form-group row">
													<div class="col-12 col-sm-12">
														<input type="text" class="form-control" id="amount" name="gro_amount" placeholder="Amount of grocery" required>
													</div>
												</div>
												<div class="form-group row">
													<div class="col-12 col-sm-12 text-center form-btn">
														<input type="submit" name="add_grocery" value="ADD GROCERY" class="btn btn-light">
													</div>
												</div>
											</form>
										</div>
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
</script>
</body>
</html>

<?php

if(isset($_POST['add_grocery']))
{
		$groceryname = $_POST['gro_name'];
		$groceryamount = $_POST['gro_amount'];

		$add_query = "INSERT INTO `grocery` (`groceries`, `amount`) VALUES ('$groceryname', '$groceryamount')";
		$add_check = mysqli_query($conn, $add_query);

		if($add_check == true)
		{
			?>
				<script>
					alert("Grocery ADDED");
				</script>
			<?php
		}
		else
		{
			?>
				<script>
					alert("Grocery Not ADDED:");
				</script>
			<?php
		}
	
}


?>