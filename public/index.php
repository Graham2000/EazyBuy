<?php declare(strict_types=1);
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);

    $pageTitle = "Home";
    include(__DIR__.'/../src/bootstrap.php');

    $product = new Product();
    $topLaptops = $product->getTopProducts('Laptop');
    $topSmartphones = $product->getTopProducts('Smartphone');
    $topDesktops = $product->getTopProducts('Desktop');
    //var_dump($topLaptops);
?>

<script src="./js/imgSlider.js" defer></script>

<!---Img slider-->
<div id="imgSlider" class="container border p-5 mt-3 d-flex justify-content-center align-items-center" style="height:500px">
    <div id="textContainer" class="text-center">
        <h3 id="sliderHeader">Laptops</h3>
        <p id="sliderDescr">Starting at $700.99</p>
        <a id="shop" class="btn btn-primary" href="./laptops.php">Shop Laptops</a>
    </div>

    <div class="w-100 d-flex flex-row">
        <div class="w-50">
            <button class="btn p-0" onclick="prevImg()">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-chevron-left text-light" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                </svg>
            </button>
        </div>
        <div class="w-50 text-end">
            <button class="btn p-0" onclick="nextImg()" class="margin-end">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-chevron-right text-light" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                </svg>
            </button>
        </div>
    </div>
</div>

<div class="container p-5 mt-5">

    <h3><b>Top Selling in Smartphones</b></h3>

    <div class="productShowcase">
        <?php foreach ($topSmartphones as $topSmartphone) { ?>
            <?php
                $price = $product->formatPrice($topSmartphone['price']);

                $review = new Review();
                $totalRating = $review->getTotalRating($review, $topSmartphone['product_id']);
                // Get number of reviews
                $totalReviewCount = $review->getReviewCount();
                // Get stars
                $starRating = $review->getStarRating($totalReviewCount, $totalRating);
            ?>
            <div class="product">
                <img src="data:image/jpeg;base64,<?= base64_encode($topSmartphone["img_primary"]); ?>"></img><br>
                <span class="ms-2">
                    <?= $starRating . " (" . $totalReviewCount . " reviews)"; ?>
                </span>
                <p><a class="link-dark" href="product.php?id=<?= $topSmartphone['product_id']; ?>"><?= $topSmartphone['product_name']; ?></a></p>
                <p class="priceWhole mt-2">$<?= $price[0]; ?><span class="text-muted pricePart">.<?= $price[1]; ?></span></p>
            </div>
        <?php } ?>
    </div>
    

    <h3 class="mt-5"><b>Top Selling in Laptops</b></h3>

    <div class="productShowcase">
        <?php foreach ($topLaptops as $topLaptop) { ?>
            <?php
                $price = $product->formatPrice($topLaptop['price']);

                $review = new Review();
                $totalRating = $review->getTotalRating($review, $topLaptop['product_id']);
                // Get number of reviews
                $totalReviewCount = $review->getReviewCount();
                // Get stars
                $starRating = $review->getStarRating($totalReviewCount, $totalRating);
            ?>
            <div class="product">
                <img src="data:image/jpeg;base64,<?= base64_encode($topLaptop["img_primary"]); ?>"></img><br>
                <span class="ms-2">
                    <?= $starRating . " (" . $totalReviewCount . " reviews)"; ?>
                </span>
                <p><a class="link-dark" href="product.php?id=<?= $topLaptop['product_id']; ?>"><?= $topLaptop['product_name']; ?></a></p>
                <p class="priceWhole mt-2">$<?= $price[0]; ?><span class="text-muted pricePart">.<?= $price[1]; ?></span></p>
            </div>
        <?php } ?>
    </div>

    <h3 class="mt-5"><b>Top Selling in Desktop Computers</b></h3>

<div class="productShowcase">
    <?php foreach ($topDesktops as $topDesktop) { ?>
        <?php
            $price = $product->formatPrice($topDesktop['price']);

            $review = new Review();
            $totalRating = $review->getTotalRating($review, $topDesktop['product_id']);
            // Get number of reviews
            $totalReviewCount = $review->getReviewCount();
            // Get stars
            $starRating = $review->getStarRating($totalReviewCount, $totalRating);
        ?>
        <div class="product">
            <img src="data:image/jpeg;base64,<?= base64_encode($topDesktop["img_primary"]); ?>"></img><br>
            <span class="ms-2">
                <?= $starRating . " (" . $totalReviewCount . " reviews)"; ?>
            </span>
            <p><a class="link-dark" href="product.php?id=<?= $topDesktop['product_id']; ?>"><?= $topDesktop['product_name']; ?></a></p>
            <p class="priceWhole mt-2">$<?= $price[0]; ?><span class="text-muted pricePart">.<?= $price[1]; ?></span></p>
        </div>
    <?php } ?>
</div>
    
</div>

<?php
    include("./includes/footer.php");
?>