<?php declare(strict_types=1); 
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include("./includes/autoloader.php");

        // Get all laptops
        $product = new Product();
        $products = $product->getProducts("Laptops");

        foreach($products as $product) {
            echo $product["description"] . ' $' . $product['price'];
        }
    ?>
</body>
</html>