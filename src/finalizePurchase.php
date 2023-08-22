<?php 
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');

    require __DIR__  . '/vendor/autoload.php';

    include(__DIR__.'/classes/Database.php');
    include(__DIR__.'/classes/Product.php');

    use PayPal\Api\Item;
    use PayPal\Api\ItemList;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postData = json_decode(file_get_contents("php://input"), true);
    $productIDs = $postData['productIDs'];
    $productQtys = $postData['productQtys'];

    // After Step 1
    $apiContext = new \PayPal\Rest\ApiContext(
        new \PayPal\Auth\OAuthTokenCredential(
            $_ENV['CLIENT_ID'],    // ClientID
            $_ENV['CLIENT_SECRET']      // ClientSecret
        )
    );

    // After Step 2
    $payer = new \PayPal\Api\Payer();
    $payer->setPaymentMethod('paypal');

    $product = new Product();

    $TOTAL = 0;
    $items = [];

    for ($i = 0; $i < count($productIDs); $i++) {
        $price = $product->getPrice($productIDs[$i]);
        $TOTAL += $price['price'] * $productQtys[$i];

        $item = new Item();
        $item->setName($price['product_name'])
            ->setCurrency("USD")
            ->setQuantity($productQtys[$i])
            ->setSku($productIDs[$i])
            ->setPrice($price['price']);

        $items[] = $item;
    }

    $itemList = new ItemList();
    $itemList->setItems($items);
    
    $amount = new \PayPal\Api\Amount();
    $amount->setCurrency("USD")
        ->setTotal($TOTAL); // TOTAL
    
    $transaction = new \PayPal\Api\Transaction();
    $transaction->setAmount($amount)
    ->setItemList($itemList);

    $redirectUrls = new \PayPal\Api\RedirectUrls();
    $redirectUrls->setReturnUrl("https://localhost/eazy-buy/src/executePayment.php")
        ->setCancelUrl("https://localhost/eazy-buy/public/order-canceled.php");

    $payment = new \PayPal\Api\Payment();
    $payment->setIntent('sale')
        ->setPayer($payer)
        ->setTransactions(array($transaction))
        ->setRedirectUrls($redirectUrls);

    // After Step 3
    try {
        $payment->create($apiContext);
  
        $res = array('url' => $payment->getApprovalLink());
        echo json_encode($res);
        //$approvalUrl = $payment->getApprovalLink();
        //header("Location: $approvalUrl");
    }
    catch (\PayPal\Exception\PayPalConnectionException $ex) {
        echo $ex->getData();
    }

}