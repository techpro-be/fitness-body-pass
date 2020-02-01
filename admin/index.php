<?php //
//session_start();
//error_reporting(0);
//include('includes/config.php');
//if(strlen($_SESSION['login'])==0)
//    {
//header('location:login.php');
//}
//else{
//	if (isset($_POST['submit'])) {
//
//        $con = mysqli_connect("db5000245141.hosting-data.io","dbu402929","EFFitbodyp@S123!@#","dbs239431");
//        mysqli_query($con,"update orders set 	paymentMethod='".$_POST['paymethod']."' where userId='".$_SESSION['id']."' and paymentMethod is null ");
//		unset($_SESSION['cart']);
//		header('location:order-history.php');
//
//	}
//?>
<?php
session_start();
error_reporting(0);
include("include/config.php");
if(isset($_POST['submit']))
{
$username=$_POST['username'];
$password=$_POST['password'];
$login_sql = "SELECT * FROM admin WHERE username='$username' and password='$password'";
$ret=mysqli_query($con,$login_sql);
$rett = mysqli_num_rows($ret);
$num=mysqli_fetch_array($ret);
if($rett>0)
{
//$extra="change-password.php";
$_SESSION['alogin']=$username;
$_SESSION['uname']=$username;
//$_SESSION['id']=$num['id'];
//$host=$_SERVER['HTTP_HOST'];
//$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
echo "<script>window.location.href = 'http://fitbodypass.fr/admin/manage-payments.php?uname=".$username."';</script>";
}
else
{
$_SESSION['errmsg']="Nom d'utilisateur ou mot de passe invalide";
$extra="index.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
echo "<script>window.location.href = 'http://fitbodypass.fr/admin/index.php';</script>";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FitBodyPass | Admin s'identifier</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
</head>
<body>

	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
					<i class="icon-reorder shaded"></i>
				</a>

			  	<a class="brand"  href="http://fitbodypass.fr">
			  		Fitness | Admin
			  	</a>

				<div class="nav-collapse collapse navbar-inverse-collapse">
				
					<ul class="nav pull-right">

						<li><a href="http://fitbodypass.fr">
						FitBody Pass
						
						</a></li>

						

						
					</ul>
				</div><!-- /.nav-collapse -->
			</div>
		</div><!-- /navbar-inner -->
	</div><!-- /navbar -->



	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="module module-login span4 offset4">
					<form action="#" class="form-vertical" method="post">
						<div class="module-head">
							<h3>Se connecter</h3>
						</div>
						<span style="color:red;" ><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></span>
						<div class="module-body">
							<div class="control-group">
								<div class="controls row-fluid">
									<input class="span12" type="text" id="inputEmail" name="username" placeholder="Nom d'utilisateur">
								</div>
							</div>
							<div class="control-group">
								<div class="controls row-fluid">
						<input class="span12" type="password" id="inputPassword" name="password" placeholder="Mot de passe">
								</div>
							</div>
						</div>
						<div class="module-foot">
							<div class="control-group">
								<div class="controls clearfix">
									<button type="submit" class="btn btn-primary pull-right" name="submit">S'identifier</button>
									
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div><!--/.wrapper-->

	<div class="footer">
		<div class="container">
			 

<!--			<b class="copyright">&copy; 2020 <a href="https://www.thetechpro.be/#/"> TechPro</a> </b>Tous les droits sont réservés.-->
		</div>
	</div>
	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>