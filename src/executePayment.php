<?php 
    session_start();
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    require __DIR__  . '/vendor/autoload.php';
    require __DIR__ . '/classes/Database.php';
    require __DIR__ . '/classes/User.php';
    require __DIR__ . '/classes/Cart.php';
    require __DIR__ . '/classes/Order.php';
    use Dotenv\Dotenv;
    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->load();

if (isset($_GET['paymentId']) && isset($_GET['token']) && isset($_GET['PayerID'])) {
    // Retrieve payment ID, token, and Payer ID from the URL parameters
    $paymentId = $_GET['paymentId'];
    $token = $_GET['token'];
    $payerId = $_GET['PayerID'];

    // After Step 1
    $apiContext = new \PayPal\Rest\ApiContext(
        new \PayPal\Auth\OAuthTokenCredential(
            $_ENV['CLIENT_ID'],    // ClientID
            $_ENV['CLIENT_SECRET']      // ClientSecret
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
        echo $result;
        echo $_SESSION['userID'];
        echo "------------------------------";
        $itemList = $result->transactions[0]->item_list;

        // Add order record
        $order = new Order();
        $order->setOrder($_SESSION['userID']);

        $orderID = $order->getOrderID();

        for ($i = 0; $i < count($itemList->items); $i++) {
            $name = $itemList->items[$i]->name;
            $sku = $itemList->items[$i]->sku;
            $quantity = $itemList->items[$i]->quantity;
            //echo $name . $sku .  $quantity . "<br>";

            // Add product to order history
            // for each product in order
            $order->setProduct($sku, $quantity, $orderID);
        }

        // Clear cart contents
        $cart = new Cart();

        // Get cart id of user
        $cartID = $cart->getUserCartID($_SESSION['userID']);
        $cartID = $cartID['cart_id'];

        // Remove all products from cart
        $cart->removeAllProducts($cartID);

        // Reset totals
        $cart->updateCart(0, 0, $cartID);


    } catch (\PayPal\Exception\PayPalConnectionException $ex) {
        // Handle connection exception
        echo $ex;
    }
}
