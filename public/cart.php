<?php
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
    $pageTitle = "Cart";
    //include("./includes/header.php");
    //include("./includes/nav.php");
    include(__DIR__."/../src/bootstrap.php");

    $contents = $cart->getCartContents($_SESSION['userID']);
    //var_dump($contents);
?>

<script src="./js/removeItem.js" defer></script>

<div class="container mt-3">
    <h3 class="pb-3">Shopping Cart</h3>
    <?php if (isset($contents[0]['quantity'])) { ?>
        <div class="row">
            <div class="col">
                <?php foreach($contents as $content) { ?>

                    <div class="col-12 col-lg-9 border p-5">
                        <h5><?= $content['product_name']; ?></h5>
                        <label>Quantity</label>
                        <select class="form-select mb-3">
                            <option value="1" <?= $content['quantity'] == 1 ? 'selected' : ''; ?> >1</option>
                            <option value="2" <?= $content['quantity'] == 2 ? 'selected' : ''; ?> >2</option>
                            <option value="3" <?= $content['quantity'] == 3 ? 'selected' : ''; ?> >3</option>
                        </select>
                        <p id="sliderDescr">$<?= $content['price'] * $content['quantity']; ?></p>
                        <img src="data:image/jpeg;base64,<?= base64_encode($content["img_cover"]); ?>" style="width:250px; border-radius:9px;"></img><br>
                        <button  type="button" class="btn btn-primary mt-2 mb-2" onclick="removeItem(this, <?= $content['cart_product_id']; ?>, <?= $content['cart_id']; ?>, <?= $content['price']; ?>, <?= $content['quantity']; ?>, <?= $_SESSION['userID']; ?>)" name="rmProduct">Remove</button>
                    </div>
                <?php } ?>
            </div>

            <div class="col-12 col-lg-3 border p-5">
                Summary <br>
                Item(s): <span id="tc"><?= $content['item_count']; ?></span>
                <hr>
                Total: $<span id="tp"><?= $content['total_price']; ?></span><br>
                Paypal Checkout
            </div>
        </div>
    <?php } else { ?>
        <div class="row">
            <div class="col"></div>

            <div class="col-12 col-lg-3 border p-5">
                Summary <br>
                Item(s): 0</span>
                <hr>
                Total: $<span id="tp">0</span><br>
                Paypal Checkout
                <script src="https://www.paypal.com/sdk/js?client-id=<?= $_ENV['CLIENT_ID']; ?>&currency=USD"></script>
                <div id="paypal-button-container"></div>
                <script src="./js/checkout.js"></script>
            </div>
        </div>
    <?php } ?>
    

</div>

<?php
    include("./includes/footer.php");
?>