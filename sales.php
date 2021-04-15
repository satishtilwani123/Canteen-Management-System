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
		
		.nav-tabs
		{
			background-color: #f27435; 
		}
		
		.nav-tabs .nav-item a
		{
			color: white;
			font-weight: bold;
		}
		
		.col-form-label
		{
			color: #f27435;
			text-shadow: 2px 2px white;
			font-weight: bold; 
			font-size:130%;
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
				<div class="col-12 col-md-12 main-form">
					<div class="container">
						<form action="" method="post">
							<div class="form-group row">
								<label for="name" class="col-12 col-md-2 col-form-label">Select Dates:</label>
								<div class="col-12 col-md-3">
									<input type="date" class="form-control" id="date1" name="date1">
								</div>
								<div class="col-12 col-md-3">
									<input type="date" class="form-control" id="date2" name="date2">
								</div>
								<div class="col-6 col-md-2 form-btn">
									 <input type="submit" name="submit" class="btn btn-primary">
								</div>
								<div class="col-6 col-md-2 form-btn" align="right">
									 <a class="btn btn-primary" onclick="myFunction();">Printing</a>
								</div>
							</div>
						</form>
					</div>
				</div>	 
			</div>
			<div class="container">
			<div class="row show">
				<div class="col-12 col-md-12 seek">
					<?php
						if(isset($_POST['submit']))
						{
							$date3 = $_POST['date1'];
							$date4 = $_POST['date2'];
							
							if($date3 && $date4)
							{
								?>
									<h5>From <?php echo $date3; ?> to <?php echo $date4; ?></h5>
								<?php
							}
							else if($date3 && !$date4)
							{
								?>
									<h5>Sales of <?php echo $date3; ?></h5>
								<?php
							} 
							else if(!$date3 && $date4)
							{
								?>
									<h5>Sales of <?php echo $date4; ?></h5>
								<?php
							}
						}
					?>
				</div>
			</div>
			</div>
			<div class="row">
				<div class="col-12 col-md-12">
					<table class="table table-hover">
					  <thead>
						<tr>
						  <th scope="col">AccountID</th>
						  <th scope="col">Sales</th>
						  <th scope="col">Date</th>
						</tr>
					  </thead>
					  <tbody>
						<?php
								if(isset($_POST['submit']))
								{
									$date1 = $_POST['date1'];
									$date2 = $_POST['date2'];
	
									$conn = mysqli_connect('localhost','root','','restaurants');
		
									if($date1 && $date2)
									{
										$query = "SELECT * FROM `accounts` WHERE `date` BETWEEN '$date1' AND '$date2'";
										$res = mysqli_query($conn, $query);
										if($res == true)
										{
														while($details = mysqli_fetch_assoc($res))
														{
															?>
														<tr>
															<td><?php echo $details['accounts_id']?></td>
															<td><?php echo $details['sales']?></td>
															<td><?php echo $details['date']?></td>
														</tr>
															<?php
														}

										}
										else
										{
											echo "database connection error:";
										}
									}
									else if($date1 && !$date2)
									{
										$query = "SELECT * FROM `accounts` WHERE `date` = '$date1'";
										$res = mysqli_query($conn, $query);
										if($res == true)
										{
														while($details = mysqli_fetch_assoc($res))
														{
															?>
														<tr>
															<td><?php echo $details['accounts_id']?></td>
															<td><?php echo $details['sales']?></td>
															<td><?php echo $details['date']?></td>
														</tr>
															<?php
														}
										}
										else
										{
											echo "database connection error:";
										}
									}
									else if($date2 && !$date1)
									{
										$query = "SELECT * FROM `accounts` WHERE `date` = '$date2'";
										$res = mysqli_query($conn, $query);
										if($res == true)
										{
														while($details = mysqli_fetch_assoc($res))
														{
															?>
														<tr>
															<td><?php echo $details['accounts_id']?></td>
															<td><?php echo $details['sales']?></td>
															<td><?php echo $details['date']?></td>
														</tr>
															<?php
														}
										}
										else
										{
											echo "database connection error:";
										}
									}
							}
							?>
					  </tbody>
					</table>
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