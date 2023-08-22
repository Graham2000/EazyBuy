<?php 
    $pageTitle = 'Success';
    include(__DIR__.'/../src/bootstrap.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $productID = $_POST['productID'];
        $rating = $_POST['rating'];
        $review = $_POST['review'];

        echo "Product ID: " . $productID . "<br>";
        echo "Rating: " . $rating . "<br>";
        echo "Review: " . $review . "<br>";

        // insert into review
        
    }