<?php
    $pageTitle = "Product";
    include("./includes/header.php");
    include("./includes/nav.php");
?>

<div class="row">
    <div class="col-12 col-lg-2 border p-3">
        <input type="text" class="form-control mb-2" placeholder="Search for a product"/>
        <button class="btn btn-primary mb-2">Search</button>

        <select class="form-select mb-2">
            <option selected>CPU Type</option>
            <option value="1">AMD</option>
            <option value="2">Intel</option>
        </select>
        <select class="form-select mb-2">
            <option selected>Screen Size</option>
            <option value="1">11.6" and smaller</option>
            <option value="2">12" - 13.9"</option>
        </select>
        <select class="form-select mb-2">
            <option selected>Memory</option>
            <option value="1">512GB</option>
            <option value="2">128GB</option>
        </select>
        <select class="form-select mb-2">
            <option selected>Manufacturer</option>
            <option value="1">Lenovo</option>
            <option value="2">HP</option>
        </select>
        <select class="form-select mb-2">
            <option selected>SSD</option>
            <option value="1">2 TB and UP</option>
            <option value="2">1 TB - 1.99 TB</option>
        </select>
        <select class="form-select">
            <option selected>Price</option>
            <option value="1">$10 - $25</option>
            <option value="2">$25 - $50</option>
        </select>
    </div>
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
</div>




<?php
    include("./includes/footer.php");
?>