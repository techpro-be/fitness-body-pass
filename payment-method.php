<?php 
session_start();
error_reporting(0);
include('includes/config.php');
require_once ('configuration.php');
if(strlen($_SESSION['login'])==0)
   {
header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
	    <meta name="keywords" content="MediaCenter, Template, eCommerce">
	    <meta name="robots" content="all">
	    <title>FitBodyPass  |  Paiement</title>
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	    <link rel="stylesheet" href="assets/css/main.css">
	    <link rel="stylesheet" href="assets/css/green.css">
	    <link rel="stylesheet" href="assets/css/owl.carousel.css">
		<link rel="stylesheet" href="assets/css/owl.transitions.css">
		<link href="assets/css/lightbox.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/animate.min.css">
		<link rel="stylesheet" href="assets/css/rateit.css">
		<link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
		<link rel="stylesheet" href="assets/css/config.css">
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" href="assets/images/favicon.ico">
        <link href="css2/style.css" rel="stylesheet" type="text/css">  <!--For stripe form -->
        <link rel="stylesheet" href="css1/style.css" />   <!--Whole page-->
        <script src="https://js.stripe.com/v3/"></script>
        <link rel="stylesheet" href="StripeElements.css">
    </head>
<body class="cnt-home">

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="index.php">Accueil</a></li>
				<li class='active'>Paiement</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-bd">
	<div class="container">
		<div class="checkout-box faq-page inner-bottom-sm">
			<div class="row">
				<div class="col-md-12">
					<h2>Entrez les détails de votre carte</h2>
					<div class="panel-group checkout-steps" id="accordion"></div>


                    <?php if(!empty($successMessage)) { ?>
    <div id="success-message"><?php echo $successMessage; ?></div>
    <?php  } ?>
    <div id="error-message"></div>


    <?php
                                $pdtid = array();
                                $sql = "SELECT * FROM products WHERE id IN(";
                                foreach ($_SESSION['cart'] as $id => $value) {
                                    $sql .= $id . ",";
                                }
                                $sql = substr($sql, 0, -1) . ") ORDER BY id ASC";
                                $con = mysqli_connect("db5000245141.hosting-data.io", "dbu402929", "EFFitbodyp@S123!@#", "dbs239431");
                                $query = mysqli_query($con, $sql);
                                $totalprice = 0;
                                $totalqunty = 0;
                                if (!empty($query)) {
                                    while ($row = mysqli_fetch_array($query)) { ?>
                
            <form id="frmStripePayment" action="<?php if ($row['id'] == 1) {echo 'StripePayment.php';}else{echo'StripePaymentProfessional.php';}?>"
                method="post">
                <div class="field-row">
                   <h3><?php echo  "Vous achetez produit" . " " .$row['productName'] ;?> </h3>
                </div>
                
                <div class="field-row">
                    <label>Email</label> <span id="email-info"
                        class="info"></span><br> <input type="text"
                        id="email" name="email" value="<?php echo$_SESSION['login'];?>" class="demoInputBox">
                </div>

                <div class="field-row">
                    <label>Prix</label> <span id="email-info"
                        class="info"></span><br> <input type="text"
                        id="price" name="price" value="<?php echo  "Eur" . " " .$row['productPrice'];?>" class="demoInputBox">
                </div>
                <div class="field-row">
                    <label>Numéro de carte</label> <span
                        id="card-number-info" class="info"></span><br> <input
                        type="text" id="card-number" name="card-number"
                        class="demoInputBox">
                </div>
                <div class="field-row">
                    <div class="contact-row column-right">
                        <label>Mois / année d'expiration</label> <span
                            id="userEmail-info" class="info"></span><br>
                        <select name="month" id="month"
                            class="demoSelectBox">
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select> <select name="year" id="year"
                            class="demoSelectBox">
                            <option value="20">2020</option>
                            <option value="21">2021</option>
                            <option value="22">2022</option>
                            <option value="23">2023</option>
                            <option value="24">2024</option>
                            <option value="25">2025</option>
                            <option value="26">2026</option>
                            <option value="27">2027</option>
                            <option value="28">2028</option>
                            <option value="29">2029</option>
                            <option value="30">2030</option>
                        </select>
                    </div>
                    <div class="contact-row cvv-box">
                        <label>CVC</label> <span id="cvv-info"
                            class="info"></span><br> <input type="text"
                            name="cvc" id="cvc"
                            class="demoInputBox cvv-input">
                    </div>
                </div>
                <div>
                    <input type="submit" name="pay_now" value="Soumettre"
                        id="submit-btn" class="btnAction"
                        onClick="stripePay(event);">

                    <div id="loader">
                        <img alt="loader" src="LoaderIcon.gif">
                    </div>
                </div>
                <input type='hidden' name='amount' value='<?php echo $row['productName'];?>'> <input
                    type='hidden' name='currency_code' value='EUR'> 
                <input type='hidden' name='item_name' value='<?php echo $row['productName'];?>'>
            </form>


            <?php } } else {
                echo "Vous n'avez pas sélectionné d'article à acheter"; ?>
                <div> <a href="index.php">De retour à la maison </a> </div>
           <?php  } ?>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script src="vendor/jquery/jquery-3.2.1.min.js"
        type="text/javascript"></script>
    <script>
function cardValidation () {
    var valid = true;
    var email = $('#email').val();
    var cardNumber = $('#card-number').val();
    var month = $('#month').val();
    var year = $('#year').val();
    var cvc = $('#cvc').val();

    $("#error-message").html("").hide();

    if (email.trim() == "") {
    	   valid = false;
    }
    if (cardNumber.trim() == "") {
    	   valid = false;
    }

    if (month.trim() == "") {
    	    valid = false;
    }
    if (year.trim() == "") {
        valid = false;
    }
    if (cvc.trim() == "") {
        valid = false;
    }

    if(valid == false) {
        $("#error-message").html("Tous les champs sont requis").show();
    }

    return valid;
}
//set your publishable key
Stripe.setPublishableKey("<?php echo STRIPE_PUBLISHABLE_KEY; ?>");

//callback to handle the response from stripe
function stripeResponseHandler(status, response) {
    if (response.error) {
        //enable the submit button
        $("#submit-btn").show();
        $( "#loader" ).css("display", "none");
        //display the errors on the form
        $("#error-message").html(response.error.message).show();
    } else {
        //get token id
        var token = response['id'];
        //insert the token into the form
        $("#frmStripePayment").append("<input type='hidden' name='token' value='" + token + "' />");
        //submit form to the server
        $("#frmStripePayment").submit();
    }
}
function stripePay(e) {
    e.preventDefault();
    var valid = cardValidation();

    if(valid == true) {
        $("#submit-btn").hide();
        $( "#loader" ).css("display", "inline-block");
        Stripe.createToken({
            number: $('#card-number').val(),
            cvc: $('#cvc').val(),
            exp_month: $('#month').val(),
            exp_year: $('#year').val()
        }, stripeResponseHandler);

        //submit from callback
        return false;
    }
}
</script>

					  
					  	
					</div><!-- /.checkout-steps -->
				</div>
			</div><!-- /.row -->
		</div><!-- /.checkout-box -->


	</div><!-- /.container -->
</div><!-- /.body-content -->


	<script src="assets/js/jquery-1.11.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	<script src="assets/js/echo.min.js"></script>
	<script src="assets/js/jquery.easing-1.3.min.js"></script>
	<script src="assets/js/bootstrap-slider.min.js"></script>
    <script src="assets/js/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="assets/js/lightbox.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
	<script src="assets/js/scripts.js"></script>

</body>
</html>
<?php //} ?>
