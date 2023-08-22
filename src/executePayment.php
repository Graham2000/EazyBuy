<?php 
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    require __DIR__  . '/vendor/autoload.php';

if (isset($_GET['paymentId']) && isset($_GET['token']) && isset($_GET['PayerID'])) {
    // Retrieve payment ID, token, and Payer ID from the URL parameters
    $paymentId = $_GET['paymentId'];
    $token = $_GET['token'];
    $payerId = $_GET['PayerID'];

    // After Step 1
    $apiContext = new \PayPal\Rest\ApiContext(
        new \PayPal\Auth\OAuthTokenCredential(
            $_ENV['CLIENT_ID'],     // ClientID
            $_ENV['CLIENT_SECRET']     // ClientSecret
        )
    );

    // Get the payment object from PayPal using payment ID
    $payment = \PayPal\Api\Payment::get($paymentId, $apiContext);

    // Execute the payment
    $execution = new \PayPal\Api\PaymentExecution();
    $execution->setPayerId($payerId);

    try {
        $result = $payment->execute($execution, $apiContext);
        
        // Payment executed successfully, handle accordingly
        // $result contains payment execution details
        echo "<h1>Your order has been successfully processed!</h1>";
    } catch (\PayPal\Exception\PayPalConnectionException $ex) {
        // Handle connection exception
        echo $ex;
    }
}
