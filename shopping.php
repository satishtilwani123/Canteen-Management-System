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
			width: 100%;
			height: 800px;
			margin: 0 auto;
			margin-top: 20%;
			margin-bottom: 10%;
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
		
		.table-head th
		{
			font-size: 120%;
		}
		
		thead tr
		{
			background-color: white;
			color: black;
			border: 3px solid lightgray;
		}
		
		tbody tr
		{
			background-color: white;
			border: 6px solid lightgray;
		}
		
		.price
		{
			font-weight: bold;
			font-size: 110%;
			color: deepskyblue;
			margin-left: 17%;
		}
		
		.d-flex
		{
			width: 80%;
			padding: 2%;
		}
		
		.add_drink
		{
			font-weight: bold;
			font-size: 1.6vh;
		}
		
		.add_burger
		{
			font-weight: bold;
			font-size: 1.6vh;
		}
		
		.add_item
		{
			font-weight: bold;
			font-size: 1.6vh;
		}
		
		.add_extra
		{
			font-weight: bold;
			font-size: 1.6vh;
		}
		
		.menu-title
		{
			color: white;
			text-shadow: 2px 2px black;
		}
		
		.modal-header
		{
			background-color: black;
		}
		
		.modal-title
		{
			color: white;
		}
		
		.modal-body
		{
			overflow:scroll; 
			height: 600px;
		}
		
		.order-btn dd
		{
			background: black;
			color: #FFFFFF;
			border-radius: 15px;
			padding-top: 1%;
			padding-bottom: 1%;
			font-weight: bold;
			position: fixed;
			top: 590px;
			cursor: grab;
			width: 150px;
		}
		
		.order-btn dd:hover
		{
			color: black;
			background-color: lightgray;
		}
		
		.price1
		{
			color: deepskyblue;
		}
		
		.dish-name
		{
			font-size: 120%;
		}
		
		.order-dt dt
		{
			font-size: 100%;
			margin-bottom: 2%;
		}
		
		.order-dt2 dt
		{
			font-size: 120%;
			margin-bottom: 2%;
		}
		
		.total-cost
		{
			font-size: 120%;
			font-weight: bold;
		}
		
		.order-btn .gateway
		{
			margin-left: 160px;
		}
		
		#display_dishes dd
		{
			color: black;
		}
		
		.refresh button
		{
			float: right;
		}
		
		.remove
		{
			color: red;
			font-weight: bold;
			cursor: grab;
		}
		
		.remove:hover
		{
			background-color: red;
			color: white;
		}
		
		.order-dt3 dt
		{
			font-size: 120%;
		}
	</style>
	<script>
		function myFunction()
		{
			window.print();
		}
		
		function showdata()
		{
			var key = "";
			var value = "";
			var total_cost = 0;
			var i = 0;
			var list = "";
			for (i = 0; i < localStorage.length; i++) {
				key = localStorage.key(i);
				value = key.replaceAll(" ","_");
				var storedNames = JSON.parse(localStorage.getItem(key));
				list += "<dd class='col-3 dish-name'>" + key + "</dd><dd class='col-3 price1'>$"
					+ storedNames[0] + ".00</dd><dd class='col-2 text-center'>" + storedNames[1] + "</dd><dd class='col-2 offset-sm-1 text-center'><span class='btn remove' data-name="+value+">DELETE</span></dd>";
				total_cost = total_cost + storedNames[1]*storedNames[0];
			}
			document.getElementById("list").innerHTML = list;
			document.getElementById("totalcost").innerHTML = "$"+total_cost+".00";
			$(document).ready(function(){
				$('.remove').click(function(){
					var data_name = $(this).data('name');
					var actual = data_name.replaceAll("_"," ");
					localStorage.removeItem(actual);
					showdata();
				});
			});
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
							 <a class="nav-link" href="emp_dashboard.php">
								 <span class="fas fa-address-card fa-lg"></span>Dashboard
							 </a>
						 </l1>
						 <l1 class="nav-items active">
							 <a class="nav-link" href="shopping.php">
								 <span class="fas fa-drumstick-bite fa-lg"></span>Menu
							 </a>
						 </l1>
						 <l1 class="nav-items active">
							 <div class="nav-link" data-toggle="modal" data-target="#cart" onclick="showdata();">
								 <span class="fa fa-shopping-cart fa-lg"></span>Cart
							 </div>
						 </l1>
					 </ul>
					 <span class="navbar-text">
						 <a class="inven_logout" href="emp_logout.php">
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
						<table class="table">
							<thead>
								<tr class="row table-head">
									<th class="col-6 col-sm-6">Dish</th>
									<th class="col-3 col-sm-3" scope="col">Price</th>
									<th class="col-3 col-sm-3"></th>
								</tr>
							</thead>
							<tbody>
								<tr class="row">
									<?php
										$query_item = "SELECT * FROM `item`";
										$run_item = mysqli_query($conn, $query_item);
									
										if($run_item == true)
										{
											while($data_item = mysqli_fetch_assoc($run_item))
											{
												?>
												<td class="col-4 col-sm-4">
													<div class="media">
													 <img class="d-flex mr-3 img-thumbnail align-self-center" src="Dish_images/<?php echo $data_item['images_name']  ?>">
													 <div class="media-body">
														<h3 style="font-size:1.5vw"><?php echo $data_item['item_name']; ?></h3>
													 </div>
													</div>
												</td>
												<td class="col-2 col-sm-3 price" style="margin-left: 17%; font-size:1.5vw">
													$<?php echo $data_item['unit_price'] ?>.00
												</td>
												<td class="col-3 col-sm-2">
													<span class="btn btn-primary add_item" data-name='<?php echo $data_item['item_name']; ?>' data-price='<?php echo $data_item['unit_price'] ?>'>ADD TO CART</span>
												</td>
												<?php
											}
										}
										
									?>
								</tr>								
							</tbody>
							<thead>
								<tr class="row table-head">
									<th class="col-6 col-sm-6">Extra</th>
									<th class="col-3 col-sm-3" scope="col">Price</th>
									<th class="col-3 col-sm-3"></th>
								</tr>
							</thead>
							<tbody>
								<tr class="row">
									<?php
										$query_extra = "SELECT * FROM `extras`";
										$run_extra = mysqli_query($conn, $query_extra);
									
										if($run_extra == true)
										{
											while($data_extra = mysqli_fetch_assoc($run_extra))
											{
												?>
												<td class="col-4 col-sm-4">
													<div class="media">
													 <img class="d-flex mr-3 img-thumbnail align-self-center" src="Dish_images/<?php echo $data_extra['extra_image']  ?>">
													 <div class="media-body">
														<h3 style="font-size:1.5vw"><?php echo $data_extra['extras_name'] ?></h3>
													 </div>
													</div>
												</td>
												<td class="col-2 col-sm-3 price" style="margin-left: 17%; font-size:1.5vw">
													$<?php echo $data_extra['extras_price'] ?>.00
												</td>
												<td class="col-3 col-sm-2">
													<span class="btn btn-primary add_extra" data-name='<?php echo $data_extra['extras_name'] ?>' data-price='<?php echo $data_extra['extras_price'] ?>'>ADD TO CART</span>
												</td>
												<?php
											}
										}
										
									?>
								</tr>								
							</tbody>
							<thead>
								<tr class="row table-head">
									<th class="col-6 col-sm-6">Burger</th>
									<th class="col-3 col-sm-3" scope="col">Price</th>
									<th class="col-3 col-sm-3"></th>
								</tr>
							</thead>
							<tbody>
								<tr class="row">
									<?php
										$query_burger = "SELECT * FROM `burger`";
										$run_burger = mysqli_query($conn, $query_burger);
									
										if($run_burger == true)
										{
											while($data_burger = mysqli_fetch_assoc($run_burger))
											{
												?>
												<td class="col-4 col-sm-4">
													<div class="media">
													 <img class="d-flex mr-3 img-thumbnail align-self-center" src="Dish_images/<?php echo $data_burger['burger_image']  ?>">
													 <div class="media-body">
														<h3 style="font-size:1.5vw"><?php echo $data_burger['burger_name'] ?></h3>
													 </div>
													</div>
												</td>
												<td class="col-2 col-sm-3 price" style="margin-left: 17%; font-size:1.5vw">
													$<?php echo $data_burger['burger_price'] ?>.00
												</td>
												<td class="col-3 col-sm-2">
													<span class="btn btn-primary add_burger" data-name='<?php echo $data_burger['burger_name'] ?>' data-price='<?php echo $data_burger['burger_price'] ?>'>ADD TO CART</span>
												</td>
												<?php
											}
										}
										
									?>
								</tr>								
							</tbody>
							<thead>
								<tr class="row table-head">
									<th class="col-6 col-sm-6">Drink</th>
									<th class="col-3 col-sm-3" scope="col">Price</th>
									<th class="col-3 col-sm-3"></th>
								</tr>
							</thead>
							<tbody>
								<tr class="row">
									<?php
										$query_drink = "SELECT * FROM `drink`";
										$run_drink = mysqli_query($conn, $query_drink);
									
										if($run_drink == true)
										{
											while($data_drink = mysqli_fetch_assoc($run_drink))
											{
												?>
												<td class="col-4 col-sm-4">
													<div class="media">
													 <img class="d-flex mr-3 img-thumbnail align-self-center" src="Dish_images/<?php echo $data_drink['drink_image']  ?>">
													 <div class="media-body">
														<h3 style="font-size:1.5vw"><?php echo $data_drink['drink_name'] ?></h3>
													 </div>
													</div>
												</td>
												<td class="col-2 col-sm-3 price" style="margin-left: 17%; font-size:1.5vw">
													$<?php echo $data_drink['drink_price'] ?>.00
												</td>
												<td class="col-3 col-sm-2">
													<span class="btn btn-primary add_drink" data-name='<?php echo $data_drink['drink_name'] ?>' data-price='<?php echo $data_drink['drink_price'] ?>'>ADD TO CART</span>
												</td>
												<?php
											}
										}
										
									?>
								</tr>								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	
		<div id="cart" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg" role="content">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Order Summary:</h4>
                        <button type="button" class="close" data-dismiss="modal">
                                &times;
                        </button>
                    </div>
                    <div class="modal-body" style="background: url(images/orange.jpg); background-repeat: no-repeat; background-size: cover;">
                        <div class="container">
							<dl class="row order-dt2">
								<dt class='col-3'>Dishes</dt>
								<dt class='col-3'>Price</dt>
								<dt class='col-3'>Quantity</dt>
								<dt class='col-3'></dt>
							</dl>
							<dl class="row order-dt" id="list">
								
							</dl>
							<dl class="row order-dt3">
								<dt class="col-8">Total Cost:</dt>
								<dt class="col-2 offset-sm-1 text-center" id="totalcost"></dt>
							</dl>
							<dl class="row order-btn">
								<dd class="col-3 col-sm-2 text-center"><span class="cash">CASH</span></dd>
								<dd class="col-5 col-sm-3 offset-sm-1 text-center gateway"><span class="paygate">Home Delivery</span></dd>
							</dl>
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
			
			 $('.cash').click(function(){

				var key = "";
				var total_cost = 0;
				var i = 0;
				for (i = 0; i < localStorage.length; i++) {
					key = localStorage.key(i);
					var storedNames = JSON.parse(localStorage.getItem(key));
					total_cost = total_cost + storedNames[1]*storedNames[0];
				}
				 
				if(total_cost == 0)
					{
						alert("Please fill shopping cart");
					}
				else
					{
						window.location.href = "receipt.php";
					}
				 
			 });
			
			 $('.paygate').click(function(){
					
				var key = "";
				var total_cost = 0;
				var i = 0;
				for (i = 0; i < localStorage.length; i++) {
					key = localStorage.key(i);
					var storedNames = JSON.parse(localStorage.getItem(key));
					total_cost = total_cost + storedNames[1]*storedNames[0];
				}
				 
				if(total_cost == 0)
					{
						alert("Please fill shopping cart");
					}
				else
					{
						window.location.href = "receipt.php";
					} 
			 });
			
			 $('.add_drink').click(function(){

				var el = this;
				var drink_array = [];
				var drinkname = $(this).data('name');
				var drinkprice = $(this).data('price');
				var drinkquan = prompt("Quantity : ",);
				if(drinkquan == null)
				{
					alert("Please Specify Quantity:");
					exit(1);
				}
				drink_array.push(drinkprice);
				drink_array.push(drinkquan);
				localStorage.setItem(drinkname, JSON.stringify(drink_array))
				 
			 });
			
			$('.add_burger').click(function(){

				var el = this;
				var burger_array = [];
				var burgername = $(this).data('name');
				var burgerprice = $(this).data('price');
				var burgerquan = prompt("Quantity : ",);
				if(burgerquan == null)
				{
					alert("Please Specify Quantity:");
					exit(1);
				}
				burger_array.push(burgerprice);
				burger_array.push(burgerquan);
				localStorage.setItem(burgername, JSON.stringify(burger_array))
				
			 });
			
			$('.add_extra').click(function(){

				var el = this;
				var extra_array = [];
				var extraname = $(this).data('name');
				var extraprice = $(this).data('price');
				var extraquan = prompt("Quantity : ",);
				if(extraquan == null)
				{
					alert("Please Specify Quantity:");
					exit(1);
				}
				extra_array.push(extraprice);
				extra_array.push(extraquan);
				localStorage.setItem(extraname, JSON.stringify(extra_array))

			 });
			
			$('.add_item').click(function(){

				var el = this;
				var item_array = [];
				var itemname = $(this).data('name');
				var itemprice = $(this).data('price');
				var itemquan = prompt("Quantity : ",);
				if(itemquan == null)
				{
					alert("Please Specify Quantity:");
					exit(1);
				}
				item_array.push(itemprice);
				item_array.push(itemquan);
				localStorage.setItem(itemname, JSON.stringify(item_array));

			 });

		});
</script>
</body>
</html>