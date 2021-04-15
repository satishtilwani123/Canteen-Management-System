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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
			background-color: #f27435;
			width: 80%;
			height: 480px;
			margin: 0 auto;
			margin-top: 20%;
			border: 4px solid #cccbca;
			overflow:auto;
		}
		
		.content2
		{
			background-color: white;
			width: 95%;
			height: 340px;
			margin: 0 auto;
			margin-top: 5%;
			border: 4px solid #cccbca;
			overflow: auto;
			border-radius: 25px;
		}
		
		.content3
		{
			width: 95%;
			height: 80px;
			border-radius: 25px;
			margin: 0 auto;
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
		
		.main-form
		{
			margin-top: 8%;
		}
		
		.form-btn input
		{
			padding-left: 15%;
			padding-right: 15%;
			border-radius: 6px;
			background-color: white;
			color: #f27435;
			font-size: 120%;
			font-weight: bold;
		}
		
		.form-btn input:hover{
			color: white;
			background-color: #f27435;
		}
		
		.ch-inp input
		{
			padding: 3%;
		}
		
		.chat1
		{
			border: 2px solid #dedede;
			background-color: #f1f1f1;
			height: 100px;
			border-radius: 5px;
			padding: 10px;
			padding-bottom: 0px;
			margin: 10px 10px;
		}
		
		.chat2
		{
			border: 2px solid #dedede;
			height: 100px;
			background-color: #ddd;
			border-radius: 5px;
			padding-left: 10px;
			padding-right: 10px;
			padding-top: 10px;
			margin: 10px 10px;
		}
		
		.chat2 img
		{
			float: left;
		  	max-width: 60px;
		  	width: 100%;
		  	border-radius: 50%;
		}
		
		.chat1 img {
		  	float: right;
		  	max-width: 60px;
		  	width: 100%;
		  	border-radius: 50%;
		}
		
		.time2
		{
			float: right;
			color: #999;
			clear: both;
			font-size: 2vh;
		}
		
		.time1
		{
			float: left;
  			color: #999;
			clear: both;
			font-size: 2vh;
		}
		
		.msg1
		{
			float: left;
			font-size: 2.5vh;
		}
		
		.msg2
		{
			font-size: 2.5vh;
			float: right;
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
			<div class="content" style="background: url(images/grass.jpg); background-repeat: no-repeat; background-size: cover;">
				<div class="container">
					<div class="content2" style="background: url(images/chatting.jpg); background-repeat: no-repeat; background-size: cover;">
						<div class="row">
							<div class="col-12 col-sm-12">
								<?php
								
									$adminid = $_SESSION['admin_id'];
									$invenid = $_SESSION['inven_id']; 
									
									$query = "SELECT `msg`, `cs`, `date` FROM `chatting` WHERE `invenid` = '$invenid' AND `adminid` = '$adminid'";
									$run = mysqli_query($conn, $query);
								
									while($check = mysqli_fetch_assoc($run))
									{
										if($check['cs'] == 0)
										{
											?>
											<div class="chat2">
												<div class="row">
													<div class="col-10 col-sm-10">
														<img src="images/user1.png">
														<p class="msg2"><?php echo $check['msg']; ?></p>
														<p class="time2"><?php echo $check['date']; ?></p>
													</div>
												</div>
											</div>
											<?php
										}
										else
										{
											?>
											<div class="chat1">
												<div class="row">
													<div class="col-12">
														<img src="images/user1.png">
														<p class="msg1"><?php echo $check['msg']; ?></p>
														<p class="time1"><?php echo $check['date']; ?></p>
													</div>
												</div>
											</div>
											<?php
										}
									}
									
								?>
							</div>
						</div>
					</div>
				</div>
				<div class="container">
					<div class="content3">
						<form action="" method="post">
							<div class="form-group">
								<div class="col-9 col-sm-10 ch-inp" style="float: left">
									<input type="text" class="form-control" id="message" name="msg" placeholder="Chat with inventory" required>
								</div>
							</div>
							<div class="col-3 col-sm-2 form-btn" style="float: right;">
								<input type="submit" name="chat_send" value="SEND" class="btn">
							</div>
						</form>
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

<?php

if(isset($_POST['chat_send']))
{
	$msg = $_POST['msg'];
	$cs = 1;
	$query = "INSERT INTO `chatting` (`invenid`, `adminid`, `msg`, `cs`) VALUES ('$invenid', '$adminid', '$msg', '$cs')";
	$run_query = mysqli_query($conn, $query);
	
	
	if($run_query == true)
	{
		?>
			<script>
				window.location.href = "chatting_with_admin.php";
			</script>
		<?php
	}
	else
	{
		?>
			<script>
				alert("Not Send:");
			</script>
		<?php
	}
	
}

?>