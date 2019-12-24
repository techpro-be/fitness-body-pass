<?php
session_start();
error_reporting(0);
include('includes/config.php');
// if(isset($_GET['action']) && $_GET['action']=="add"){
// 	$id=intval($_GET['id']);
// 	if(isset($_SESSION['cart'][$id])){
// 		$_SESSION['cart'][$id]['quantity']++;
// 	}else{
// 		$sql_p="SELECT * FROM products WHERE id={$id}";
// 		$query_p=mysqli_query($con,$sql_p);
// 		if(mysqli_num_rows($query_p)!=0){
// 			$row_p=mysqli_fetch_array($query_p);
// 			$_SESSION['cart'][$row_p['id']]=array("quantity" => 1, "price" => $row_p['productPrice']);
// 			header('location:index.php');
// 		}else{
// 			$message="Product ID is invalid";
// 		}
// 	}
// }


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
<link rel="stylesheet" href="css1/animate.css">
<!-- Resource style -->
<link rel="stylesheet" href="css1/owl.carousel.css">
<link rel="stylesheet" href="css1/owl.theme.css">
<link rel="stylesheet" href="css1/ionicons.min.css">
<!-- Resource style -->
<link href="css1/style.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>

		<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1">
<?php include('includes/menu-bar.php');?>
</header>

<!-- ============================================== HEADER : END ============================================== -->

