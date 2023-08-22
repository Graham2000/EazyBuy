<?php 
    session_start();
    $pageTitle = 'Orders';
    include(__DIR__.'/../src/bootstrap.php');
?>

<div style="display:flex; flex-direction:column; align-items:center;">
    <h3 class="pb-3 mt-5">Order History</h3>
    <?php 
        $order = new Order();
        $orders = $order->getUserOrders($_SESSION['userID']);  

        for ($i = 0; $i < count($orders); $i++) { 
            $orderID = $orders[$i]['user_order_id'];
            $contents = $order->getOrderContents($orderID);  
        ?>
        <div class="card p-3 m-3" style="width:800px;">
            <h5><b>Order ID #<?= $orderID; ?></b></h5>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Product Name</th>
                        <th scope="col">Price Per Unit</th>
                        <th scope="col">Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($contents as $content) { ?>
                        <tr>
                            <td><?= $content['product_name']; ?></td>
                            <td>$<?= $content['price']; ?></td>
                            <td><?= $content['quantity']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <p><b>Total: $<?= $orders[$i]['order_total']; ?></b></p>
            <p><a class="link-primary" href="./product-review.php?orderID=<?= $orderID; ?>">Leave a review</a></p>
        </div>
    <?php } ?>
</div>

<?php 
    include('./includes/footer.php');
?>