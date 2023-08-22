<?php
class Review extends Database {
    public function insertReview($productID, $rating, $review, $userID)
    {
        $sql = "INSERT INTO review (product_id, rating, review_text, user_id)
                VALUES (?, ?, ?, ?)";
        $stmt = $this->openConn()->prepare($sql);
        $stmt->execute([$productID, $rating, $review, $userID]);
    }

    public function getReviews($productID): array
    {
        $sql = "SELECT first_name, last_name, rating, review_text 
                FROM review 
                INNER JOIN user 
                ON review.user_id = user.user_id
                WHERE review.product_id = ?";
        $stmt = $this->openConn()->prepare($sql);
        $stmt->execute([$productID]);
        $reviews = $stmt->fetchAll();
        return $reviews;
    }
}