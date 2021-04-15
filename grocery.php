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
			width: 75%;
			padding: 3%;
			margin: 0 auto;
			border-radius: 4% 4%;
			margin-top: 20%;
			border: 4px solid #cccbca;
		    overflow: auto;
		}
		
		.form-title
		{
			color: #c26406;
			font-weight: bold;
			text-align: center;
			margin-top: 5%;
			margin-bottom: 5%;
		}
		
		.delete
		{
			color: red;
			font-weight: bold;
			cursor: grab;
		}
		
		.delete:hover
		{
			background-color: red;
			color: white;
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
			<div class="content">
				<div class="row">
					<div class="col-12 form-title">
						<h3>Groceries</h3>
					</div>
				</div>
				<div class="container">
					<div class="row">
						<div class="col-12 col-sm-12">
							<table class="table">
							  <thead>
								<tr>
								  <th scope="row">Id</th>
								  <th scope="col">Name</th>
								  <th scope="col">Amount</th>
								  <th scope="col">Out Of Stock</th>
								</tr>
							  </thead>
							  <tbody>
								<?php
								  	$query = 'SELECT * FROM `grocery`';
									$run = mysqli_query($conn, $query);
								  	while($data = mysqli_fetch_assoc($run))
									{
										?>
								  			<tr>
											  <th><?php echo $data['id']; ?></th>
											  <td><?php echo $data['groceries']; ?></td>
											  <td><?php echo $data['amount']; ?></td>
											  <td class="danger"><span class="btn delete" data-id='<?php echo $data['id'] ?>'>DELETE</span></td>
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
		
<script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="./script/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
		$(document).ready(function(){
			
		 $('.delete').click(function(){
		   
			var el = this;
		    var deleteid = $(this).data('id');

		    var confirmalert = confirm("Are you sure?");
			if (confirmalert == true) {
				  // AJAX Request
				  $.ajax({
					url: 'remove.php',
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