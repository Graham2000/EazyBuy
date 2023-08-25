<?php 
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    $pageTitle = "Payment Processed";
    include(__DIR__.'/../src/bootstrap.php');

    $msgHeader = "";
    $msgBody = "";

    if (isset($_GET['paymentId']) && isset($_GET['token']) && isset($_GET['PayerID'])) {
        // Retrieve payment ID, token, and Payer ID from the URL parameters
        $paymentId = $_GET['paymentId'];
        $token = $_GET['token'];
        $payerId = $_GET['PayerID'];

        // Make sure paymentId does not exist in database
        $order = new Order();
        $orderUnique = $order->orderUnique($paymentId);

        if ($orderUnique) {
            try {
                include('../src/executePayment.php');
                $msgHeader = "Success!";
                $msgBody = "Your order is currently being processed and will be shipped in 3-5 business days";
            } catch (Exception $ex) {
                echo $ex;
            }
        } else {
            $msgHeader = "Error!";
            $msgBody = "Order has already been processed";
        }
    }

?>

<div class="container mt-5">
    <h3><?= $msgHeader; ?><h3>
    <p><?= $msgBody; ?></p>
    <a class="btn btn-primary" href="./orders">View My Orders</a>
</div>