<?php
    $pageTitle = "Smartphones";
    include(__DIR__.'/../src/bootstrap.php');
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);

    $product = new Product();
    $products = $product->getAllProducts("Smartphone");

    if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['manufacturer'])) {

        $memory = $_GET['memory'];
        if ($memory != "") {
            $memory = explode(" ", $_GET['memory']);
        } else {
            $memory = array(NULL, NULL);
        }

        $storage = $_GET['storage'];
        if ($storage != "") {
            $storage = explode(" ", $_GET['storage']);
        } else {
            $storage = array(NULL, NULL);
        }
        
        // Apply product filters
        $productName = $_GET['productName'];
        $manufacturer = $_GET['manufacturer'];
        $maxPrice = $_GET['price'];

        trim($productName) == "" && $productName = NULL;
        trim($manufacturer) == "" && $manufacturer = NULL;
        trim($maxPrice) == "" && $maxPrice = NULL;

        // Add rest of filters
        
        $products = $product->getFilteredProducts(  "Smartphone", $productName, $manufacturer, 
                                                    $maxPrice, NULL, NULL, NULL, $memory[0], 
                                                    $memory[1], $storage[0], $storage[1]
                                                 );
    }
?>

<div class="row justify-content-center mt-5">

    <div class="col-12 col-lg-2 border p-3">
        <form action="./smartphones.php" method="GET">
            <input type="text" class="form-control mb-2" name="productName" placeholder="Search for a product">
            <input type="submit" value="Apply Filters" class="btn btn-primary mb-2">

            <select class="form-select mb-2" name="manufacturer">
                <option value="" selected>Manufacturer</option>
                <option value="SAMSUNG">SAMSUNG</option>
                <option value="Apple">Apple</option>
                <option value="ASUS">ASUS</option>
                <option value="OnePlus">OnePlus</option>
            </select>
            <select class="form-select mb-2" name="price">
                <option value="" selected>Price Max</option>
                <option value="100">$100</option>
                <option value="200">$200</option>
                <option value="300">$300</option>
                <option value="1000">$1000</option>
            </select>
            <!--
            <select class="form-select mb-2" name="technology">
                <option value="" selected>Technology</option>
                <option value="5G">5G</option>
                <option value="4G LTE">4G LTE</option>
                <option value="4G">4G</option>
                <option value="3G">3G</option>
                <option value="2G">2G</option>
            </select>
            --->
            <select class="form-select mb-2" name="storage">
                <option value="" selected>Storage</option>
                <option value="1 TB">1 TB</option>
                <option value="512 GB">512GB</option>
                <option value="128 GB">128GB</option>
                <option value="64 GB">64GB</option>
            </select>
            <select class="form-select mb-2" name="memory">
                <option value="" selected>RAM</option>
                <option value="16 GB">16GB</option>
                <option value="12 GB">12GB</option>
                <option value="8 GB">8GB</option>
            </select>

            <!--
            <select class="form-select" name="os">
                <option value="" selected>Operating System</option>
                <option value="Android">Android</option>
                <option value="iOS">iOS</option>
            </select>
            --->
        </form>
    </div>

    <div class="col-12 col-lg-9 ms-4">
        <div class="row p-3 border">
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
                <div class="col-11 col-md-5 col-lg-3 p-0 m-2 border">
                    <img src="data:image/jpeg;base64,<?= base64_encode($product["img_primary"]); ?>" style="width:100%"></img>

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