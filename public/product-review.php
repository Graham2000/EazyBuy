<?php
    include(__DIR__.'/../src/bootstrap.php')
?>

<script src="./js/modifyRating.js" defer></script>

<div class="container mt-5" style="max-width:600px;">
    <h3 class="pb-3">Leave a review</h3>
    <form action="./review.php" method="POST">
        <select class="form-select">
            <option selected>Choose Product...</option>
            <option value="">Order item #1</option>
            <option value="">Order item #2</option>
            <option value="">Order item #3</option>
        </select>

        <p class="mt-3 mb-1">Choose a rating:</p>
        
        <div id="rating" class="d-flex">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" id="emptyStar" class="bi bi-star me-1 ms-0" viewBox="0 0 16 16" onclick="modifyRating(this)" display="none">
                <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
            </svg>
        </div>

        <textarea class="form-control mt-3" placeholder="What was your experience with this product?" style="height:200px;"></textarea><br>
        <button class="btn btn-primary">Submit Review</button>
    </form>
</div>
