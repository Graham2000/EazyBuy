<?php 
    $pageTitle = 'Success';
    include(__DIR__.'/../src/bootstrap.php');

    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $productID = $_POST['productID'];
        $rating = $_POST['rating'];
        $rev = $_POST['review'];

        try {
            // insert into review
            $review = new Review();
            $review->insertReview($productID, $rating, $rev, $_SESSION['userID']);
            echo "<h1>Your review has been submitted!</h1>";
        } catch (Exception $e) {
            echo "Error " . $e->getMessage();
        }
    }