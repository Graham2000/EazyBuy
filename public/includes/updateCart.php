<?php
include(__DIR__.'/../../src/classes/Database.php');
include(__DIR__.'/../../src/classes/User.php');
include(__DIR__.'/../../src/classes/Cart.php');

// Update cart and return new item count/total price
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postData = json_decode(file_get_contents("php://input"), true);

    $qty = $postData['qty'];
    $price = $postData['price'];
    $productID = $postData['productID'];
    $userID = $postData['userID'];

    $cart = new Cart();
    $cc = $cart->getCart($userID);
    $cart->insertCartProduct($cc['cart_id'], $productID);

    $itemCount = $cc['item_count'] + $qty;
    $totalPrice = round($cc['total_price'] + $price, 2);

    $cart->updateCart($itemCount, $totalPrice, $cc['cart_id']);

    $res = array('itemCount' => $itemCount, 'totalPrice' => $totalPrice);
    echo json_encode($res);
}