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
			margin-top: 8%;
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
			margin-top: 8%;
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
		
		.alert-provide .alert
		{
			margin-top: 120px;
		}
		
		.two
		{
			padding: 3%;
		}
		
		.third
		{
			padding: 3%;
		}
		
		.one
		{
			overflow:auto;
			padding: 3%;
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
		<div class="container alert-provide">
			<div class="alert alert-warning alert-dismissible fade" role="alert">
			  <strong id="sng">Hi</strong> 
			  <button type="button" class="close" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
			<div class="content">
			<div class="row">
				 <div class="col-12 col-sm-12">
					 <ul class="nav nav-tabs">
						 <li class="nav-item">
						 	<a class="nav-link active" href="#peter" role="tab" data-toggle="tab">Employees</a>
						 </li>
						 <li class="nav-item">
						 	<a class="nav-link" href="#Dhan" role="tab" data-toggle="tab">Add Employees</a>
						 </li>
						 <li class="nav-item">
						 	<a class="nav-link" href="#Agum" role="tab" data-toggle="tab">Change Password</a>
						 </li>
					 </ul>
					 <div class="container">
					 <div class="tab-content">
						 <div role="tabpanel" class="tab-pane fade show active one" id="peter">
						 	<div class="row">
								 <div class="col-12 col-sm-12">
									 <div id="accordion">
										 <div class="card">
											 <div class="card-header" role="tab" id="peterhead">
											 	<h3 class="mb-0">
													<a data-toggle="collapse" data-target="#peters">Inventory Employees
													</a>
												 </h3>
											 </div>
											 <div role="tabpanel" class="collapse show" id="peters" data-parent="#accordion">
												<div class="card-body">
													<table class="table">
													  <thead>
														<tr>
														  <th scope="row">Id</th>
														  <th scope="col">Name</th>
														  <th scope="col">Remove</th>
														</tr>
													  </thead>
													  <tbody>
														<?php
														    $query = 'SELECT * FROM `inventory`';
															$run = mysqli_query($conn, $query);
															while($data = mysqli_fetch_assoc($run))
															{
																?>
																	<tr>
																	  <th><?php echo $data['id']; ?></th>
																	  <td><?php echo $data['username']; ?></td>
																	  <td class="danger"><span class="delete1" data-id='<?php echo $data['id'] ?>'>DELETE</span></td>
																	</tr>
																<?php
															}
														?>
													  </tbody>
													</table>
												</div>
											 </div>
										 </div>
										 <div class="card">
											 <div class="card-header" role="tab" id="albertohead">
												 <h3 class="mb-0">
													 <a class="collapsed" data-toggle="collapse" data-target="#alberto">
													 	POS Employees
													 </a>
												 </h3>
											 </div>
											 <div class="collapse" id="alberto" data-parent="#accordion">
												 <div class="card-body">
												 	<table class="table">
													  <thead>
														<tr>
														  <th scope="row">Id</th>
														  <th scope="col">Name</th>
														  <th scope="col">Remove</th>
														</tr>
													  </thead>
													  <tbody>
														<?php
														    $query = 'SELECT * FROM `retailemployee`';
															$run = mysqli_query($conn, $query);
															while($data = mysqli_fetch_assoc($run))
															{
																?>
																	<tr>
																	  <th><?php echo $data['id']; ?></th>
																	  <td><?php echo $data['username']; ?></td>
																	  <td class="danger"><span class="delete2" data-id='<?php echo $data['id'] ?>'>DELETE</span></td>
																	</tr>
																<?php
															}
														?>
													  </tbody>
													</table>
												 </div>
											 </div>
										  </div>
									 </div>
								 </div>
							 </div>
						 </div>
						 <div role="tabpanel" class="tab-pane fade two" id="Dhan">
						 	<div class="row">
								<div class="col-12 col-sm-12">
									<form action="" method="post" class="main-form">
										<div class="form-group row">
											<div class="col-12 col-sm-12">
												<input type="text" class="form-control" id="firstname" name="add_username" placeholder="Enter employee name" required>
											</div>
										</div>
										<div class="form-group row">
											<div class="col-12 col-sm-12">
												<input type="password" class="form-control" id="password" name="add_password" placeholder="Enter employee password" required>
											</div>
										</div>
										<div class="form-group row">
											<div class="col-12 col-sm-12">
												<select class="form-control" name="add_choose" required>
													<option></option>
													<option value="inventory">INVENTORY</option>
													<option value="employee">POS EMPLOYEE</option>
												</select>
											</div>
										</div>
										<div class="form-group row">
											<div class="col-12 col-sm-12 text-center form-btn">
												<input type="submit" name="add_submit" value="ADD EMPLOYEES" class="btn btn-light">
											</div>
										</div>
									</form>
								</div> 
							</div>
						 </div>
						 <div role="tabpanel" class="tab-pane fade third" id="Agum">
						 	<div class="row">
								<div class="col-12 col-sm-12">
									<form action="" method="post" class="main-form">
										<div class="form-group row">
											<div class="col-12 col-sm-12">
												<input type="number" class="form-control" id="id" name="change_id" placeholder="Enter ID" required>
											</div>
										</div>
										<div class="form-group row">
											<div class="col-12 col-sm-12">
												<input type="password" class="form-control" id="password" name="new_password" placeholder="Enter new password" required>
											</div>
										</div>
										<div class="form-group row">
											<div class="col-12 col-sm-12">
												<select class="form-control" name="choose" required>
													<option></option>
													<option value="admin">ADMIN</option>
													<option value="inventory">INVENTORY</option>
													<option value="employee">POS EMPLOYEE</option>
												</select>
											</div>
										</div>
										<div class="form-group row">
											<div class="col-12 col-sm-12 text-center form-btn">
												<input type="submit" name="ch_submit" value="Change Password" class="btn btn-light">
											</div>
										</div>
									</form>
								</div> 
							</div>
						 </div>
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
		$(document).ready(function(){
			
		 $('.close').click(function(){
			
			 $('.alert').removeClass("show");
			 
		 });
			
		 $('.delete1').click(function(){
		   
			var el = this;
		    var deleteid = $(this).data('id');

		    var confirmalert = confirm("Are you sure?");
			if (confirmalert == true) {
				  // AJAX Request
				  $.ajax({
					url: 'inven_remove.php',
					type: 'POST',
					data: { id:deleteid },
					success: function(response){

					if(response == 1){
					// Remove row from HTML Table
					$(el).closest('tr').css('background','tomato');
					$(el).closest('tr').fadeOut(800,function(){
					   $(this).remove();
					});
					  }else{
					alert('Invalid ID.');
					  }

					}
				  });
			  }

		 });
			
		$('.delete2').click(function(){
		   
			var el = this;
		    var deleteid = $(this).data('id');

		    var confirmalert = confirm("Are you sure?");
			if (confirmalert == true) {
				  // AJAX Request
				  $.ajax({
					url: 'emp_remove.php',
					type: 'POST',
					data: { id:deleteid },
					success: function(response){

					if(response == 1){
					// Remove row from HTML Table
					$(el).closest('tr').css('background','tomato');
					$(el).closest('tr').fadeOut(800,function(){
					   $(this).remove();
					});
					  }else{
					alert('Invalid ID.');
					  }

					}
				  });
			  }

		 });
			
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

<?php

if(isset($_POST['add_submit']))
{
	$addchosen = $_POST['add_choose'];
	if($addchosen == 'employee')
	{
		$Employeename = $_POST['add_username'];
		$Employeepass = $_POST['add_password'];
		$Emp_securepass = hash('sha512', $Employeepass);
		
		$query_check = "SELECT * FROM `retailemployee` WHERE `username` = '$Employeename' OR `password` = '$Emp_securepass'";
		$run_check = mysqli_query($conn, $query_check);
		
		$data_check = mysqli_fetch_assoc($run_check);
		if($data_check != null)
		{
			?>
				<script>
						$(document).ready(function(){
							
							$('#sng').text("This password or Username is already in use by POS employee. !");
							$('.alert').addClass("show");
							
						});
				</script>
			<?php
		}
		else
		{
			$add_query = "INSERT INTO `retailemployee` (`username`, `password`) VALUES ('$Employeename', '$Emp_securepass')";
			$add_check = mysqli_query($conn, $add_query);

			if($add_check == true)
			{
				?>
					<script>
						alert("POS employee successfully added!");
						window.location.href = "emp_management.php";
					</script>
				<?php
			}
			else
			{
				?>
					<script>
						$(document).ready(function(){
							
							$('#sng').text("New POS employee is not added because of some database issue. !");
							$('.alert').addClass("show");
							
						});
					</script>
				<?php
			}	
		}
	}
	else if($addchosen == 'inventory')
	{
		$Employeename = $_POST['add_username'];
		$Employeepass = $_POST['add_password'];
		$Emp_securepass = hash('sha512', $Employeepass);
		
		$query_check = "SELECT * FROM `inventory` WHERE `username` = '$Employeename' OR `password` = '$Emp_securepass'";
		$run_check = mysqli_query($conn, $query_check);
		
		$data_check = mysqli_fetch_assoc($run_check);
		if($data_check != null)
		{
			?>
				<script>
						$(document).ready(function(){
							
							$('#sng').text("This password or Username is already in use by inventory employee. !");
							$('.alert').addClass("show");
							
						});
				</script>
			<?php
		}
		else
		{
			$add_query = "INSERT INTO `inventory` (`username`, `password`) VALUES ('$Employeename', '$Emp_securepass')";
			$add_check = mysqli_query($conn, $add_query);

			if($add_check == true)
			{
				?>
					<script>
						alert("Inventory employee successfully added!");
						window.location.href = "emp_management.php";
					</script>
				<?php
			}
			else
			{
				?>
					<script>
						$(document).ready(function(){
							
							$('#sng').text("New Inventory employee is not added because of some database issue. !");
							$('.alert').addClass("show");
							
						});
					</script>
				<?php
			}
		}
	}
}

if(isset($_POST['ch_submit']))
{
	$chosen = $_POST['choose'];
	if($chosen == 'admin')
	{
		$id = $_POST['change_id'];
		$newpass = $_POST['new_password'];
		$securepass = hash('sha512', $newpass);
		
		$query_check = "SELECT * FROM `admin` WHERE `password` = '$securepass'";
		$run_check = mysqli_query($conn, $query_check);
		
		$data_check = mysqli_fetch_assoc($run_check);
		if($data_check != null)
		{
			?>
				<script>
						$(document).ready(function(){
							
							$('#sng').text("This password is already in use by admin. !");
							$('.alert').addClass("show");
							
						});
				</script>
			<?php
		}
		else
		{
			$query = "SELECT * FROM `admin` WHERE `id` = '$id'";
			$check = mysqli_query($conn, $query);

			$data = mysqli_fetch_assoc($check);

			if($data['username'] != null)
			{
				$query = "UPDATE `admin` SET `password` = '$securepass' WHERE `id` = '$id'";
				$check = mysqli_query($conn, $query);

				if($check == true)
				{
					?>
						<script>
							$(document).ready(function(){
							
								$('#sng').text("The password of admin successfully changed. !");
								$('.alert').addClass("show");

							});
						</script>
					<?php
				}
			}
			else
			{
				?>
					<script>
						$(document).ready(function(){
							
								$('#sng').text("Admin doesn't exist. !");
								$('.alert').addClass("show");

						});
					</script>
				<?php
			}	
		}
		
	}
	else if($chosen == 'employee')
	{
		$id = $_POST['change_id'];
		$newpass = $_POST['new_password'];
		$securepass = hash('sha512', $newpass);
		
		$query_check = "SELECT * FROM `retailemployee` WHERE `password` = '$securepass'";
		$run_check = mysqli_query($conn, $query_check);
		
		$data_check = mysqli_fetch_assoc($run_check);
		if($data_check != null)
		{
			?>
				<script>
						$(document).ready(function(){
							
							$('#sng').text("This password is already in use by any POS employee. !");
							$('.alert').addClass("show");
							
						});
				</script>
			<?php
		}
		else
		{
			$query1 = "SELECT * FROM `retailemployee` WHERE `id` = '$id'";
			$check1 = mysqli_query($conn, $query1);

			$data = mysqli_fetch_assoc($check1);

			if($data['username'] != null)
			{
				$query2 = "UPDATE `retailemployee` SET `password` = '$securepass' WHERE `id` = '$id'";
				$check2 = mysqli_query($conn, $query2);

				if($check2 == true)
				{
					?>
						<script>
							$(document).ready(function(){
							
								$('#sng').text("The password of POS employee successfully changed. !");
								$('.alert').addClass("show");

							});
						</script>
					<?php
				}
			}
			else
			{
				?>
					<script>
						$(document).ready(function(){
							
								$('#sng').text("POS employee doesn't exist. !");
								$('.alert').addClass("show");

						});
					</script>
				<?php
			}	
		}
		
	}
	else if($chosen == 'inventory')
	{
		$id = $_POST['change_id'];
		$newpass = $_POST['new_password'];
		$securepass = hash('sha512', $newpass);
		
		$query_check = "SELECT * FROM `inventory` WHERE `password` = '$securepass'";
		$run_check = mysqli_query($conn, $query_check);
		
		$data_check = mysqli_fetch_assoc($run_check);
		if($data_check != null)
		{
			?>
				<script>
						$(document).ready(function(){
							
							$('#sng').text("This password is already in use by any Inventory employee. !");
							$('.alert').addClass("show");
							
						});
				</script>
			<?php
		}
		else
		{
			$query1 = "SELECT * FROM `inventory` WHERE `id` = '$id'";
			$check1 = mysqli_query($conn, $query1);

			$data = mysqli_fetch_assoc($check1);

			if($data['username'] != null)
			{
				$query2 = "UPDATE `inventory` SET `password` = '$securepass' WHERE `id` = '$id'";
				$check2 = mysqli_query($conn, $query2);

				if($check2 == true)
				{
					?>
						<script>
							$(document).ready(function(){
							
								$('#sng').text("The password of Inventory employee successfully changed. !");
								$('.alert').addClass("show");

							});
						</script>
					<?php
				}
			}
			else
			{
				?>
					<script>
						$(document).ready(function(){
							
								$('#sng').text("Inventory employee doesn't exist. !");
								$('.alert').addClass("show");

						});
					</script>
				<?php
			}		
		}
	}	
}

?>