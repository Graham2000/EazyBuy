<?php declare(strict_types=1);
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);

    $pageTitle = "Product";
    include(__DIR__.'/../src/bootstrap.php');

    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
        $product = new Product();
        $productData = $product->getProduct($_GET['id']);

        $reviewCount = 0;

        $review = new Review();
        $reviews = $review->getReviews($_GET['id']);

        $totalRating = $review->getTotalRating($review, $_GET['id']);
        // Get number of reviews
        $totalReviewCount = $review->getReviewCount();
        // Get stars
        $starRating = $review->getStarRating($totalReviewCount, $totalRating);

    } else {
        header("Location: ./index.php");
    }
?>

<script src="./js/changeProduct.js" defer></script>
<script src="./js/addProduct.js" defer></script>

<?php foreach($productData as $product) { ?>
    <?php
        // ISSET THAT USER IS LOGGED IN
        if (isset($_SESSION['userID'])) {
            echo '<script>
            var productID;
            var userID;
            var checkout = true;
            productID = "'.$product['product_id'].'";
            userID = "'.$_SESSION['userID'].'";
            price = "'.$product['price'].'";
          </script>';
        }
    ?>
    <div class="container p-5">
        <div class="row shadow rounded p-3">
            <div class="col-12 col-lg-6 pt-3">
                <img class="coverImg main rounded" src="data:image/jpeg;base64,<?= base64_encode($product["img_cover"]); ?>" style="width:100%;">
                <img class="primaryImg main rounded" src="data:image/jpeg;base64,<?= base64_encode($product["img_primary"]); ?>" style="width:100%; display:none;">
                <img class="secondaryImg main rounded" src="data:image/jpeg;base64,<?= base64_encode($product["img_secondary"]); ?>" style="width:100%; display:none;">
                <div class="p-3 m-3 text-center">

                    <img onclick="changeProduct(this)" class="coverImg preview border p-2 w-25 rounded" src="data:image/jpeg;base64,<?= base64_encode($product["img_cover"]); ?>">
                    <img onclick="changeProduct(this)" class="primaryImg preview p-2 w-25 rounded" src="data:image/jpeg;base64,<?= base64_encode($product["img_primary"]); ?>">
                    <img onclick="changeProduct(this)" class="secondaryImg preview p-2 w-25 rounded" src="data:image/jpeg;base64,<?= base64_encode($product["img_secondary"]); ?>">

                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 p-3">
                <p class="mt-3"><b>
                <h3><?= $product['product_name']; ?></h3>
                </b><p>
                <?= $starRating . ' (' . $totalReviewCount . ' reviews)'?>

                <h5>Unit Price</h5>
                <p>$<?= $product['price']; ?></p>

                <h5>Manufacturer</h5>
                <p><?= $product['manufacturer']; ?></p>

                <h5>Operating System</h5>
                <p><?= $product['operating_system']; ?></p>

                <h5>Screen Size</h5>
                <p><?= $product['screen_size'] . ' ' . $product['screen_unit']; ?></p>

                <h5>Memory</h5>
                <p><?= $product['memory_size'] . ' ' . $product['memory_type']; ?></p>

                <h5>Storage</h5>
                <p><?= $product['storage_size'] . ' ' . $product['storage_type']; ?></p>
            </div>
            <div class="col text-center p-3 border rounded m-3 p-3">
                <select class="form-select mb-3" name="quantity" id='qty'>
                    <option selected>Choose quantity...</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
                <button id="addProduct" <?= isset($_SESSION['userID']) ? "onclick='updateCart()'" : "onclick='alert(`Please login before adding product to cart!`)'" ?> class="btn btn-primary mb-2">Add to Cart</button>
                <button <?= isset($_SESSION['userID']) ? "onclick='updateCart(checkout)'" : "onclick='alert(`Please login before adding product to cart!`)'" ?> class="btn btn-secondary mb-2">Buy Now</button>
            </div>
        </div>

        <div class="row mt-5 p-5 shadow rounded">
            <h3 class="ps-0">Reviews</h3>

            <?php foreach ($reviews as $review) { ?>
                <i class="ps-0"><?= $review['first_name'] . ' ' . $review['last_name']; ?></i> <br>
                <div class="text-start ps-0">
                    <?php   
                        $stars = $review['rating'];
                        echo "<script>
                            var stars;
                            stars = '$stars';
                            reviewCount = '$reviewCount';
                            </script>";
                        $reviewCount += 1;
                    ?>

                    <div id="starContainer" class="d-flex starContainer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" id="star" class="bi bi-star-fill ms-0" viewBox="0 0 16 16" style="display:none;">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>
                    </div>

                    <script src="./js/generateStars.js"></script>

                </div>
                <p class="ps-0"><?= $review['review_text']; ?></p>
            <?php } ?>
        </div>
    </div>
<?php } ?>

<?php
    include("./includes/footer.php");
?>