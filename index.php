<?php
session_start();
error_reporting(0);
include('includes/config.php');

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
  else {
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
      header('location:payment-method.php');
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
<link href="css1/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Nunito+Sans&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Bebas+Neue&display=swap" rel="stylesheet"> 
<script src="https://kit.fontawesome.com/f18998f9c2.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css1/animate.css">
<link rel="stylesheet" href="css1/owl.carousel.css">
<link rel="stylesheet" href="css1/owl.theme.css">
<link rel="stylesheet" href="css1/ionicons.min.css">
<link href="css1/style.css" rel="stylesheet" type="text/css" media="all"/>
</head>
<body>


<div class="wrapper">
  <div class="container">
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container"> 
        <div class="navbar-header page-scroll">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <a class="navbar-brand page-scroll" href="#main"><img src="images/logo.png" width="80" height="30" alt="iLand" /></a> </div>
        <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">

              <li><a class="page-scroll" href="#main">Home</a></li>
              <li><a class="page-scroll" href="#classes">Classes</a></li>
              <li><a class="page-scroll" href="#features">Features</a></li>
              <li><a class="page-scroll" href="#review">Reviews</a></li>
              <li><a class="page-scroll" href="#pricing">Pricing</a></li>
              <li><a class="page-scroll" href="#contact">Contact</a></li>
              <li><a class="page-scroll" href="my-cart.php">Cart</a></li>

              <?php if(strlen($_SESSION['login'])==0)  
              { ?>
                 <li><a class="page-scroll" href="loginfor.php">S'identifier/S'inscrire</a></li>
              <?php
              }
              else{ ?>
                <li><a class="page-scroll" href="my-account.php">Mon compte</a></li>
                <li><a href="logout.php"><i class="page-scroll"></i>Se déconnecter</a></li>
              <?php } ?>
          </ul>
        </div>
      </div>
    </nav>
  </div>

  <div class="main app form" id="main">
    <div class="hero-section">
      <div class="container nopadding">
        <div class="col-md-12">
          <div class="hero-content text-center">
            <h1>HEALTH POWER HAPPINESS</h1>
            <p> Bring to the table win-win survival strategies to ensure proactive domination. </p>
            <a href="#classes" class="btn btn-action wow" style="visibility: visible;">Get Strated</a> </div>
        </div>
      </div>
    </div>
    
    <div class="pitch text-center" id="classes">
      <div class="container">
        <div class="pitch-intro">
          <h1>EVERYTHING IS POSSIBLE WITH ME</h1>
          <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan.</p>
        </div>
        <div class="col-md-12">
          <div class="col-md-4" data-wow-delay="0.2s">
            <div class="pitch-icon"> <i class="ion-ios-checkmark-outline"></i> </div>
            <div class="pitch-content">
              <h1>Personal Training</h1>
              <p> Aliquam vel euismod elit, sed suscipit est. Sed tincidunt venenatis ligula ac luctus. Fusce egestas volutpat mi sed pellentesque. </p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="pitch-icon"> <i class="ion-ios-mic-outline"></i> </div>
            <div class="pitch-content">
              <h1>Cardio Training</h1>
              <p> Aliquam vel euismod elit, sed suscipit est. Sed tincidunt venenatis ligula ac luctus. Fusce egestas volutpat mi sed pellentesque. </p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="pitch-icon"> <i class="ion-ios-folder-outline"></i> </div>
            <div class="pitch-content">
              <h1>Freestyle Training</h1>
              <p> Aliquam vel euismod elit, sed suscipit est. Sed tincidunt venenatis ligula ac luctus. Fusce egestas volutpat mi sed pellentesque. </p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="pitch-icon"> <i class="ion-ios-folder-outline"></i> </div>
            <div class="pitch-content">
              <h1>Sport Nutrition</h1>
              <p> Aliquam vel euismod elit, sed suscipit est. Sed tincidunt venenatis ligula ac luctus. Fusce egestas volutpat mi sed pellentesque. </p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="pitch-icon"> <i class="ion-ios-folder-outline"></i> </div>
            <div class="pitch-content">
              <h1>Functional Training</h1>
              <p> Aliquam vel euismod elit, sed suscipit est. Sed tincidunt venenatis ligula ac luctus. Fusce egestas volutpat mi sed pellentesque. </p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="pitch-icon"> <i class="ion-ios-folder-outline"></i> </div>
            <div class="pitch-content">
              <h1>Crossfit</h1>
              <p> Aliquam vel euismod elit, sed suscipit est. Sed tincidunt venenatis ligula ac luctus. Fusce egestas volutpat mi sed pellentesque. </p>
            </div>
          </div>
        </div>
      </div>
    </div>
   
    <div class="app-features text-center" id="features">
      <div class="container">
        <h1>My promise to you</h1>
        <p> Aliquam sagittis ligula et sem lacinia, ut facilisis enim sollicitudin. Proin nisi est,<br class="hidden-xs">
          convallis nec purus vitae, iaculis posuere sapien. </p>
        <div class="col-md-4 features-left text-right">
          <div>
            <div class="icon" align="center"> <i class="ion-ios-list-outline"></i> </div>
            <div class="feature-single" align="center">
              <p>Will create a plan that’s tailored to your situation and create your everyday nutrition strategies.</p>
            </div>
          </div>
          <div>
            <div class="icon" align="center"> <i class="ion-ios-speedometer-outline"></i> </div>
            <div class="feature-single" align="center">
              <p>Bring to the table win-win survival strategies to ensure proactive domination.</p>
            </div>
          </div>
          <div>
            <div class="icon" align="center"> <i class="ion-ios-pulse"></i> </div>
            <div class="feature-single" align="center">
              <p>Will create a plan that’s tailored to your situation and create your everyday nutrition strategies.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4"> <img class="img-responsive" src="images/iPhone-app.png" alt="App" /> </div>
        <div class="col-md-4 features-left text-left">
          <div class="col-md-12">
            <div class="icon" align="center"> <i class="ion-ios-americanfootball-outline"></i> </div>
            <div class="feature-single" align="center">
              <p> Bring to the table win-win survival strategies to ensure proactive domination.</p>
            </div>
          </div>
          <div class="col-md-12">
            <div class="icon" align="center"> <i class="ion-ios-heart-outline"></i> </div>
            <div class="feature-single" align="center">
              <p>Bring to the table win-win survival strategies to ensure proactive domination.</p>
            </div>
          </div>
          <div class="col-md-12">
            <div class="icon" align="center"> <i class="ion-ios-analytics-outline"></i> </div>
            <div class="feature-single" align="center">
              <p>Will create a plan that’s tailored to your situation and create your everyday nutrition strategies.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Split Feature1 Section -->
    <div class="split-features">
      <div class="col-md-6 nopadding">
        <div class="split-image"> <img class="img-responsive wow fadeIn" src="images/app_image.png" alt="Image" /> </div>
      </div>
      <div class="col-md-6 nopadding">
        <div class="split-content">
          <h1>Keep your body fit & strong to <br>
            live longer</h1>
          <p> Pellentesque eget dolor gravida, tempus purus ac, ultricies mauris. Etiam est nisl, molestie sed egestas bibendum, varius eu diam. Suspendisse est metus, ultrices sit amet dolor in, rhoncus malesuada mi.</p>
          <ul>
            <li>Nulla ornare purus non consequat ultricies.</li>
            <li>Etiam est nisl, molestie sed egestas bibendum</li>
            <li>Aliquam vel euismod elit, sed suscipit est.</li>
            <li>Curabitur egestas justo neque viverra vel. </li>
          </ul>
        </div>
      </div>
    </div>
     <!-- Split Feature2 Section -->
    <div class="split-features2">
      <div class="col-md-6 nopadding">
        <div class="split-content second">
          <h1>See The Results and Feel the difference</h1>
          <p> Pellentesque eget dolor gravida, tempus purus ac, ultricies mauris. Etiam est nisl, molestie sed egestas bibendum, varius eu diam. Suspendisse est metus, ultrices sit amet dolor in, rhoncus malesuada mi.</p>
          <ul>
            <li>Nulla ornare purus non consequat ultricies.</li>
            <li>Etiam est nisl, molestie sed egestas bibendum</li>
            <li>Aliquam vel euismod elit, sed suscipit est.</li>
            <li>Curabitur egestas justo neque viverra vel. </li>
          </ul>
        </div>
      </div>
      <div class="col-md-6 nopadding">
        <div class="split-image"> <img class="img-responsive wow fadeIn" src="images/app_image2.png" alt="Image" /> </div>
      </div>
    </div>
     <!-- Split Feature3 Section -->
    <div class="split-features">
      <div class="col-md-6 nopadding">
        <div class="split-image"> <img class="img-responsive wow fadeIn" src="images/gym-3.jpg" alt="Image" /> </div>
      </div>
      <div class="col-md-6 nopadding">
        <div class="split-content">
          <h1>Command Performance You<br>
            deserve it</h1>
          <p> Pellentesque eget dolor gravida, tempus purus ac, ultricies mauris. Etiam est nisl, molestie sed egestas bibendum, varius eu diam. Suspendisse est metus, ultrices sit amet dolor in, rhoncus malesuada mi.</p>
          <ul>
            <li>Nulla ornare purus non consequat ultricies.</li>
            <li>Etiam est nisl, molestie sed egestas bibendum</li>
            <li>Aliquam vel euismod elit, sed suscipit est.</li>
            <li>Curabitur egestas justo neque viverra vel. </li>
          </ul>
        </div>
      </div>
    </div>
     <!-- Bold call to action Section -->
    <div class="feature-sub">
      <div class="container">
        <div class="sub-inner">
          <h1>If it’s not personal, It’s not possible! See The Results and Feel the difference immediatly.</h1>
          <a href="#" class="btn btn-action">Get Started</a> </div>
      </div>
    </div>
     <!-- Client Section -->
    <div class="review-section" id="review">
      <div class="container">
        <div class="col-md-10 col-md-offset-1">
          <div class="reviews owl-carousel owl-theme">
            <div class="review-single"><img class="img-circle" src="images/customer1.png" alt="Client Testimonoal" />
              <div class="review-text" data-wow-delay="0.2s">
                <p>Morbi eget dictum enim. Praesent sed quam sit amet lorem tempor rhoncus. <br>
                  In hac habitasse platea dictumst. Vivamus in accumsan ex</p>
                <h3>Johnathan Doe</h3>
                <h3>Marketing Head Matrix media</h3>
              </div>
            </div>
            <div class="review-single"><img class="img-circle" src="images/customer2.png" alt="Client Testimonoal" />
              <div class="review-text">
                <p>Morbi eget dictum enim. Praesent sed quam sit amet lorem tempor rhoncus. <br>
                  In hac habitasse platea dictumst. Vivamus in accumsan ex</p>
                <h3>Oidila Matik</h3>
                <h3>President Lexo Inc</h3>
              </div>
            </div>
            <div class="review-single"><img class="img-circle" src="images/customer3.png" alt="Client Testimonoal" />
              <div class="review-text">
                <p>Morbi eget dictum enim. Praesent sed quam sit amet lorem tempor rhoncus. <br>
                  In hac habitasse platea dictumst. Vivamus in accumsan ex</p>
                <h3>- Alex Dattilo</h3>
                <h3>CEO Optima Inc</h3>
              </div>
            </div>
            <div class="review-single"><img class="img-circle" src="images/customer4.png" alt="Client Testimonoal" />
              <div class="review-text">
                <p>Morbi eget dictum enim. Praesent sed quam sit amet lorem tempor rhoncus. <br>
                  In hac habitasse platea dictumst. Vivamus in accumsan ex</p>
                <h3>- Robert Hammer</h3>
                <h3>design head Omega Corp</h3>
              </div>
            </div>
            <div class="review-single"><img class="img-circle" src="images/customer5.png" alt="Client Testimonoal" />
              <div class="review-text">
                <p>Morbi eget dictum enim. Praesent sed quam sit amet lorem tempor rhoncus. <br>
                  In hac habitasse platea dictumst. Vivamus in accumsan ex</p>
                <h3>- Rita Valentine</h3>
                <h3>CEO Behena digital</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div id="pricing" class="pricing-section text-center">
      <div class="container">
        <div class="col-md-12 col-sm-12 nopadding">

          <div class="pricing-intro">
            <h1 class="wow fadeInUp" data-wow-delay="0s">PACKAGES</h1>
            <p class="wow fadeInUp" data-wow-delay="0.2s"> Lorem ipsum dolor sit. Incidunt laborum beatae earum nihil odio consequatur officiis <br class="hidden-xs">
              tempore consequuntur officia ducimus unde doloribus quod unt repell </p>
          </div>
          <div class="col-sm-6">
            <div class="table-left">
                  <?php
                    $con = mysqli_connect("db5000245141.hosting-data.io","dbu402929","EFFitbodyp@S123!@#","dbs239431");
                  $ret=mysqli_query($con,"select * from products where category=1 and subCategory=1");
                  while ($row=mysqli_fetch_array($ret)) {?>
                    <div class="pricing-details">

                      <h2><?php echo htmlentities($row['productName']);?></h2>
                      <span>€</span>
                      <span><?php echo htmlentities($row['productPrice']);?></span>
                        <ul >
                      <li class="description"> <li class="description"> <?php echo htmlentities($row['productDescription']);?> </li></li>
                        </ul>

                      <div id="buynow">

                             <?php if(strlen($_SESSION['login'])==0) 
                              {   ?> 
                                   <button class="btn btn-primary btn-action btn-fill"> <a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>" style="text-decoration:none;">Acheter maintenant</a> </button>
                              <?php

                              }
                              else{ ?>

              <button class="btn btn-primary btn-action btn-fill"> <a href="index.php?page=product&action=buy&id=<?php echo $row['id']; ?>" style="text-decoration:none;">Souscrire</a> </button>


                                  <!-- <form action="StripePayment.php" method="POST" id="payment-to-db" >
                                      <script
                                              src="https://checkout.stripe.com/checkout.js" class="stripe-button btn btn-lg"
                                              data-key="pk_test_BXvlOPceTgdWNCnic2Zxy3Dx00Xa1jK0lk"
                                              data-image="/images/fitness.jpg"
                                              data-name="<?php echo htmlentities($row['productName']);?>"
                                              data-description=" <?php echo htmlentities($row['productDescription']);?>"
                                              data-amount="<?php echo htmlentities($row['productPrice'])*100;?>"
                                              data-label="Souscrire"
                                              data-locale="auto"
                                              data-email="<?php echo$_SESSION['login'];?>"
                                              data-allow-remember-me="false"
                                              data-currency="eur">
                                      </script>
                                      <input type='hidden' name='plan' value='beginner'>
                                  </form> -->
                              <?php }?>
                      </div>
                        <?php }?>

                 </div>

            </div>
          </div>

          <div class="col-sm-6">
            <div class="table-right">

                <?php
                $ret=mysqli_query($con,"select * from products where category=1 and subCategory=2");
                while ($row=mysqli_fetch_array($ret))
                {
                ?>
                <div class="pricing-details">

                    <h2><?php echo htmlentities($row['productName']);?></h2>
                    <span>€</span>
                    <span><?php echo htmlentities($row['productPrice']);?></span>
                    <ul >
                        <li class="description"> <?php echo htmlentities($row['productDescription']);?> </li>
                    </ul>

                    <div id="buynow">
<!--                        <button>-->

                            <?php if(strlen($_SESSION['login'])==0)
                            {   ?>

<!--                                <button class="btn btn-primary btn-action btn-fill"> <a href="login.php?id=--><?php //echo htmlentities($row['id']);?><!--" style="text-decoration:none;">Acheter maintenant</a> </button>-->
                                <button class="btn btn-primary btn-action btn-fill"> <a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>" style="text-decoration:none;">Acheter maintenant</a> </button>
                                <?php
                            }
                            else{ ?>             
                             <button class="btn btn-primary btn-action btn-fill"> <a href="index.php?page=product&action=buy&id=<?php echo $row['id']; ?>" style="text-decoration:none;">Souscrire</a> </button>

                                <!-- <form action="StripePaymentProfessional.php" method="POST" >
                                    <script
                                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                            data-key="pk_test_BXvlOPceTgdWNCnic2Zxy3Dx00Xa1jK0lk"
                                            data-image="/images/fitness.jpg"
                                            data-name="<?php echo htmlentities($row['productName']);?>"
                                            data-description=" <?php echo htmlentities($row['productDescription']);?>"
                                            data-amount="<?php echo htmlentities($row['productPrice'])*100;?>"
                                            data-label="Souscrire"
                                            data-allow-remember-me="false"
                                            data-locale="auto"
                                            data-email="<?php echo$_SESSION['login'];?>"
                                            data-currency="eur">
                                    </script>
                                    <input type='hidden' name='plan' value='professional'>
                                </form> -->
                            <?php } ?>

<!--                        </button>-->

                    </div>

                    <?php }?>
                </div>
              

            </div>
          </div>
        </div>
      </div>
    </div>


<div class="container pack_designs">
<div class="row">
 <?php
                    $con = mysqli_connect("db5000245141.hosting-data.io","dbu402929","EFFitbodyp@S123!@#","dbs239431");
                  $ret=mysqli_query($con,"select * from products where category=1 and subCategory=1");
                  while ($row=mysqli_fetch_array($ret)) {?>
                    <div class="pricing-details">
            <div class="pricing-table-col col-sm-6 col-md-6">

                <div class="pricing-table f1">
                                        <div class="container promo-counter">
                           
            
                           <ul>
                            <li><span id="demo"></span></li>
                            <li><span id="demo_one"></span></li>
                            <li><span id="demo_two"></span></li>
                        </ul>
                  
                    </div>
                                        <div class="pricing-table-header">
                        <div class="pricing-header-title">
                            <h1><?php echo htmlentities($row['productName']);?></h1>
                                                        <span class="subtitle">le tout inclus</span>
                                                    </div>
                        <div class="pricing-header-price">
                            35€
                        </div>
                                                <span class="trait-1-euro">x</span>
                        <span class="price-1-euro">seulement <?php echo htmlentities($row['productPrice']);?>€</span>
                                            </div>             
                  <div class="pricing-table-content">
                        <div class="pricing-table-detail">
                            <div class="pricing-table-detail-item"><i class="fas fa-chevron-right"></i><?php echo htmlentities($row['productDescription']);?></div>
                            <div class="pricing-table-detail-item"><i class="fas fa-chevron-right"></i><?php echo htmlentities($row['productDescription']);?></div>
                            <div class="pricing-table-detail-item"><i class="fas fa-chevron-right"></i><?php echo htmlentities($row['productDescription']);?></div>
                            <div class="pricing-table-detail-item"><i class="fas fa-chevron-right"></i><?php echo htmlentities($row['productDescription']);?></div>
                            <div class="pricing-table-detail-item"><i class="fas fa-chevron-right"></i><?php echo htmlentities($row['productDescription']);?></div>
                            <div class="pricing-table-detail-item"><i class="fas fa-chevron-right"></i><?php echo htmlentities($row['productDescription']);?></div>
                            <div class="pricing-table-detail-item"><i class="fas fa-chevron-right"></i><?php echo htmlentities($row['productDescription']);?></div>
                        </div>
                    </div>
                    <div class="pricing-table-footer">
                       
                         <div id="buynow">
                              <?php if(strlen($_SESSION['login'])==0)
                              {   ?>
                                <a class="btn btn-lg" href="login.php" style="text-decoration:none;">Acheter maintenant</a>
                              <?php
                              }
                              else{ ?>

                                  <form action="StripePayment.php" method="POST" id="payment-to-db" >
                                      <script
                                              src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                              data-key="pk_test_BXvlOPceTgdWNCnic2Zxy3Dx00Xa1jK0lk"
                                              data-image="/images/fitness.jpg"
                                              data-name="<?php echo htmlentities($row['productName']);?>"
                                              data-description=" <?php echo htmlentities($row['productDescription']);?>"
                                              data-amount="<?php echo htmlentities($row['productPrice'])*100;?>"
                                              data-label="Souscrire"
                                              data-locale="auto"
                                              data-email="<?php echo$_SESSION['login'];?>"
                                              data-allow-remember-me="false"
                                              data-currency="eur">
                                      </script>
                                      <input type='hidden' name='plan' value='beginner'>
                                  </form>
                              <?php }?>

                      </div>
                    </div>
                    <?php }?>
                </div>
            </div>
            <div class="pricing-table-col col-sm-6 col-md-6">
            <?php
                $ret=mysqli_query($con,"select * from products where category=1 and subCategory=2");
                while ($row=mysqli_fetch_array($ret))
                {
                ?>
                    
                <div class="pricing-table f1">
                    <div class="pricing-table-header">
                        <div class="pricing-header-title">
                            <h1><?php echo htmlentities($row['productName']);?></h1>
                            <span class="subtitle">pack spécialisé F1</span>
                        </div>
                        <div class="pricing-header-price">
                            <?php echo htmlentities($row['productPrice']);?>€
                        </div>
                    </div>
                    <div class="pricing-table-content">
                        <div class="pricing-table-detail">
                            <div class="pricing-table-detail-item"><i class="fas fa-chevron-right"></i><?php echo htmlentities($row['productDescription']);?></div>
                            <div class="pricing-table-detail-item"><i class="fas fa-chevron-right"></i><?php echo htmlentities($row['productDescription']);?></div>
                            <div class="pricing-table-detail-item"><i class="fas fa-chevron-right"></i><?php echo htmlentities($row['productDescription']);?></div>
                            <div class="pricing-table-detail-item"><i class="fas fa-chevron-right"></i><?php echo htmlentities($row['productDescription']);?></div>
                            <div class="pricing-table-detail-item"><i class="fas fa-chevron-right"></i><?php echo htmlentities($row['productDescription']);?></div>
                            <div class="pricing-table-detail-item"><i class="fas fa-chevron-right"></i><?php echo htmlentities($row['productDescription']);?></div>
                            <div class="pricing-table-detail-item"><i class="fas fa-chevron-right"></i><?php echo htmlentities($row['productDescription']);?></div>
                        </div>
                    </div>
                    <div class="pricing-table-footer">

<div id="buynow">

                            <?php if(strlen($_SESSION['login'])==0)
                            {   ?>

                              <a class="btn btn-lg" href="login.php" style="text-decoration:none;">Acheter maintenant</a>
                                <?php
                            }
                            else{ ?>

                                <form action="StripePaymentProfessional.php" method="POST" >
                                    <script
                                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                            data-key="pk_test_BXvlOPceTgdWNCnic2Zxy3Dx00Xa1jK0lk"
                                            data-image="/images/fitness.jpg"
                                            data-name="<?php echo htmlentities($row['productName']);?>"
                                            data-description=" <?php echo htmlentities($row['productDescription']);?>"
                                            data-amount="<?php echo htmlentities($row['productPrice'])*100;?>"
                                            data-label="Souscrire"
                                            data-allow-remember-me="false"
                                            data-locale="auto"
                                            data-email="<?php echo$_SESSION['login'];?>"
                                            data-currency="eur">
                                    </script>
                                    <input type='hidden' name='plan' value='professional'>
                                </form>
                            <?php } ?>


                    </div>

                    <?php }?>

                    </div>
                </div>
                
            </div>
       
                
            </div>
            </div>

</div>

<style>
.pack_designs {
    margin-bottom: 66px;
}


ul,
li {
    margin: 0;
    padding: 0;
}

/*
-----------------------------------------
Style Section
-----------------------------------------
*/


.pricing-table {
    background: url("images/bg_image.jpg") no-repeat;
    background-size: cover;
    background-position: center center;
    width: 70%;
    transition: transform .2s;
    padding-bottom: 30px;
    position: relative;
    left: 50%;
    transform: translateX(-50%);
    transition: .5s;
}

.pricing-table.f1 {
    background: url("images/bg_image.jpg") no-repeat;
    background-size: cover;
}

.pricing-table.america {
    background: url("images/bg_image.jpg") no-repeat;
    background-size: cover;
}

.pricing-header-price {
    width: 80px;
    height: 80px;
    background: rgb(255,215,0);
    clip-path: polygon(50% 0%, 100% 50%, 50% 100%, 0% 50%);
    position: absolute;
    right: 5px;
    top: 20px;
    text-align: center;
    font-size: 26px;
    font-weight: bold;
    line-height: 80px;
}

.pricing-table.f1 .pricing-header-title {
    background: #000;
}

.pricing-table.america .pricing-header-title {
    background: #091386;
}

.pricing-header-title {
    width: 85%;
    height: 55px;
    display: block;
    background: #222;
    top: 33px;
    position: relative;
    padding: 5px;
}

.pricing-header-title h1 {
    color: #fff;
    font-family: 'Bebas Neue', cursive;
    font-size: 36px;
    position: absolute;
    top: 0px;
}

.pricing-header-title .subtitle {
    color: #fff;
    position: absolute;
    top: 32px;
    text-transform: uppercase;
    width: 100%;
    font-size: 15px;
    font-family: sans-serif;
}
.pricing-table:hover {
    box-shadow: 6px 7px 16px -6px rgba(0,0,0,0.4);
    -webkit-box-shadow: 6px 7px 16px -6px rgba(0,0,0,0.4);
    -moz-box-shadow: 6px 7px 16px -6px rgba(0,0,0,0.4);
    margin-top: -20px;
}

.pricing-table-content {
    margin-top: 40px;
    padding: 30px 3%;
}

.pricing-table-content i {
    margin-right: 10px;
}
.pricing-table-detail-item {
    font-weight: 600;
    margin-bottom: 11px;
    color: #000;

}
.trait-1-euro {
    position: absolute;
    right: 23px;
    top: 7px;
    color: rgba(253,29,29,1);
    font-size: 88px;
    font-weight: 300;
    font-family: sans-serif;
}
.price-1-euro {
    z-index: 1;
    position: absolute;
    color: #FFF;
    background: #f61a22;
    right: 0px;
    padding: 2px 8px;
    font-weight: bold;
    top: 84px;
    font-size: 20px;
    text-transform: uppercase;
    width: 239px;
    text-indent: 40px;
    background: rgb(194,12,12);
    background: radial-gradient(circle, rgba(194,12,12,1) 0%, rgba(253,29,29,1) 50%, rgba(194,12,12,1) 100%);      
    clip-path: polygon(20% 0, 100% 0, 100% 100%, 0 100%);
}
.pricing-table-footer .btn {
    margin: 0 auto;
    width: 80%;
    display: block;
    background: rgb(255,215,0);
    background: radial-gradient(circle, rgba(255,215,0,1) 0%, rgba(255,181,0,1) 100%);
    color: #222;
    text-transform: uppercase;
    transition: .5s;
    font-weight: 700;
}
.pricing-table-footer .btn:hover {
    background: rgb(255,215,0);
}
.pricing-table-small {
    margin-top: 10px;
    text-align: center;
    font-size: 11px;
    color: #222;
}

.promo-counter {
    list-style: none;
    position: absolute;
    left: 50%;
    width: 189px;
    transform: translateX(-50%);
    top: -20px;
}
.promo-counter ul li {
    display: inline-block;
    font-size: 15px;
    width: 50px;
    text-align: center;
}

.promo-counter span {
    color: #fff;
    width: 45px;
    height: 40px;
    font-size: 26px;
    background: rgb(194,12,12);
    background: radial-gradient(circle, rgba(194,12,12,1) 0%, rgba(253,29,29,1) 50%, rgba(194,12,12,1) 100%);
    display: block;
    text-align: center;
    line-height: 40px;
    font-family: 'Bebas Neue', cursive;
    -webkit-box-shadow: 2px 2px 8px 1px rgba(0,0,0,0.61); 
    box-shadow: 2px 2px 8px 1px rgba(0,0,0,0.61);
    margin: 0 auto;
}

 @media only screen and (max-width: 600px){
  .pricing-table-col {
      margin-top: 26px;
  }

 .pricing-table {
    width: 100% !important;
}
.pricing-details {
    padding: 0 !important;
}
.pricing-table-footer .btn {
    font-size: 15px;
}
}
.stripe-button-el span {
background: radial-gradient(circle, 
rgb(255, 215, 0) 0%,
rgb(255, 181, 0) 100%);
color:#222;
font-weight: 700;
padding-top: 5px;
padding-bottom: 36px;
font-size: 18px;
  border: 1px solid #fff;
}
.stripe-button-el {
    width: 80%;
  background: transparent;
}
#payment-to-db {
    text-align: center !important;
}
form {
    text-align: center;
}
.stripe-button-el span:hover {
    background: 
    rgb(255,215,0);
    transition: .5s;
}          
        </style>




    
    <!-- Footer Section -->
    <div class="footer" id="contact">
      <div class="container">
        <div class="col-md-6 contact p text-align-center">
          <h1 class ="center">About Trainer</h1>
          <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, <br>
            vel illum dolore eu feugiat nulla facilisis at vero Duis autem vel eum iriure dolor in <br>
            hendrerit in vulputate velit esse eros et accumsan.</p>
          <p>Pellentesque eget dolor gravida, tempus purus ac, ultricies mauris. Etiam est nisl,<br>
            molestie sed egestas bibendum, varius eu diam.</p>
        </div>
        <div class="col-md-3 contact footer-menu">
          <h1 class ="center">Social</h1>
          <ul>
            <li><a href="#">Facebook</a></li>
            <li><a href="#">Twitter</a></li>
            <li><a href="#">Github</a></li>
            <li><a href="#">Pinterest</a></li>
            <li><a href="#">Google Plus</a></li>
          </ul>
        </div>
        <div class="col-md-3 contact">
          <h1 class ="center">Contact Us</h1>
          <p> Contact our 24/7 customer support if you have any questions. We'll help you out. </p>
          <a href="mailto:contactt@gmail.com">contact@gmail.com</a> </div>
      </div>
    </div>
  </div>
  
  <!-- Scroll To Top --> 
  
  <a id="back-top" class="back-to-top page-scroll" href="#main"> <i class="ion-ios-arrow-thin-up"></i> </a> 
  
  <!-- Scroll To Top Ends--> 
  
</div>
  

<script type="text/javascript" src="js1/jquery-2.1.1.js"></script> 
<script type="text/javascript" src="js1/bootstrap.min.js"></script> 
<script type="text/javascript" src="js1/plugins.js"></script> 
<script type="text/javascript" src="js1/menu.js"></script> 
<script type="text/javascript" src="js1/custom.js"></script> 
<script src="js1/jquery.subscribe.js"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://checkout.stripe.com/checkout.js"></script>


 <script>
// Set the date we're counting down to
var countDownDate = new Date("Jan 5, 2021 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = hours + " h ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script> 







 <script>
// Set the date we're counting down to
var countDownDate = new Date("Jan 5, 2021 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo_one").innerHTML =minutes + " m ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo_one").innerHTML = "EXPIRED";
  }
}, 1000);
</script>





 <script>
// Set the date we're counting down to
var countDownDate = new Date("Jan 5, 2021 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo_two").innerHTML = seconds + " s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo_two").innerHTML = "EXPIRED";
  }
}, 1000);
</script> 
</body>
</html>
  