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
            $screen = array("", "");
        }

        $memory = $_GET['memory'];
        if ($memory != "") {
            $memory = explode(" ", $_GET['memory']);
        } else {
            $memory = array("", "");
        }

        $storage = $_GET['ssd'];
        if ($storage != "") {
            $storage = explode(" ", $_GET['ssd']);
        } else {
            $storage = array("", "");
        }

        $productFilters = array(
            'productName'   => $_GET['productName'],
            'manufacturer'  => $_GET['manufacturer'],
            'maxPrice'      => $_GET['price'],
            'cpu'           => $_GET['cpu'],
            'screenSize'    => $screen[0],
            'screenUnit'    => $screen[1],
            'memorySize'    => $memory[0],
            'memoryType'    => $memory[1],
            'storageSize'   => $storage[0],
            'storageType'   => $storage[1]
        );

        foreach($productFilters as $key => $value) {
            if ($value == "") {
                $productFilters[$key] = NULL;
            }
        }

        var_dump($productFilters);

        // Apply product filters
        $products = $product->getFilteredProducts("Laptop", $productFilters["productName"], $productFilters["manufacturer"], 
                                                            $productFilters["maxPrice"],    $productFilters["cpu"], 
                                                            $productFilters["screenSize"],  $productFilters["screenUnit"],  
                                                            $productFilters["memorySize"],  $productFilters["memoryType"],  
                                                            $productFilters["storageSize"], $productFilters["storageType"]);
    }
?>

<div class="row justify-content-center mt-5">
    <div class="col-12 col-lg-2 border p-3">
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
                <option value="" selected>Price Max</option>
                <option value="200">$200</option>
                <option value="300">$300</option>
                <option value="400">$400</option>
                <option value="500">$500</option>
                <option value="600">$600</option>
                <option value="700">$700</option>
                <option value="1000">$1000</option>
            </select>
            <select class="form-select mb-2" name="cpu">
                <option value="" selected>CPU Type</option>
                <option value="Intel Core i9">Intel Core i9</option>
                <option value="Intel Core i5">Intel Core i5</option>
                <option value="Apple M Series">Apple M Series</option>
            </select>
            <select class="form-select mb-2" name="screenSize">
                <option value="" selected>Max Screen Size</option>
                <option value="12 inches">12"</option>
                <option value="13 inches">13"</option>
                <option value="14 inches">14"</option>
                <option value="15 inches">15"</option>
                <option value="16 inches">16"</option>
            </select>
            <select class="form-select mb-2" name="memory">
                <option value="" selected>Memory</option>
                <option value="32 GB">32GB</option>
                <option value="16 GB">16GB</option>
                <option value="8 GB">8GB</option>
            </select>
            <select class="form-select mb-2" name="ssd">
                <option value="" selected>SSD</option>
                <option value="500 GB">500 GB</option>
                <option value="250 GB">250 GB</option>
            </select>
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