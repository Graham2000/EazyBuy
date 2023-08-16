<?php
// Delete item from cart
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

include(__DIR__.'/../../src/classes/Database.php');
include(__DIR__.'/../../src/classes/User.php');
include(__DIR__.'/../../src/classes/Cart.php');

// Update cart and return new item count/total price
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postData = json_decode(file_get_contents("php://input"), true);

    $cartProductID = $postData['cartProductID'];
    $cartID = $postData['cartID'];
    $price = $postData['price'];
    $quantity = $postData['quantity'];
    $userID = $postData['userID'];

    $cart = new Cart();
    $cc = $cart->getCart($userID);
    $cart->removeProduct($cartProductID);

    $totalPrice = round($cc['total_price'] - ($quantity * $price), 2);
    $totalCount = $cc['item_count'] - $quantity;
    $cart->updateCart($totalCount, $totalPrice, $cartID);

    // Return new item count and total price
    $res = array('totalCount' => $totalCount, 'totalPrice' => $totalPrice);
    echo json_encode($res);
}
