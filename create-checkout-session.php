
<?php

//require 'vendor/autoload.php';
include './stripe-payment/init.php';
\Stripe\Stripe::setApiKey('sk_test_51Jy2BlGbzhdzgPMFw863GTCJqcnBLpcoDhZTGtjh3zx2kHbqcvVI7ZIuknakTqfz8Hitt3haXTy6QUjFu6IJyLgJ00gxMfQTfn');

header('Content-Type: application/json');

$YOUR_DOMAIN = 'http://localhost';

$checkout_session = \Stripe\Checkout\Session::create([
  'line_items' => [[
    # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
    # I added using Stripe Website the Dyamic Price you can also make this variale Static   
    'price' => 'price_1Jy2alGbzhdzgPMFUZ4vXMcy',
    'quantity' => 1,
  ]],
  'mode' => 'payment',
  #Concatinate the Link of $Your_Domain Variable after Successful or Cancel Event
  'success_url' => $YOUR_DOMAIN . '/stripe/success.php',
  'cancel_url' => $YOUR_DOMAIN . '/stripe/cancel.html',
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);