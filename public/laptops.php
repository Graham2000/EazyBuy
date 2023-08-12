<?php declare(strict_types=1);
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);

    $pageTitle = "Laptops";
    include("./includes/header.php");
    include("./includes/nav.php");
    include("../src/bootstrap.php");

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
                ?>
                <div class="col-11 col-md-5 col-lg-3 p-0 m-2 border">
                    <img src="data:image/jpeg;base64,<?= base64_encode($product["img_primary"]); ?>" style="width:100%"></img>

                    <div class="text-start ps-0 mt-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill ms-2" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>
                    </div>

                    <a class="ms-2" href="./product.php?id=<?= $product["product_id"]; ?>"><?= $product["product_name"]; ?></a>
                    <p class="priceWhole mt-2 ms-2"><?= '$' . $whole; ?><span class="text-muted pricePart"><?= '.' . $part; ?></span></p>
                </div>
            <?php } ?>
        </div>
    </div>

    <!---
    <div class="col-12 col-lg-9">
        <div class="p-3 border">
            <div class="row justify-content-center">
                <div class="col-12 col-md-5 col-lg border p-2 m-2">
                    <img src="./img/cc.jpg" style="width:100%"></img>

                    <div class="text-start ps-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill ms-0" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>
                    </div>

                    <a href="./product.php">White 9" iPhone Charger</a>
                    <p class="priceWhole mt-2">$115<span class="text-muted pricePart">.99</span></p>
                </div>
                <div class="col-12 col-md-5 col-lg border p-2 m-2">
                    <img src="./img/cc.jpg" style="width:100%"></img>

                    <div class="text-start ps-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill ms-0" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>
                    </div>

                    <a href="./product.php">White 9" iPhone Charger</a>
                    <p class="priceWhole mt-2">$115<span class="text-muted pricePart">.99</span></p>
                </div>
                <div class="col-12 col-md-5 col-lg border p-2 m-2">
                    <img src="./img/cc.jpg" style="width:100%"></img>

                    <div class="text-start ps-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill ms-0" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>
                    </div>

                    <a href="./product.php">White 9" iPhone Charger</a>
                    <p class="priceWhole mt-2">$115<span class="text-muted pricePart">.99</span></p>
                </div>
                <div class="col-12 col-md-5 col-lg border p-2 m-2">
                    <img src="./img/cc.jpg" style="width:100%"></img>

                    <div class="text-start ps-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill ms-0" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>
                    </div>

                    <a href="./product.php">White 9" iPhone Charger</a>
                    <p class="priceWhole mt-2">$115<span class="text-muted pricePart">.99</span></p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-5 col-lg border p-2 m-2">
                    <img src="./img/cc.jpg" style="width:100%"></img>

                    <div class="text-start ps-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill ms-0" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>
                    </div>

                    <a href="./product.php">White 9" iPhone Charger</a>
                    <p class="priceWhole mt-2">$115<span class="text-muted pricePart">.99</span></p>
                </div>
                <div class="col-12 col-md-5 col-lg border p-2 m-2">
                    <img src="./img/cc.jpg" style="width:100%"></img>

                    <div class="text-start ps-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill ms-0" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>
                    </div>

                    <a href="./product.php">White 9" iPhone Charger</a>
                    <p class="priceWhole mt-2">$115<span class="text-muted pricePart">.99</span></p>
                </div>
                <div class="col-12 col-md-5 col-lg border p-2 m-2">
                    <img src="./img/cc.jpg" style="width:100%"></img>

                    <div class="text-start ps-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill ms-0" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>
                    </div>

                    <a href="./product.php">White 9" iPhone Charger</a>
                    <p class="priceWhole mt-2">$115<span class="text-muted pricePart">.99</span></p>
                </div>
                <div class="col-12 col-md-5 col-lg border p-2 m-2">
                    <img src="./img/cc.jpg" style="width:100%"></img>

                    <div class="text-start ps-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill ms-0" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>
                    </div>

                    <a href="./product.php">White 9" iPhone Charger</a>
                    <p class="priceWhole mt-2">$115<span class="text-muted pricePart">.99</span></p>
                </div>
            </div>
        </div>
    </div>
-->

</div>




<?php
    include("./includes/footer.php");
?>