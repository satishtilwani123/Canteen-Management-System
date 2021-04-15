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
		
		.card
		{
			background-color: white;
			width: 80%;
			height: 500px;
			margin: 0 auto;
			margin-top: 20%;
			border: 4px solid #cccbca;
		}
		
		.card-header
		{
			background-color: #f27435;
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
		
		.rows
		{
			margin-bottom: 3%;
		}
		
		.card-body
		{
			margin-top: 3%;
		}
		
		.btn-pay
		{
			background-color: #f27435;
			width: 100%;
			color: white;
			border-radius: 15px;
			font-weight: bold;
			font-size: 130%;
		}
		
		.btn-magic
		{
			background-color: lawngreen;
			width: 50%;
			color: white;
			border-radius: 15px;
			font-weight: bold;
			font-size: 130%;
			margin-top: 3%;
		}
		
		.btn-magic:hover
		{
			color: white;
		}
		
		.btn-pay:hover
		{
			color: white;
		}
		
		.btn-danger
		{
			width: 100%;
			color: white;
			border-radius: 15px;
			font-weight: bold;
			font-size: 130%;
		}
		
		.modal-header
		{
			background-color: lawngreen;
			color: white;
		}
	</style>
	<script src="https://www.2checkout.com/checkout/api/2co.min.js"></script>
	<script>
		  var successCallback = function(data) {
		  var myForm = document.getElementById('paymentFrm');

		  myForm.token.value = data.response.token.token;
		  myForm.submit(); };

		var errorCallback = function(data) {
		  if (data.errorCode === 200) {
			tokenRequest();
		  } else {
			alert(data.errorMsg);
		  }};

		var tokenRequest = function() {
		  var args = {
			sellerId: "250655821721",
			publishableKey: "5FF50317-79EB-472B-8EB7-04F7F86974C5",
			ccNo: $("#card_num").val(),
			cvv: $("#cvv").val(),
			expMonth: $("#exp_month").val(),
			expYear: $("#exp_year").val()
		  };


		  TCO.requestToken(successCallback, errorCallback, args);
		};

		$(function() {
		  TCO.loadPubKey('sandbox');

		  $("#paymentFrm").submit(function(e) {

			tokenRequest();

			return false;
		  });
		});
	</script>
</head>
<body>
		<nav class="navbar navbar-expand-sm fixed-top">
			 <div class="container">
				 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
				 	<span class="fa fa-bars"></span>
				 </button>
				 <a class="navbar-brand nav-title" href="#">
					 <i class="fa fa-calculator"></i>Payment Gateway
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
			<div class="card">
				<h3 class="card-header text-white">Payment with 2Checkout</h3>
				<div class="card-body">
					<form id="paymentFrm" action="" method="post">
						<div class="row rows">
							<div class="col-12 col-sm-12">
								<input type="text" class="form-control" name="name" id="name" placeholder="Enter your name" required autofocus>
							</div>
						</div>
						<div class="row rows">
							<div class="col-12 col-sm-12">
								<input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" required>
							</div>
						</div>
						<div class="row rows">
							<div class="col-12 col-sm-12">
								<input  type="text" class="form-control" name="card_num" id="card_num" placeholder="Enter credit card number" autocomplete="off" required>
							</div>
						</div>
						<div class="row rows">
							<div class="col-4 col-sm-4">
								<input  type="number" name="exp_month" id="exp_month" class="form-control" placeholder="MM" required>
							</div>
							<div class="col-4 col-sm-4">
								<input  type="number" name="exp_year" id="exp_year" class="form-control" placeholder="YY" required>
							</div>
							<div class="col-4 col-sm-4">
								<input type="number" name="cvv" id="cvv" class="form-control" placeholder="CVV" autocomplete="off" required>
							</div>
						</div>
						<div class="row rows">
							<div class="col-12 col-sm-12">
								<input style="font-size:20px;" type="submit" name="submit_pay" class="btn btn-pay" value="Submit Payment">
							</div>
						</div>
						<div class="row rows">
							<div class="col-12 col-sm-12">
								<input style="font-size:20px;" type="button" class="btn btn-danger" value="Cancel Payment">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		
<script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="./script/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
		$(document).ready(function(){
			
			$('.btn-danger').click(function(){
					window.location.href = "shopping.php";
			 });

		});
</script>
</body>
</html>

<?php

if(isset($_POST['submit_pay']))
{
	$name = $_POST['name'];
	$email = $_POST['email'];
	$card_num = $_POST['card_num'];
	$exp_month = $_POST['exp_month'];
	$exp_year = $_POST['exp_year'];
	$cvv = $_POST['cvv'];
	$currency = 'PKR';
	$payment_status = 'APPROVED';
		
	$query_cart = "SELECT * FROM `shopping_cart`";
	$run_cart = mysqli_query($conn, $query_cart);
	
	if($run_cart == true)
	{
		$total_price = 0;
		while($data_cart = mysqli_fetch_assoc($run_cart))
		{
			$total_price = $total_price + $data_cart['total_price'];
		}
		
		$paid_amount = $total_price;
		
		$query_sale = "INSERT INTO `accounts` (`sales`) VALUES ('$total_price')";
		$run_sale = mysqli_query($conn, $query_sale);
		
		if($run_sale == true)
		{
			$query_payment = "INSERT INTO `payment`(`name`, `email`, `card_num`, `card_exp_month`, `card_exp_year`, `card_cvv`, `total_price`, `currency`, `paid_amount`, `payment_status`) VALUES ('$name', '$email', '$card_num', '$exp_month', '$exp_year', '$cvv', '$total_price', '$currency', '$paid_amount', '$payment_status')";
			$run_payment = mysqli_query($conn, $query_payment);

			if($run_payment == true)
			{
				?>
					<script>
						alert("Transaction Successfully Done:");
					</script>
	
					<div class="container">
						<div class="row rows">
								<div class="col-12 col-sm-12 text-center">
									<input data-toggle="modal" data-target="#receipt" type="button" class="btn btn-magic" value="Receipt">
								</div>
						</div>
					</div>
					
					<div id="receipt" class="modal fade" role="dialog">
						<div class="modal-dialog modal-lg" role="content">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title">2Checkout Receipt:</h4>
										<button type="button" class="close" data-dismiss="modal">
											&times;
										</button>
								</div>
								<div class="modal-body">
									<div class="container">
										<dl class="row order-dt">
											 <dt class="col-6">Name</dt>
											 <dd class="col-6"><?php echo $name ?></dd>
											 <dt class="col-6">Email</dt>
											 <dd class="col-6"><?php echo $email ?></dd>
											 <dt class="col-6">Card number</dt>
											 <dd class="col-6"><?php echo $card_num ?></dd>
											 <dt class="col-6">Expiry month</dt>
											 <dd class="col-6"><?php echo $exp_month ?></dd>
											 <dt class="col-6">Exiry year</dt>
											 <dd class="col-6"><?php echo $exp_year ?></dd>
											 <dt class="col-6">CVV</dt>
											 <dd class="col-6"><?php echo $cvv ?></dd>
											 <dt class="col-6">Total price</dt>
											 <dd class="col-6"><?php echo $total_price ?></dd>
											 <dt class="col-6">Paid amount</dt>
											 <dd class="col-6"><?php echo $paid_amount ?></dd>
											 <dt class="col-6">Currency</dt>
											 <dd class="col-6"><?php echo $currency ?></dd>
											 <dt class="col-6">Payment status</dt>
											 <dd class="col-6"><?php echo $payment_status ?></dd>
										</dl>
									</div>
								</div>
							</div>
						</div>
					</div>
			<?php
					
				$query = "DELETE FROM `shopping_cart`";
				$run = mysqli_query($conn, $query);

				if($run != true)
				{
					?>
						<script>
							alert("Database Connection Issue");
						</script>
					<?php
				}
			}
		}
	}
}

?>