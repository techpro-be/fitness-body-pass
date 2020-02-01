<?php
session_start();
error_reporting(0);
include('includes/config.php');
include 'ChromePhp.php';
if(isset($_GET['action']) && $_GET['action']=="add"){
    $id=intval($_GET['id']);
    if(isset($_SESSION['cart'][$id])){
        $_SESSION['cart'][$id]['quantity']++;
    }else{
        $sql_p="SELECT * FROM products WHERE id={$id}";
        $con = mysqli_connect("db5000245141.hosting-data.io","dbu402929","EFFitbodyp@S123!@#","dbs239431");
        $query_p=mysqli_query($con,$sql_p);
        if(mysqli_num_rows($query_p)!=0){
            $row_p=mysqli_fetch_array($query_p);
            $_SESSION['cart'][$row_p['id']]=array("quantity" => 1, "price" => $row_p['productPrice']);
            header('location:my-cart.php');
        }else{
            $message="Product ID is invalid";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Sport Fitness</title>
    <link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="iLand Multipurpose Landing Page Template">
    <meta name="keywords" content="iLand HTML Template, iLand Landing Page, Landing Page Template">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/green.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/owl.transitions.css">
    <!--<link rel="stylesheet" href="assets/css/owl.theme.css">-->
    <link href="assets/css/lightbox.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/rateit.css">
    <link rel="stylesheet" href="assets/css/bootstrap-select.min.css">

    <!-- Demo Purpose Only. Should be removed in production -->
    <link rel="stylesheet" href="assets/css/config.css">

    <link href="assets/css/green.css" rel="alternate stylesheet" title="Green color">
    <link href="assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
    <link href="assets/css/red.css" rel="alternate stylesheet" title="Red color">
    <link href="assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
    <link href="assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link href="css1/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    <link rel="stylesheet" href="css1/animate.css">
    <!-- Resource style -->
    <link rel="stylesheet" href="css1/owl.carousel.css">
    <link rel="stylesheet" href="css1/owl.theme.css">
    <link rel="stylesheet" href="css1/ionicons.min.css">
    <!-- Resource style -->
    <link href="css1/style.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="index.php">Accueil</a></li>
                <li class='active'>Mon programme</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div>

<div class="wrapper">

    <!-- /.container-fluid -->

    <div class="main app form" id="main"><!-- Main Section-->


        <?php
        $ret=mysqli_query($con,"select * from news 
        where newsCategory IN (select id from newscategory 
                              where plan IN (select plan from tbl_payment 
                                            where email = '".$_SESSION['login']."'))");
        while ($row=mysqli_fetch_array($ret))
        {
        ?> 

        <!-- Split Feature1 Section -->
        <div class="split-features">
            <div class="col-md-6 nopadding">
                <div class="split-image"> <img class="img-responsive wow fadeIn" src="images/app_image.png" alt="Image" /> </div>
            </div>
            <div class="col-md-6 nopadding">
                <div class="split-content">
                    <h1 class="wow fadeInUp"><?php echo htmlentities($row['newsName']);?> <br>
                        </h1>
                    <p class="wow fadeInUp"><?php echo htmlentities($row['newsDescription']);?> </p>

                </div>
            </div>
        </div>

        <?php } ?> 
           
            <div> <h3>Désolé, pas de nouvelles pour vous</h3>
        

</div>


<script type="text/javascript" src="js1/jquery-2.1.1.js"></script>
<script type="text/javascript" src="js1/bootstrap.min.js"></script>
<script type="text/javascript" src="js1/plugins.js"></script>
<script type="text/javascript" src="js1/menu.js"></script>
<script type="text/javascript" src="js1/custom.js"></script>
<script src="js1/jquery.subscribe.js"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://checkout.stripe.com/checkout.js"></script>
</body>
</html>











