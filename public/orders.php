<?php 
    $pageTitle = 'Orders';
    include(__DIR__.'/../src/bootstrap.php');
?>

<div class="container mt-5">
    <h3 class="pb-3">Order History</h3>
    <div class="card p-3 mt-3">
        <h5><b>Order ID #9382</b></h5>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Product Name</th>
                    <th scope="col">Price Per Unit</th>
                    <th scope="col">Quantity</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>iPhone Charger</td>
                    <td>$1099.00</td>
                    <td>3</td>
                </tr>
                <tr>
                    <td>Macbook Pro</td>
                    <td>$832.99</td>
                    <td>1</td>
                </tr>
                <tr>
                    <td>iPhone X</td>
                    <td>$999.99</td>
                    <td>2</td>
                </tr>
            </tbody>
        </table>
        <p><b>Total: $1433.00</b></p>
        <p><a class="link-primary" href="./product-review.php">Leave a review</a></p>
    </div>

    <div class="card p-3 mt-3">
        <h5><b>Order ID #9382</b></h5>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Product Name</th>
                    <th scope="col">Price Per Unit</th>
                    <th scope="col">Quantity</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>iPhone Charger</td>
                    <td>$1099.00</td>
                    <td>3</td>
                </tr>
                <tr>
                    <td>Macbook Pro</td>
                    <td>$832.99</td>
                    <td>1</td>
                </tr>
                <tr>
                    <td>iPhone X</td>
                    <td>$999.99</td>
                    <td>2</td>
                </tr>
            </tbody>
        </table>
        <p><b>Total: $1433.00</b></p>
        <p><a class="link-primary" href="./product-review.php">Leave a review</a></p>
    </div>


</div>

<?php 
    include('./includes/footer.php');
?>