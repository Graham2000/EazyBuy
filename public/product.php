<?php
    $pageTitle = "Product";
    include("./includes/header.php");
    include("./includes/nav.php");
?>

<script src="./js/changeProduct.js" defer></script>

<div class="container p-5 border">
    <div class="row">
        <div class="col border pt-3">
            <img class="productImg 0" src="./img/charger.jpg" style="width:100%"></img>
            <div class="border p-3 m-3">
                <img class="preview 0 border p-2" src="./img/charger.jpg" style="width:100px"></img>
                <img class="preview 1 p-2" src="./img/block.jpg" style="width:100px"></img>
                <img class="preview 2 p-2" src="./img/cc.jpg" style="width:100px"></img>
            </div>
        </div>
        <div class="col border">
        <p class="mt-3"><b>
        iPhone Charger [Apple MFi Certified] 2 Pack 20W PD USB C Wall Fast Charger Adapter with 2 Pack 6FT Type C to Lightning Cable Compatible with iPhone 14 13 12 11 Pro Max XR XS X,iPad 
        </b><p>
        <br>
        RATING | Num of rating
        </div>
        <div class="col border text-center">
            <select class="form-select mt-3 mb-3">
                <option selected>Choose quantity...</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
            <button class="btn btn-primary">Add to Cart</button>
            <button class="btn btn-secondary">Buy Now</button>
        </div>
    </div>
    <div class="row mt-5">
        Product Information

        <br>
        *table*
    </div>
    <div class="row mt-5">
        Reviews
    </div>
</div>

<?php
    include("./includes/footer.php");
?>