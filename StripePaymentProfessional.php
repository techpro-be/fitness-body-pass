<?php

include 'ChromePhp.php';
require 'includes/config.php';

require_once('vendor/autoload.php');

\Stripe\Stripe::setApiKey("sk_test_jbleZTpn1cfoERYWq2RZCBhG0045n9ipkF");

try {
    $customer = \Stripe\Customer::create([
        'email' => $_POST['email'],
        'source' => $_POST['token'],
    ]);
    $subscription = \Stripe\Subscription::create([
        'customer' => $customer->id,
        'items' => [['plan' => 'professional']],
    ]);
    
    if ($subscription->status != 'incomplete') {
        $email = $customer->email;
        $amount= $subscription->plan->amount/100;
        $currency_code=$subscription->plan->currency;
        $plan=$subscription->plan->id;
        $txn_id=$subscription->id;
        $payment_status=$subscription->status;

        $sql="insert into tbl_payment(email,amount,currency_code,plan,txn_id,payment_status) values('$email','$amount','$currency_code','$plan','$txn_id','$payment_status')";
        $result=mysqli_query($con, $sql);

        header('Location: my-account.php');
    } else {
        header('Location: payment-method.php');
        error_log("Échec de la collecte du paiement initial pour l'abonnement");
    }
    exit;
} catch (Exception $e) {
    header('Location:oops.html');
    error_log("Impossible d'inscrire le client:" .$_POST['email'].
        ", error:" . $e->getMessage());
}