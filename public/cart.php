<?php
    $pageTitle = "Cart";
    include("./includes/header.php");
    include("./includes/nav.php");
?>

<script src="./js/removeItem.js" defer></script>

<div class="container mt-3">
    <h3 class="pb-3">Shopping Cart</h3>
    <div class="row">
        <div class="col">
            <div class="col-12 col-lg-9 border p-5">
                <h5>iPhone Charger</h5>
                <label>Quantity</label>
                <select class="form-select mb-3">
                    <option value="1">1</option>
                    <option value="2" selected>2</option>
                    <option value="3">3</option>
                </select>
                <p id="sliderDescr">$117.99</p>
                <img src="./img/headphones.jpg" style="width:250px; border-radius:9px;"></img><br>
                <button onclick="removeItem(this)" class="btn btn-primary mt-2 mb-2">Remove</button>
            </div>

            <div class="col-12 col-lg-9 border p-5">
                <h5>iPhone Charger</h5>
                <label>Quantity</label>
                <select class="form-select mb-3">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3" selected>3</option>
                </select>
                <p id="sliderDescr">$117.99</p>
                <img src="./img/headphones.jpg" style="width:250px; border-radius:9px;"></img><br>
                <button onclick="removeItem(this)" class="btn btn-primary mt-2 mb-2">Remove</button>
            </div>
        </div>

        <div class="col-12 col-lg-3 border p-5">
            Summary <br>
            Item(s): $117.99
            <hr>
            Total: $117.99<br>
            Paypal Checkout
        </div>
    </div>
</div>

<?php
    include("./includes/footer.php");
?>