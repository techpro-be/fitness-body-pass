<?php
session_start();
error_reporting(0);
include_once('includes/config.php');
// Code user Registration
if(isset($_POST['submit']))
{
$name=$_POST['fullname'];
$email=$_POST['emailid'];
$contactno=$_POST['contactno'];
$password=md5($_POST['password']);
    $con = mysqli_connect("db5000245141.hosting-data.io","dbu402929","EFFitbodyp@S123!@#","dbs239431");
    $query=mysqli_query($con,"insert into users(name,email,contactno,password) values('$name','$email','$contactno','$password')");
if($query)
{
	echo "<script>alert('Vous êtes enregistré avec succès, veuillez vous connecter pour accéder');</script>";
}
else{
echo "<script>alert('Quelque chose a mal tourné. Veuillez réessayer');</script>";
}
}
// Code for User login
if(isset($_POST['login']))
{
   $email=$_POST['email'];
   $password=md5($_POST['password']);
$query=mysqli_query($con,"SELECT * FROM users WHERE email='$email' and password='$password'");
$login_num = mysqli_num_rows($query);
$num=mysqli_fetch_array($query);
if($login_num>0)
{
$extra="index.php";
$_SESSION['login']=$email;
$_SESSION['id']=$num['id'];
$_SESSION['username']=$num['name'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
$log=mysqli_query($con,"insert into userlog(userEmail,userip,status) values('".$email."','$uip','$status')");
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
echo "<script>window.location.href = 'http://$host$uri/$extra';</script>";
}
else
{
$extra="connection_page.php";
$email=$_POST['email'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=0;
$log=mysqli_query($con,"insert into userlog(userEmail,userip,status) values('$email','$uip','$status')");
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
$_SESSION['errmsg']="Identifiant e-mail ou mot de passe invalide";
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

	    <title>FitBody Pass | Se connecter | S'inscrire</title>

	    <!-- Bootstrap Core CSS -->
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	    
	    <!-- Customizable CSS -->
	    <link rel="stylesheet" href="assets/css/main.css">
	    <link rel="stylesheet" href="assets/css/green.css">
	    <link rel="stylesheet" href="assets/css/owl.carousel.css">
		<link rel="stylesheet" href="assets/css/owl.transitions.css">
		<!--<link rel="stylesheet" href="assets/css/owl.theme.css">-->
		<link href="assets/css/lightbox.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/animate.min.css">
		<link rel="stylesheet" href="assets/css/rateit.css">
		<link rel="stylesheet" href="assets/css/bootstrap-select.min.css">

		
		<!-- Icons/Glyphs -->
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">

        <!-- Fonts --> 
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
      <script src="https://kit.fontawesome.com/f18998f9c2.js" crossorigin="anonymous"></script>

		
		<!-- Favicon -->
		<link rel="shortcut icon" href="assets/images/favicon.ico">
<script type="text/javascript">
function valid()
{
 if(document.register.password.value!= document.register.confirmpassword.value)
{
alert("\n" + "Le mot de passe et le champ de confirmation du mot de passe ne correspondent pas  !!");
document.register.confirmpassword.focus();
return false;
}
return true;
}
</script>
    	<script>
function userAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'email='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>

 <style>
@font-face {
    font-family: "HeyBrights";
    src: url("../fonts/HeyBrights.ttf");
}

@font-face {
    font-family: "BebasNeue-Regular";
    src: url("../fonts/BebasNeue-Regular.ttf");
}

@font-face {
    font-family: "Leixo";
    src: url("../fonts/LEIXO-DEMO.ttf");
  }


@import url('https://fonts.googleapis.com/css?family=Oswald&display=swap');
@import"https://fonts.googleapis.com/css?family=Raleway:300,400,500,700,900";
@import"https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700";
@import"https://fonts.googleapis.com/css?family=Montserrat:600,600i,700,700i,800,800i,900,900i|Poppins:300,300i,400,400i,500,500i,600,600i,700";
@import url('https://fonts.googleapis.com/css?family=Caveat+Brush&display=swap');
@import url('https://fonts.googleapis.com/css?family=Permanent+Marker&display=swap');

/*
-----------------------------------------
General Section
-----------------------------------------
*/
body {
    font-size: 16px;
    font-weight: 300;
    height: 100%;
    font-family: 'Nunito Sans', sans-serif;
}

body.no-scroll {
    overflow: hidden;
}

html,
body {
    height: 100%;
    color: #333;
}

h1,
h2,
h3,
h4,
h5,
h6 {
    font-family: 'Raleway', sans-serif;
}

a {
    text-decoration: none;
    -webkit-transition: all 0.4s;
    -webkit-transition: all 0.2s;
    transition: all 0.2s;
}

img {
    width: 100%;
}

a:hover {
    text-decoration: none;
}

a:focus {
    outline: none;
    text-decoration: none;
}

p {
    line-height: 28px;
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
 .section-padding {
     padding: 100px 0;
 }
 .section-padding-60{
    padding: 60px 0;
 }
 .section-title {
     margin-bottom: 65px;
     text-align: center;
     position: relative;
     z-index: 1;
 }
 .section-title h2 {
     font-size: 30px;
     text-transform: uppercase;
     display: inline-block;
     margin-bottom: 5px;
     font-weight: 800;
 }
.title-bottom {
    font-family: 'Montserrat', sans-serif;
    position: absolute;
    top: -35px;
    left: 0;
    font-size: 100px;
    font-weight: 800;
    text-align: center;
    right: 0;
    color: #e9eaf7;
    text-transform: lowercase;
    z-index: -1;
    opacity: 0.9;
}

.section-title h2 span {}

.section-title h2 span {
    color: #FE9400;
}

.client-panel.active {
    display: block;
    z-index: 20;
}

.client-panel {
    background: #fff;
    width: 25%;
    height: 100%;
    transition: all .3s;
    padding-top: 25px;
    margin: 0 auto;
}
.form-group {
    margin-bottom: 15px;
}
.btn-lg {
    padding: 10px 16px;
    font-size: 18px;
    line-height: 1.3333333;
    border-radius: 6px;
}
.client-panel-container.active {
    margin-right: 0px;
}

.client-panel-container .section-title {
    margin-bottom: 30px;
}

.client-panel-container .section-title h2 {
    font-size: 27px;
}
.login input[type="text"],
.login input[type="email"], .login input[type="password"], .login input[type="datetime-local"], .login select, .login textarea  {
    border: 1px solid #f6b93b;
    height: 50px;
    font-weight: 300;
    border-radius: 3px;
    text-indent: 10px;
}


.login input::placeholder {
    font-weight: 200;
    color: #aaa2a2f0;
}

.login input[type="text"]:focus,
.login input[type="email"]:focus,
.login input[type="password"]:focus,
.login input[type="datetime-local"]:focus,
.login select:focus,
.login textarea:focus {
    border-color: #f6b93b;
    box-shadow: 0 1px 1px rgba(246, 185, 59, 0.075) inset, 0 0 8px rgba(246, 185, 59, 0.6);
}

.btn-password {
    text-transform: uppercase;
    float: right;
    padding: 0;
    font-size: 11px;
    line-height: 23px;
}

.btn-red {
    background: #FE9400;
    color: #fff;
    text-transform: uppercase;
    margin-bottom: 30px;
}

.btn-gold {
    color: #222;
    text-transform: uppercase;
    background: rgb(255,215,0);
    background: radial-gradient(circle, #FE9400 0%, rgba(255,181,0,1) 100%);
}
.btn-red:hover, .btn-gold:hover  {
    box-shadow: 6px 7px 16px -6px rgba(0,0,0,0.4);
    -webkit-box-shadow: 6px 7px 16px -6px rgba(0,0,0,0.4);
    -moz-box-shadow: 6px 7px 16px -6px rgba(0,0,0,0.4);
    color: #222;
}

.panel-devenir-vip {
    border: 1px solid #f6b93b;
    border-radius: 4px;
    padding: 15px 15px;
    /* margin-top: 40px; */
}

.panel-devenir-vip h1 {
    font-size: 22px;
    text-transform: uppercase;
    padding: 0;
    margin: 0;
    margin-bottom: 20px;
}

.panel-devenir-vip h1 span {
    color: #FE9400;
    font-weight: bolder;
}

.panel-devenir-vip ul {
    list-style: none;
}

.panel-devenir-vip li {
    margin-bottom: 6px;
    font-weight: 300;
}

.panel-devenir-vip li i {
    color: #FE9400
}

.btn-logout {
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
    background: #000;
    border-radius: 0px;
    padding: 20px;
    color: #fff;
}
.btn-logout:hover {
    color: #6f6e6e;
}
.client-panel-container p {
    font-weight: 200;
}
.section-title {
    font-size: 14px;
    font-family: 'FjallaOneRegular';
    text-transform: uppercase;
    border-bottom: 1px 
    transparent;
    margin-bottom: 0px !important;
}
.outer-xs {
    margin-top: -9px;
    margin-bottom: 29px;
}
@media only screen and (max-width: 700px){
    .client-panel {
        width: 90% !important;
    }
    .client-panel-container {
        padding-top: 15px !important;
    }
    .outer-top-bd {
       margin-top: 0px;
    }
    .section-title {
      font-size: 12px !important;
   }
   .section-title h2 {
    font-size: 28px !important;
    }
}

@media only screen and (max-width: 1200px) and (min-width: 701px){
    .client-panel {
        width: 45% !important;
    }
}
</style>

	</head>
    <body class="cnt-home">
	

<!-- ============================================== HEADER : END ============================================== -->

<div class="body-content outer-top-bd">
	<div class="client-panel container">
		<div class="sign-in-page inner-bottom-sm">
			<div class="row">
				<!-- Sign-in -->			
<div class="col-md-12 col-sm-12 col-xs-12">

<div class="section-title">
                <h2>se <span>connecter</span></h2>
                <p class="">Bonjour, Bienvenue sur votre compte.</p>
                </div>
            </div> 
	<form class="register-form outer-top-xs login" method="post">
	<span style="color:red;" >
<?php
echo htmlentities($_SESSION['errmsg']);
?>
<?php
echo htmlentities($_SESSION['errmsg']="");
?>
	</span>
		<div class="form-group">
		    <input type="email" name="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Adresse E-Mail" autocomplete="email" autofocus="">

		</div>
	  	<div class="form-group">
		 <input type="password" name="password" class="form-control unicase-form-control text-input" id="exampleInputPassword1" placeholder="Mot de passe" autocomplete="current-password">

		</div>
		<div class="radio outer-xs">
		  	<a href="forgot-password.php" class="btn btn-link btn-password pull-right">Mot de passe oublié?</a>
       
		</div>
	  	<button type="submit" class="btn btn-red btn-lg checkout-page-button" style="width: 100%;" name="login">S'identifier
        </button>
	</form>	
			<div class="panel-devenir-vip">
            <h1 class="text-center">Rejoindre le <span>VIP</span></h1>
            <ul>
                <li><i class="fas fa-check"></i> Pronos et analyses exclusives</li>
                <li><i class="fas fa-check"></i> Tout sport européens</li>
                <li><i class="fas fa-check"></i> Entraide communautaire</li>
            </ul>
            <a href="/devenir-vip" class="btn btn-gold" style="width: 100%; margin-top: 15px;">Devenir VIP</a>
        </div>		
</div>
<!-- Sign-in -->

		</div>
</div>
</div>


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

	<!-- For demo purposes – can be removed on production -->
	
	<script src="switchstylesheet/switchstylesheet.js"></script>
	
	<script>
		$(document).ready(function(){ 
			$(".changecolor").switchstylesheet( { seperator:"color"} );
			$('.show-theme-options').click(function(){
				$(this).parent().toggleClass('open');
				return false;
			});
		});

		$(window).bind("load", function() {
		   $('.show-theme-options').delay(2000).trigger('click');
		});
	</script>
	<!-- For demo purposes – can be removed on production : End -->

	
</body>
</html>