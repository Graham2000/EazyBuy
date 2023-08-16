<?php
    include(__DIR__.'/../src/bootstrap.php')
?>

<div class="container mt-5" style="max-width:600px;">
    <h3 class="pb-3">Leave a review</h3>
    <form action="./review.php" method="POST">
        <select class="form-select">
            <option selected>Choose Product...</option>
            <option value="">Order item #1</option>
            <option value="">Order item #2</option>
            <option value="">Order item #3</option>
        </select>

        <p class="mt-3">Choose a rating: x x x x x</p>

        <textarea class="form-control" placeholder="What was your experience with this product?" style="height:200px;"></textarea><br>
        <button class="btn btn-primary mt-2">Submit Review</button>
    </form>
</div>
