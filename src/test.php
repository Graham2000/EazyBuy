<?php 
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
 require __DIR__  . '/vendor/autoload.php';

 // After Step 1
 $apiContext = new \PayPal\Rest\ApiContext(
     new \PayPal\Auth\OAuthTokenCredential(
         'AQRKg5CtQv60NC_ojGOxhJSWML_LLU2uSiH_v_6y7JafQNyHIS33kS9gDTc7EEzk7DztulwWWGDQ28uc',     // ClientID
         'EG1LWvvMIY-9qBpAHtSboYa2RoauCseeX49O11lxn2wseMZvrTkKw0lC2Wv1bJNCcbP6Y8Hd6r9ppIfX'      // ClientSecret
     )
 );

 // After Step 2
 $payer = new \PayPal\Api\Payer();
 $payer->setPaymentMethod('paypal');

    $items = [];
    $total = 0;

    for ($i = 0; $i < 5; $i++) {
        $item1 = new \PayPal\Api\Item();
        $item1->setName("tt1")
                ->setCurrency('USD')
                ->setQuantity(1)
                ->setPrice(20.00);
        $items[] = $item1;
        $total += 20;
    }
 

echo var_dump($items[0]);

 $itemList = new \PayPal\Api\ItemList();
 $itemList->setItems($items);
 
 

 $amount = new \PayPal\Api\Amount();
 $amount->setCurrency("USD")
     ->setTotal($total);
 //->setDetails($details);
 
 $transaction = new \PayPal\Api\Transaction();
 $transaction->setAmount($amount)
 ->setItemList($itemList);
 //->setDescription("dsf")
 //->setInvoiceNumber(uniqid());
 //test
 //$transaction->setItemList($itemList);

 $redirectUrls = new \PayPal\Api\RedirectUrls();
 $redirectUrls->setReturnUrl("https://localhost/eazy-buy/src/executePayment.php")
     ->setCancelUrl("https://example.com/your_cancel_url.html");

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
     // This will print the detailed information on the exception.
     //REALLY HELPFUL FOR DEBUGGING
     echo $ex->getData();
 }
