<?php
class Review extends Database {
    public function insertReview($productID, $rating, $review, $userID)
    {
        $sql = "INSERT INTO review (product_id, rating, review_text, user_id)
                VALUES (?, ?, ?, ?)";
        $stmt = $this->openConn()->prepare($sql);
        $stmt->execute([$productID, $rating, $review, $userID]);
    }
}