<div class="wrapper">
  <div class="container">
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container"> 
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <a class="navbar-brand page-scroll" href="#main"><img src="images/logo.png" width="80" height="30" alt="iLand" /></a> </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a class="page-scroll" href="#main">Home</a></li>
            <li><a class="page-scroll" href="#classes">Classes</a></li>
            <li><a class="page-scroll" href="#features">Features</a></li>
            <li><a class="page-scroll" href="#review">Reviews</a></li>
            <li><a class="page-scroll" href="#pricing">Pricing</a></li>
            <li><a class="page-scroll" href="#contact">Contact</a></li>
            <li><a class="page-scroll" href="login.php">Register</a></li>
            <li><a class="page-scroll" href="login.php">Login</a></li>
            <!-- <li><a class="page-scroll" href="my-account.php"><i ></i>My Account</a></li> -->
          </ul>
        </div>
      </div>
    </nav>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid -->
  
  <div class="main app form" id="main"><!-- Main Section-->
    <div class="hero-section">
      <div class="container nopadding">
        <div class="col-md-12">
          <div class="hero-content text-center">
            <h1 class="wow fadeInUp" data-wow-delay="0.1s">HEALTH POWER HAPPINESS</h1>
            <p class="wow fadeInUp" data-wow-delay="0.2s"> Bring to the table win-win survival strategies to ensure proactive domination. </p>
            <a href="#classes" class="btn btn-action wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">Get Strated</a> </div>
        </div>
      </div>
    </div>
    <!-- Classes Section -->
    <div class="pitch text-center" id="classes">
      <div class="container">
        <div class="pitch-intro">
          <h1 class="wow fadeInDown" data-wow-delay="0.2s">EVERYTHING IS POSSIBLE WITH ME</h1>
          <p class="wow fadeInDown" data-wow-delay="0.2s">Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan.</p>
        </div>
        <div class="col-md-12">
          <div class="col-md-4 wow fadeInDown" data-wow-delay="0.2s">
            <div class="pitch-icon"> <i class="ion-ios-checkmark-outline"></i> </div>
            <div class="pitch-content">
              <h1>Personal Training</h1>
              <p> Aliquam vel euismod elit, sed suscipit est. Sed tincidunt venenatis ligula ac luctus. Fusce egestas volutpat mi sed pellentesque. </p>
            </div>
          </div>
          <div class="col-md-4 wow fadeInDown" data-wow-delay="0.2s">
            <div class="pitch-icon"> <i class="ion-ios-mic-outline"></i> </div>
            <div class="pitch-content">
              <h1>Cardio Training</h1>
              <p> Aliquam vel euismod elit, sed suscipit est. Sed tincidunt venenatis ligula ac luctus. Fusce egestas volutpat mi sed pellentesque. </p>
            </div>
          </div>
          <div class="col-md-4 wow fadeInDown" data-wow-delay="0.2s">
            <div class="pitch-icon"> <i class="ion-ios-folder-outline"></i> </div>
            <div class="pitch-content">
              <h1>Freestyle Training</h1>
              <p> Aliquam vel euismod elit, sed suscipit est. Sed tincidunt venenatis ligula ac luctus. Fusce egestas volutpat mi sed pellentesque. </p>
            </div>
          </div>
          <div class="col-md-4 wow fadeInDown" data-wow-delay="0.2s">
            <div class="pitch-icon"> <i class="ion-ios-folder-outline"></i> </div>
            <div class="pitch-content">
              <h1>Sport Nutrition</h1>
              <p> Aliquam vel euismod elit, sed suscipit est. Sed tincidunt venenatis ligula ac luctus. Fusce egestas volutpat mi sed pellentesque. </p>
            </div>
          </div>
          <div class="col-md-4 wow fadeInDown" data-wow-delay="0.2s">
            <div class="pitch-icon"> <i class="ion-ios-folder-outline"></i> </div>
            <div class="pitch-content">
              <h1>Functional Training</h1>
              <p> Aliquam vel euismod elit, sed suscipit est. Sed tincidunt venenatis ligula ac luctus. Fusce egestas volutpat mi sed pellentesque. </p>
            </div>
          </div>
          <div class="col-md-4 wow fadeInDown" data-wow-delay="0.2s">
            <div class="pitch-icon"> <i class="ion-ios-folder-outline"></i> </div>
            <div class="pitch-content">
              <h1>Crossfit</h1>
              <p> Aliquam vel euismod elit, sed suscipit est. Sed tincidunt venenatis ligula ac luctus. Fusce egestas volutpat mi sed pellentesque. </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Features Section -->
    <div class="app-features text-center" id="features">
      <div class="container">
        <h1 class="wow fadeInDown" data-wow-delay="0.1s">My promise to you</h1>
        <p class="wow fadeInDown" data-wow-delay="0.2s"> Aliquam sagittis ligula et sem lacinia, ut facilisis enim sollicitudin. Proin nisi est,<br class="hidden-xs">
          convallis nec purus vitae, iaculis posuere sapien. </p>
        <div class="col-md-4 features-left text-right">
          <div class="col-md-12 wow fadeInDown" data-wow-delay="0.2s">
            <div class="icon" align="center"> <i class="ion-ios-list-outline"></i> </div>
            <div class="feature-single" align="center">
              <p>Will create a plan that’s tailored to your situation and create your everyday nutrition strategies.</p>
            </div>
          </div>
          <div class="col-md-12 wow fadeInDown" data-wow-delay="0.3s">
            <div class="icon" align="center"> <i class="ion-ios-speedometer-outline"></i> </div>
            <div class="feature-single" align="center">
              <p>Bring to the table win-win survival strategies to ensure proactive domination.</p>
            </div>
          </div>
          <div class="col-md-12 wow fadeInDown" data-wow-delay="0.4s">
            <div class="icon" align="center"> <i class="ion-ios-pulse"></i> </div>
            <div class="feature-single" align="center">
              <p>Will create a plan that’s tailored to your situation and create your everyday nutrition strategies.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 wow fadeInDown" data-wow-delay="0.5s"> <img class="img-responsive" src="images/iPhone-app.png" alt="App" /> </div>
        <div class="col-md-4 features-left text-left">
          <div class="col-md-12 wow fadeInDown" data-wow-delay="0.6s">
            <div class="icon" align="center"> <i class="ion-ios-americanfootball-outline"></i> </div>
            <div class="feature-single" align="center">
              <p> Bring to the table win-win survival strategies to ensure proactive domination.</p>
            </div>
          </div>
          <div class="col-md-12 wow fadeInDown" data-wow-delay="0.7s">
            <div class="icon" align="center"> <i class="ion-ios-heart-outline"></i> </div>
            <div class="feature-single" align="center">
              <p>Bring to the table win-win survival strategies to ensure proactive domination.</p>
            </div>
          </div>
          <div class="col-md-12 wow fadeInDown" data-wow-delay="0.8s">
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
          <h1 class="wow fadeInUp">Keep your body fit & strong to <br>
            live longer</h1>
          <p class="wow fadeInUp"> Pellentesque eget dolor gravida, tempus purus ac, ultricies mauris. Etiam est nisl, molestie sed egestas bibendum, varius eu diam. Suspendisse est metus, ultrices sit amet dolor in, rhoncus malesuada mi.</p>
          <ul class="wow fadeInUp">
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
          <h1 class="wow fadeInUp">See The Results and Feel the difference</h1>
          <p class="wow fadeInUp"> Pellentesque eget dolor gravida, tempus purus ac, ultricies mauris. Etiam est nisl, molestie sed egestas bibendum, varius eu diam. Suspendisse est metus, ultrices sit amet dolor in, rhoncus malesuada mi.</p>
          <ul class="wow fadeInUp">
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
          <h1 class="wow fadeInUp">Command Performance You<br>
            deserve it</h1>
          <p class="wow fadeInUp"> Pellentesque eget dolor gravida, tempus purus ac, ultricies mauris. Etiam est nisl, molestie sed egestas bibendum, varius eu diam. Suspendisse est metus, ultrices sit amet dolor in, rhoncus malesuada mi.</p>
          <ul class="wow fadeInUp">
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
          <h1 class="wow fadeInUp">If it’s not personal, It’s not possible! See The Results and Feel the difference immediatly.</h1>
          <a href="#" class="btn btn-action wow fadeInUp">Get Started</a> </div>
      </div>
    </div>
     <!-- Client Section -->
    <div class="review-section" id="review">
      <div class="container">
        <div class="col-md-10 col-md-offset-1">
          <div class="reviews owl-carousel owl-theme">
            <div class="review-single"><img class="img-circle" src="images/customer1.png" alt="Client Testimonoal" />
              <div class="review-text wow fadeInUp" data-wow-delay="0.2s">
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
    <!-- Package Section -->
    <div id="pricing" class="pricing-section text-center">
      <div class="container">
        <div class="col-md-12 col-sm-12 nopadding">

          <div class="pricing-intro">
            <h1 class="wow fadeInUp" data-wow-delay="0s">PACKAGES</h1>
            <p class="wow fadeInUp" data-wow-delay="0.2s"> Lorem ipsum dolor sit. Incidunt laborum beatae earum nihil odio consequatur officiis <br class="hidden-xs">
              tempore consequuntur officia ducimus unde doloribus quod unt repell </p>
          </div>
          <div class="col-sm-6">
            <div class="table-left wow fadeInUp" data-wow-delay="0.4s">
              <div class="pricing-details">

                <h2>For Beginners</h2>
                <span>$49.50</span>

                <ul>
                  <li>Consectetur adipiscing</li>
                  <li>Nunc luctus nulla et tellus</li>
                  <li>Suspendisse quis metus</li>
                  <li>Vestibul varius fermentum erat</li>
                </ul>

                <div id="buynow">
                  <button class="btn btn-primary btn-action btn-fill" id="payButton">
                    <a href="order-details.php" style="text-decoration:none;"> Buy Now</a> 
                  </button>
                  <input type="hidden" id="payProcess" value="0"/>
                </div>
                
              </div>

            </div>
          </div>
          <div class="col-sm-6">
            <div class="table-right wow fadeInUp" data-wow-delay="0.6s">
              
              <div class="pricing-details">
                <h2>For Professionals</h2>
                <span>$99.50</span>
                <ul>
                  <li>Consectetur adipiscing</li>
                  <li>Nunc luctus nulla et tellus</li>
                  <li>Suspendisse quis metus</li>
                  <li>Vestibul varius fermentum erat</li>
                </ul>
               <div id="buynow">
                  <button class="btn btn-primary btn-action btn-fill"> 
                    <a href="order-details.php" style="text-decoration:none;"> Buy Now</a> 
                  </button>
                </div>
              </div>
              

            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Subscribe Form -->
    <div class="cta-sub no-color">
      <div class="container">
        <div class="cta-inner">
          <h1 class="wow fadeInUp" data-wow-delay="0s">Sign Up to Our Newsletter and get exciting offers</h1>
          <p class="wow fadeInUp" data-wow-delay="0.2s"> Enter your email address we promise, never disclose<br class="hidden-xs">
            or sell your email address. </p>
          <div class="form wow fadeInUp" data-wow-delay="0.3s">
            <form class="subscribe-form center-form wow zoomIn" action="" method="post" name="subscribeform" id="subscribeform">
              <input class="mail" type="email" name="email" placeholder="Join the wait list" autocomplete="off" id="subemail">
              <input class="submit-button" type="submit" value="Subscribe" name="send" id="subsubmit">
            </form>
            <!-- subscribe message -->
            <div id="mesaj"></div>
            <!-- subscribe message --> 
          </div>
        </div>
      </div>
    </div>
    
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
</body>
</html>











