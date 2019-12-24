<?php

// Product Details  
// $productName = "Demo Product";  
// $productNumber = "DP12345";  
// $productPrice = 35; 
// $currency = "usd"; 
 
// Convert product price to cent 
// $stripeAmount = round($productPrice*100, 2); 
  
// Stripe API configuration   
// define('STRIPE_API_KEY', 'sk_test_jbleZTpn1cfoERYWq2RZCBhG0045n9ipkF');  
// define('STRIPE_PUBLISHABLE_KEY', 'pk_test_BXvlOPceTgdWNCnic2Zxy3Dx00Xa1jK0lk');  



define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'shopping');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>