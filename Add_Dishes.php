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
			height: 450px;
			margin: 0 auto;
			margin-top: 20%;
			border: 4px solid #cccbca;
			overflow:auto;
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
		
		.form-btn1 input
		{
			padding-top: 1%;
			padding-bottom: 1%;
			padding-left: 3%;
			padding-right: 3%;
			border-radius: 25px;
			background-color: #f27435;
			color: white;
			font-size: 110%;
			font-weight: bold;
		}
		
		.form-btn1 input:hover{
			color: #f27435;
			background-color: whitesmoke;
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
		
		#accordion
		{
			margin-top: 20%;
			margin-left: 8%;
			margin-right: 8%;
		}
		
		.card
		{
			padding: 0px;
		}
		
		.form-img input
		{
			padding-bottom: 5%;
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
			<div class="row">
				<div class="col-12 col-sm-12">
					<div id="accordion">
						<div class="card">
							 <div class="card-header" role="tab" id="peterhead">
								<h3 class="mb-0"><a data-toggle="collapse" data-target="#peter" style="text-decoration:none;">Add Dishes in menu:</a></h3>
							 </div>
							 <div role="tabpanel" class="collapse show" id="peter" data-parent="#accordion">
								 <div class="card-body">
									<div class="row">
										<div class="col-12 col-md-12 main-form">
											<form action="" method="post" enctype="multipart/form-data">
												<div class="form-group row">
													<label for="name" class="col-6 col-md-2 col-form-label" style="font-weight: bold; font-size: 120%;">Dish Name:</label>
													<div class="col-12 col-md-10">
														<input type="text" class="form-control" id="firstname" name="itemname" placeholder="Enter dish name" required>
													</div>
												</div>
												<div class="form-group row">
													<label for="price" class="col-6 col-md-2 col-form-label" style="font-weight: bold; font-size: 120%;">Price:</label>
													<div class="col-12 col-md-10">
														<input type="text" class="form-control" id="price" name="price" placeholder="Enter price of dish" required>
													</div>
												</div>
												<div class="form-group row">
													<label for="price" class="col-6 col-md-2 col-form-label" style="font-weight: bold; font-size: 120%;">Image:</label>
													<div class="col-12 col-md-10 form-img">
														<input type="file" class="form-control" name="dish_img" required>
													</div>
												</div>
												<div class="form-group row">
													<div class="offset-md-2 col-12 col-md-10 form-btn1">
														 <input type="submit" name="submit_dish" value="ADD DISH" class="btn">
													</div>
												</div>
											</form>
										</div>
									</div>
								 </div>
							 </div>
						</div>
						<div class="card">
							<div class="card-header" role="tab" id="albertohead">
								<h3 class="mb-0">
									<a class="collapsed" data-toggle="collapse" data-target="#alberto">Add Burger in menu:</a>
								</h3>
							</div>
							<div class="collapse" id="alberto" data-parent="#accordion">
								<div class="card-body">
									<div class="row">
										<div class="col-12 col-md-12 main-form">
											<form action="" method="post" enctype="multipart/form-data">
												<div class="form-group row">
													<label for="name" class="col-6 col-md-2 col-form-label" style="font-weight: bold; font-size: 120%;">Burger:</label>
													<div class="col-12 col-md-10">
														<input type="text" class="form-control" id="firstname" name="burgername" placeholder="Enter burger name" required>
													</div>
												</div>
												<div class="form-group row">
													<label for="price" class="col-6 col-md-2 col-form-label" style="font-weight: bold; font-size: 120%;">Price:</label>
													<div class="col-12 col-md-10">
														<input type="text" class="form-control" id="password" name="burgerprice" placeholder="Enter price of dish" required>
													</div>
												</div>
												<div class="form-group row">
													<label for="price" class="col-6 col-md-2 col-form-label" style="font-weight: bold; font-size: 120%;">Image:</label>
													<div class="col-12 col-md-10 form-img">
														<input type="file" class="form-control" name="burger_img" required>
													</div>
												</div>
												<div class="form-group row">
													<div class="offset-md-2 col-12 col-md-10 form-btn1">
														 <input type="submit" name="submit_burger" value="ADD BURGER" class="btn">
													</div>
												</div>
											</form>
										</div>
									</div>
								 </div>
							</div>
						</div>
						<div class="card">
							<div class="card-header" role="tab" id="extrashead">
								<h3 class="mb-0">
									<a class="collapsed" data-toggle="collapse" data-target="#extras">Add Extra in menu:</a>
								</h3>
							</div>
							<div class="collapse" id="extras" data-parent="#accordion">
								<div class="card-body">
									<div class="row">
										<div class="col-12 col-md-12 main-form">
											<form action="" method="post" enctype="multipart/form-data">
												<div class="form-group row">
													<label for="name" class="col-6 col-md-2 col-form-label" style="font-weight: bold; font-size: 120%;">Extra Name:</label>
													<div class="col-12 col-md-10">
														<input type="text" class="form-control" id="firstname" name="extraname" placeholder="Enter name" required>
													</div>
												</div>
												<div class="form-group row">
													<label for="price" class="col-6 col-md-2 col-form-label" style="font-weight: bold; font-size: 120%;">Price:</label>
													<div class="col-12 col-md-10">
														<input type="text" class="form-control" id="password" name="extraprice" placeholder="Enter price" required>
													</div>
												</div>
												<div class="form-group row">
													<label for="price" class="col-6 col-md-2 col-form-label" style="font-weight: bold; font-size: 120%;">Image:</label>
													<div class="col-12 col-md-10 form-img">
														<input type="file" class="form-control" name="extra_img" required>
													</div>
												</div>
												<div class="form-group row">
													<div class="offset-md-2 col-12 col-md-10 form-btn1">
														 <input type="submit" name="submit_extra" value="ADD EXTRA" class="btn">
													</div>
												</div>
											</form>
										</div>
									</div>
								 </div>
							</div>
						</div>
						<div class="card">
							<div class="card-header" role="tab" id="drinkshead">
								<h3 class="mb-0">
									<a class="collapsed" data-toggle="collapse" data-target="#drinks">Add Drinks in menu:</a>
								</h3>
							</div>
							<div class="collapse" id="drinks" data-parent="#accordion">
								<div class="card-body">
									<div class="row">
										<div class="col-12 col-md-12 main-form">
											<form action="" method="post" enctype="multipart/form-data">
												<div class="form-group row">
													<label for="name" class="col-6 col-md-2 col-form-label" style="font-weight: bold; font-size: 120%;">Drink Name:</label>
													<div class="col-12 col-md-10">
														<input type="text" class="form-control" id="drinkname" name="drinkname" placeholder="Enter drink name" required>
													</div>
												</div>
												<div class="form-group row">
													<label for="price" class="col-6 col-md-2 col-form-label" style="font-weight: bold; font-size: 120%;">Price:</label>
													<div class="col-12 col-md-10">
														<input type="text" class="form-control" id="drinkprice" name="drinkprice" placeholder="Enter price of drink" required>
													</div>
												</div>
												<div class="form-group row">
													<label for="price" class="col-6 col-md-2 col-form-label" style="font-weight: bold; font-size: 120%;">Image:</label>
													<div class="col-12 col-md-10 form-img">
														<input type="file" class="form-control" name="drink_img" required>
													</div>
												</div>
												<div class="form-group row">
													<div class="offset-md-2 col-12 col-md-10 form-btn1">
														 <input type="submit" name="submit_drink" value="ADD DRINK" class="btn">
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

	if(isset($_POST['submit_dish']))
	{	
		$imagename = $_FILES['dish_img']['name']; // storing file name
		$tempimgname = $_FILES['dish_img']['tmp_name']; //temp name store
		move_uploaded_file($tempimgname,"Dish_images/$imagename");
		$Item_name = $_POST['itemname'];
		$Price = (int)$_POST['price'];

		$query = "INSERT INTO `item` (`item_name`, `unit_price`, `images_name`) VALUES ('$Item_name', '$Price', '$imagename')";
		$check = mysqli_query($conn, $query);

		if($check == true)
		{
			?>
				<script>
					alert("Dish Successfully ADDED:");
				</script>
			<?php
		}
		else
		{
			echo "Connection is not well established:";
		}
	}

	if(isset($_POST['submit_burger']))
	{	
		$imagename = $_FILES['burger_img']['name']; // storing file name
		$tempimgname = $_FILES['burger_img']['tmp_name']; //temp name store
		move_uploaded_file($tempimgname,"Dish_images/$imagename");
		$Burger_name = $_POST['burgername'];
		$burger_Price = (int)$_POST['burgerprice'];

		$query2 = "INSERT INTO `burger` (`burger_name`, `burger_price`, `burger_image`) VALUES ('$Burger_name', '$burger_Price', '$imagename')";
		$check2 = mysqli_query($conn, $query2);

		if($check2 == true)
		{
			?>
				<script>
					alert("Burger Successfully ADDED:");
				</script>
			<?php
		}
		else
		{
			echo "Connection is not well established:";
		}
	}

	if(isset($_POST['submit_extra']))
	{	
		$imagename = $_FILES['extra_img']['name']; // storing file name
		$tempimgname = $_FILES['extra_img']['tmp_name']; //temp name store
		move_uploaded_file($tempimgname,"Dish_images/$imagename");
		$Extra_name = $_POST['extraname'];
		$extra_Price = (int)$_POST['extraprice'];

		$query3 = "INSERT INTO `extras` (`extras_name`, `extras_price`, `extra_image`) VALUES ('$Extra_name', '$extra_Price', '$imagename')";
		$check3 = mysqli_query($conn, $query3);

		if($check3 == true)
		{
			?>
				<script>
					alert("Extras Successfully ADDED:");
				</script>
			<?php
		}
		else
		{
			echo "Connection is not well established:";
		}
	}

	if(isset($_POST['submit_drink']))
	{	
		$imagename = $_FILES['drink_img']['name']; // storing file name
		$tempimgname = $_FILES['drink_img']['tmp_name']; //temp name store
		move_uploaded_file($tempimgname,"Dish_images/$imagename");
		$Drink_name = $_POST['drinkname'];
		$drink_Price = (int)$_POST['drinkprice'];

		$query4 = "INSERT INTO `drink` (`drink_name`, `drink_price`, `drink_image`) VALUES ('$Drink_name', '$drink_Price', '$imagename')";
		$check4 = mysqli_query($conn, $query4);

		if($check4 == true)
		{
			?>
				<script>
					alert("Drinks Successfully ADDED:");
				</script>
			<?php
		}
		else
		{
			echo "Connection is not well established:";
		}
	}


?>