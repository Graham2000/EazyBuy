<?php declare(strict_types=1);
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);

    $pageTitle = "Laptops";
    include(__DIR__.'/../src/bootstrap.php');

    $product = new Product();
    $products = $product->getAllProducts("Laptop");

    if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['manufacturer'])) {

        $screen = $_GET['screenSize'];
        if ($screen != "") {
            $screen = explode(" ", $_GET['screenSize']);
        } else {
            $screen = array(NULL, NULL);
        }

        $memory = $_GET['memory'];
        if ($memory != "") {
            $memory = explode(" ", $_GET['memory']);
        } else {
            $memory = array(NULL, NULL);
        }

        $storage = $_GET['ssd'];
        if ($storage != "") {
            $storage = explode(" ", $_GET['ssd']);
        } else {
            $storage = array(NULL, NULL);
        }

        // Apply product filters
        $productName = $_GET['productName'];
        $manufacturer = $_GET['manufacturer'];
        $maxPrice = $_GET['price'];
        $os = $_GET['os'];
        $cpu = $_GET['cpu'];
        $gpu = $_GET['gpu'];

        trim($productName) == "" && $productName = NULL;
        trim($manufacturer) == "" && $manufacturer = NULL;
        trim($maxPrice) == "" && $maxPrice = NULL;
        trim($os) == "" && $os = NULL;
        trim($cpu) == "" && $cpu = NULL;
        trim($gpu) == "" && $gpu = NULL;

        // Apply product filters
        $products = $product->getFilteredProducts(  "Laptop", $productName, $manufacturer, 
                                                    $maxPrice, $cpu, $screen[0], $screen[1], $memory[0], 
                                                    $memory[1], $storage[0], $storage[1], 
                                                    NULL, $os, NULL, NULL
                                                 );
    }
?>

<div class="row justify-content-center mt-5">
    <div class="col-12 col-lg-2 border p-3 mb-3">
        <form action="laptops.php" method="GET">
            <input type="text" class="form-control mb-2" name="productName" placeholder="Search for a product">
            <input type="submit" value="Apply Filters" class="btn btn-primary mb-2">

            <select class="form-select mb-2" name="manufacturer">
                <option value="" selected>Manufacturer</option>
                <option value="ASUS">ASUS</option>
                <option value="HP">HP</option>
                <option value="Lenovo">Lenovo</option>
                <option value="SAMSUNG">SAMSUNG</option>
                <option value="Apple">Apple</option>
                <option value="Dell">Dell</option>
            </select>
            <select class="form-select mb-2" name="price">
                <option value="" selected>Max Price</option>
                <option value="200">$200</option>
                <option value="300">$300</option>
                <option value="400">$400</option>
                <option value="500">$500</option>
                <option value="600">$600</option>
                <option value="700">$700</option>
                <option value="1000">$1000</option>
                <option value="1500">$1500</option>
                <option value="2000">$2000</option>
                <option value="2500">$2500</option>
                <option value="3000">$3000</option>
                <option value="3500">$3500</option>
                <option value="4000">$4000</option>
            </select>
            <select class="form-select mb-2" name="cpu">
                <option value="" selected>CPU Type</option>
                <option value="Intel Core i9">Intel Core i9</option>
                <option value="Intel Core i7">Intel Core i7</option>
                <option value="Intel Core i5">Intel Core i5</option>
                <option value="AMD Ryzen 9">AMD Ryzen 9</option>
                <option value="AMD Ryzen 7">AMD Ryzen 7</option>
                <option value="AMD Ryzen 5">AMD Ryzen 5</option>
                <option value="Apple M1">Apple M1</option>
                <option value="Apple M2">Apple M2</option>
            </select>
            <select class="form-select mb-2" name="screenSize">
                <option value="" selected>Max Screen Size</option>
                <option value="12 inches">12"</option>
                <option value="13 inches">13"</option>
                <option value="14 inches">14"</option>
                <option value="15 inches">15"</option>
                <option value="16 inches">16"</option>
                <option value="17 inches">17"</option>
            </select>
            <select class="form-select mb-2" name="memory">
                <option value="" selected>Memory</option>
                <option value="512 GB">512GB</option>
                <option value="160 GB">160GB</option>
                <option value="128 GB">128GB</option>
                <option value="64 GB">64GB</option>
                <option value="48 GB">48GB</option>
                <option value="40 GB">40GB</option>
            </select>
            <select class="form-select mb-2" name="ssd">
                <option value="" selected>SSD</option>
                <option value="2 TB">2TB</option>
                <option value="1 TB">1TB</option>
                <option value="500 GB">500GB</option>
                <option value="250 GB">250GB</option>
            </select>

            <select class="form-select mb-2" name="os">
                <option value="" selected>Operating System</option>
                <option value="Windows">Windows</option>
                <option value="Mac OS">Mac OS</option>
            </select>

            <select class="form-select mb-2" name="gpu">
                <option value="" selected>GPU</option>
                <option value="GeForce RTX 40 Series">GeForce RTX 40 Series</option>
                <option value="GeForce RTX 30 Series">GeForce RTX 30 Series</option>
                <option value="GeForce RTX 20 Series">GeForce RTX 20 Series</option>
                <option value="GeForce RTX 16 Series">GeForce RTX 16 Series</option>
            </select>


        </form>
    </div>

    <div class="col-12 col-lg-9 ms-4">
        <div class="row">
            <?php foreach ($products as $product) { ?>
                <?php 
                    $price = explode(".", $product["price"]);
                    $whole = $price[0];
                    $part = $price[1];

                    $review = new Review();
                    $totalRating = $review->getTotalRating($review, $product['product_id']);
                    // Get number of reviews
                    $totalReviewCount = $review->getReviewCount();
                    // Get stars
                    $starRating = $review->getStarRating($totalReviewCount, $totalRating);
                ?>
                <div class="col-11 col-md-5 col-lg-3 p-0 ms-2 me-2 mb-2 border">
                    <img src="data:image/jpeg;base64,<?= base64_encode($product["img_primary"]); ?>" style="width:100%; height:60%;"></img>

                    <div class="text-start ps-0 mt-2 ms-2">
                        <?= $starRating . ' (' . $totalReviewCount . ' reviews)'; ?>
                    </div>

                    <a class="ms-2" href="./product.php?id=<?= $product["product_id"]; ?>"><?= $product["product_name"]; ?></a>
                    <p class="priceWhole mt-2 ms-2"><?= '$' . $whole; ?><span class="text-muted pricePart"><?= '.' . $part; ?></span></p>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<?php
    include("./includes/footer.php");
?>