<?php
session_start();
error_reporting(0);
include('includes/config.php');
//if (isset($_POST['submit'])) {
//    if (!empty($_SESSION['cart'])) {
//        foreach ($_POST['quantity'] as $key => $val) {
//            if ($val == 0) {
//                unset($_SESSION['cart'][$key]);
//                unset($_SESSION['cart'][$key]);
//            } else {
//                $_SESSION['cart'][$key]['quantity'] = $val;
//
//            }
//        }
//        echo "<script>alert('Your Cart has been Updated');</script>";
//    }
//}
// Code for Remove a Product from Cart
if (isset($_POST['submit'])) {
    if (isset($_POST['remove_code'])) {
        if (!empty($_SESSION['cart'])) {
//        foreach ($_POST['remove_code'] as $key) {

            unset($_SESSION['cart']);
//        }
            echo "<script>alert('Your Cart has been Updated');</script>";
        }
    }
}
// code for insert product in order table


if (isset($_POST['ordersubmit'])) {

    if (strlen($_SESSION['login']) == 0) {
        header('location:login.php');
    } else {

        $quantity = $_POST['quantity'];
        $pdd = $_SESSION['pid'];
        $value = array_combine($pdd, $quantity);

        foreach ($value as $qty => $val34) {
            header('location:payment-method.php');
        }
    }
}


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

    <title>My Cart</title>
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
    <link href="assets/css/green.css" rel="alternate stylesheet" title="Green color">
    <link href="assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
    <link href="assets/css/red.css" rel="alternate stylesheet" title="Red color">
    <link href="assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
    <link href="assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="assets/images/favicon.ico">

</head>
<body class="cnt-home">


<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="index.php">Accueil</a></li>
                <li class='active'>Cart</li>
            </ul>
        </div>
    </div>
</div>

<div class="body-content outer-top-xs">
    <div class="container">
        <div class="row inner-bottom-sm">
            <div class="shopping-cart">
                <div class="col-md-12 col-sm-12 shopping-cart-table ">
                    <div class="table-responsive">
                            <?php
                            if (!empty($_SESSION['cart'])){
                            ?>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="cart-product-name item">Nom du produit</th>
                                    <th class="cart-sub-total item">Prix</th>
                                    <th class="cart-romove item">Retirer</th>
                                    <th class="cart-romove item">Action</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <td colspan="7">
                                        <div class="shopping-cart-btn">
							<span class="">
								<a href="index.php"
                                   class="btn btn-upper btn-primary outer-left-xs">Continuer vos achats</a>
							</span>
                                        </div>
                                    </td>
                                </tr>
                                </tfoot>
                                <tbody>
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
                                    while ($row = mysqli_fetch_array($query)) {
                                        $quantity = $_SESSION['cart'][$row['id']]['quantity'];
                                        $subtotal = $_SESSION['cart'][$row['id']]['quantity'] * $row['productPrice'];
                                        $totalprice += $subtotal;
                                        $_SESSION['qnty'] = $totalqunty += $quantity;

                                        array_push($pdtid, $row['id']);
                                        ?>

                                        <tr>                                
                                            <td class="cart-product-name-info">
                                                <h4 class='cart-product-description'>
                                                    <a href="product-details.php?pid=<?php echo htmlentities($pd = $row['id']); ?>"><?php echo $row['productName'];
                                                        $_SESSION['sid'] = $pd;?>
                                                    </a></h4>
                                            <td class="cart-product-sub-total"><span
                                                        class="cart-sub-total-price"><?php echo "Eur" . " " . $row['productPrice']; ?></span>
                                            </td>
                                            <td class="romove-item">
                                                <form name="cart" method="post">
                                                <input type="hidden" name="remove_code"
                                                                           value="<?php echo htmlentities($row['id']); ?>"/>
                                                <input type="submit" name="submit" value="Retirer"
                                                       class="btn btn-upper btn-primary pull-right outer-right-xs">
                                                </form>
                                            </td>

                                            <td>
                                            <?php if (strlen($_SESSION['login']) == 0) { ?> 
                                                    <button type="submit" name="ordersubmit" class="btn btn-primary"><a
                                                                href="login.php">PROPOSÉ À CHEK-OUT</a></button>
                                                 <?php }  else {?>
                                                    <button type="submit" name="ordersubmit" class="btn btn-primary"><a
                                                                href="payment-method.php">CHEK-OUT</a></button>
                                                            <?php }?>
                                            <?php }?>
                                        </tr>

                                    <?php 
                                }
                                $_SESSION['pid'] = $pdtid;
                                ?>

                                </tbody>
                            </table>

                            <?php } else {
                                echo "Votre panier est vide";
                            } ?>

                    </div>
                </div>


                <div class="col-md-4 col-sm-12 cart-shopping-total">

                   
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="js1/jquery-2.1.1.js"></script>
<script type="text/javascript" src="js1/bootstrap.min.js"></script>
<script type="text/javascript" src="js1/plugins.js"></script>
<script type="text/javascript" src="js1/menu.js"></script>
<script type="text/javascript" src="js1/custom.js"></script>
<script src="js1/jquery.subscribe.js"></script>

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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
                                $("#error-message").html("All Fields are required").show();
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



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://checkout.stripe.com/checkout.js"></script>
<script>
    $(document).ready(function () {
        $(".changecolor").switchstylesheet({seperator: "color"});
        $('.show-theme-options').click(function () {
            $(this).parent().toggleClass('open');
            return false;
        });
    });

    $(window).bind("load", function () {
        $('.show-theme-options').delay(2000).trigger('click');
    });
</script>
</body>
</html>