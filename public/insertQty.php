<?php
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
// switch to autoload
include(__DIR__.'/../src/classes/Database.php');
include(__DIR__.'/../src/classes/User.php');
include(__DIR__.'/../src/classes/Cart.php');



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postData = json_decode(file_get_contents("php://input"), true);

    $qty = $postData['qty'];
    $productID = $postData['productID'];
    $userID = $postData['userID'];

    //$result = "Received data: qty = $qty productID = $productID";
    //echo $result;

    $cart = new Cart();
    $cartID = $cart->selectCartID($userID);
    $cart->insertCartProduct($cartID['cart_id'], $productID);

    // Update item_count and total_price in cart

    
}