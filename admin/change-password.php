
<?php
session_start();

include('include/config.php');

if(!isset($_GET['uname']))
{	
echo "<script>window.location.href = 'http://fitbodypass.fr/admin/index.php';</script>";
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );

if(isset($_POST['submit']))
{
$password = $_POST['password'];	
$newpassword = $_POST['newpassword'];	
$uname = $_GET['uname'];
$get_data = "SELECT password FROM  admin where password='$password' && username='$uname'";
$sql=mysqli_query($con,$get_data);
$num_sql = mysqli_num_rows($sql);
$num=mysqli_fetch_array($sql);
if($num_sql>0)
{
 $con=mysqli_query($con,"update admin set password='".$newpassword."', updationDate='$currentTime' where username='".$uname."'");
$_SESSION['msg']="Le mot de passe a été changé avec succès !!";
}
else
{
$_SESSION['msg']="L'ancien mot de passe ne correspond pas !!";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Changer le mot de passe</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
	<script type="text/javascript">
function valid()
{
if(document.chngpwd.password.value=="")
{
alert("Le mot de passe actuel déposé est vide !!");
document.chngpwd.password.focus();
return false;
}
else if(document.chngpwd.newpassword.value=="")
{
alert("\n" + "Le nouveau mot de passe déposé est vide !!");
document.chngpwd.newpassword.focus();
return false;
}
else if(document.chngpwd.confirmpassword.value=="")
{
alert("Confirmer que le mot de passe déposé est vide\n !!");
document.chngpwd.confirmpassword.focus();
return false;
}
else if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("Le mot de passe et le champ de confirmation du mot de passe ne correspondent pas\n !!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>
</head>
<body>
<?php include('include/header.php');?>

	<div class="wrapper">
		<div class="container">
			<div class="row">
<?php include('include/sidebar.php');?>				
			<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Admin Changer le mot de passe</h3>
							</div>
							<div class="module-body">

									<?php if(isset($_SESSION['msg']))
{?>
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
									</div>
<?php } ?>
									<br />

			<form class="form-horizontal row-fluid" name="chngpwd" method="post" onSubmit="return valid();">
									
<div class="control-group">
<label class="control-label" for="basicinput">Mot de passe actuel</label>
<div class="controls">
<input type="password" placeholder="Entrer votre mot de passe actuel"  name="password" class="span8 tip" required>
</div>
</div>


<div class="control-group">
<label class="control-label" for="basicinput">Nouveau mot de passe</label>
<div class="controls">
<input type="password" placeholder="Entrez votre nouveau mot de passe actuel"  name="newpassword" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Mot de passe actuel</label>
<div class="controls">
<input type="password" placeholder="Entrez à nouveau votre nouveau mot de passe"  name="confirmpassword" class="span8 tip" required>
</div>
</div>




										

										<div class="control-group">
											<div class="controls">
												<button type="submit" name="submit" class="btn">Soumettre</button>
											</div>
										</div>
									</form>
							</div>
						</div>

						
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

<?php include('include/footer.php');?>

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
</body>
<?php } ?>