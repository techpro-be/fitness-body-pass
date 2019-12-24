<?php
require_once "vendor/autoload.php";
 
use Omnipay\Omnipay;
 
if (isset($_POST['stripeToken']) && !empty($_POST['stripeToken'])) {
 
    $gateway = Omnipay::create('Stripe');
    $gateway->setApiKey('sk_test_jbleZTpn1cfoERYWq2RZCBhG0045n9ipkF');
 
    $token = $_POST['stripeToken'];
 
    $response = $gateway->purchase([
        'amount' => $_POST['amount'],
        'currency' => 'USD',
        'token' => $token,
    ])->send();
 
    if ($response->isSuccessful()) {
        // payment was successful: update database
        $arr_payment_data = $response->getData();
        $payment_id = $arr_payment_data['id'];
        echo "Payment is successful. Your payment id is: ". $payment_id;
    } else {
        // payment failed: display message to customer
        echo $response->getMessage();
    }
}