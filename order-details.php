<?php 
session_start();
error_reporting(0);
include('includes/config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
	    <meta name="keywords" content="MediaCenter, Template, eCommerce">
        <meta name="robots" content="all">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">

	    <title>Order History</title>
	  
</head>
<body class="cnt-home">	

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="index.php">Home</a></li>
				<li class='active'>Shopping Cart</li>
			</ul>
		</div>
	</div>
</div>   <!-- Toolbar -->

<link rel="stylesheet" href="css1/style.css" />
<script src="https://js.stripe.com/v3/"></script>
<form action="charge.php" method="post" id="payment-form">
<div class="form-row">
    <input type="text" name="amount" placeholder="Enter Amount" />
    <label for="card-element">
    Credit or debit card
    </label>
    <div id="card-element">
    <!-- A Stripe Element will be inserted here. -->
    </div>
 
    <!-- Used to display form errors. -->
    <div id="card-errors" role="alert"></div>
</div>
<button>Submit Payment</button>
</form>
<script src="js1/card.js"></script>

</body>
</html>