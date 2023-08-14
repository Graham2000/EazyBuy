<?php declare(strict_types=1);
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);

    $pageTitle = "Product";
    include(__DIR__.'/../src/bootstrap.php');
    //include(__DIR__.'/insertQty.php');

    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
        $product = new Product();
        $productData = $product->getProduct($_GET['id']);
    } else {
        header("Location: ./index.php");
    }
    
    
    // ajax to request insertQty.php

?>

<script src="./js/changeProduct.js" defer></script>
<script src="./js/addProduct.js" defer></script>

<?php foreach($productData as $product) { ?>
    <?php
        // ISSET THAT USER IS LOGGED IN
        echo '<script>
                var productID;
                var userID;
                productID = "'.$product['product_id'].'";
                userID = "'.$_SESSION['userID'].'";
                price = "'.$product['price'].'";
              </script>'
    ?>
    <div class="container p-5 border">
        <div class="row">
            <div class="col-12 col-lg-6 border pt-3">
                <img class="coverImg main" src="data:image/jpeg;base64,<?= base64_encode($product["img_cover"]); ?>" style="width:100%;">
                <img class="primaryImg main" src="data:image/jpeg;base64,<?= base64_encode($product["img_primary"]); ?>" style="width:100%; display:none;">
                <img class="secondaryImg main" src="data:image/jpeg;base64,<?= base64_encode($product["img_secondary"]); ?>" style="width:100%; display:none;">
                <div class="border p-3 m-3 text-center">

                    <img onclick="changeProduct(this)" class="coverImg preview border p-2 w-25" src="data:image/jpeg;base64,<?= base64_encode($product["img_cover"]); ?>">
                    <img onclick="changeProduct(this)" class="primaryImg preview p-2 w-25" src="data:image/jpeg;base64,<?= base64_encode($product["img_primary"]); ?>">
                    <img onclick="changeProduct(this)" class="secondaryImg preview p-2 w-25" src="data:image/jpeg;base64,<?= base64_encode($product["img_secondary"]); ?>">

                </div>
            </div>
            <div class="col border">
            <p class="mt-3"><b>
            <?= $product['product_name']; ?>
            </b><p>
            <br>
            RATING | Num of rating
            </div>
            <div class="col border text-center p-3">
                <select class="form-select mb-3" name="quantity" id='qty'>
                    <option selected>Choose quantity...</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
                <button id="addProduct" class="btn btn-primary mb-2">Add to Cart</button>
                <button class="btn btn-secondary mb-2">Buy Now</button>
            </div>
        </div>
        <div class="row mt-5">
            <h3 class="ps-0">Product Information</h3>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Header1</th>
                        <th scope="col">Header2</th>
                        <th scope="col">Header3</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>data</td>
                        <td>data</td>
                        <td>data</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>data</td>
                        <td>data</td>
                        <td>data</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>data</td>
                        <td>data</td>
                        <td>data</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="row mt-5">
            <h3 class="ps-0">Reviews</h3>
            <i class="ps-0">User X</i> <br>
            <div class="text-start ps-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill ms-0" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                </svg>
            </div>
            <p class="ps-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat iste dignissimos tempora voluptatibus quas at, corporis culpa excepturi eligendi quo fugit et laudantium dolorem voluptatem earum harum quos, nam neque?</p>




            <i class="ps-0">User Y</i> <br>
            <div class="text-start ps-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill ms-0" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                </svg>
            </div>
            <p class="ps-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat iste dignissimos tempora voluptatibus quas at, corporis culpa excepturi eligendi quo fugit et laudantium dolorem voluptatem earum harum quos, nam neque?</p>


            <i class="ps-0">User Z</i> <br>
            <div class="text-start ps-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill ms-0" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                </svg>
            </div>
            <p class="ps-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat iste dignissimos tempora voluptatibus quas at, corporis culpa excepturi eligendi quo fugit et laudantium dolorem voluptatem earum harum quos, nam neque?</p>
        </div>
    </div>
<?php } ?>



<?php
    include("./includes/footer.php");
?>