<?php
class Review extends Database {
    private int $reviewCount;

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

    public function getRating($productID): array
    {
        $sql = "SELECT rating
                FROM review 
                WHERE product_id = ?";
        $stmt = $this->openConn()->prepare($sql);
        $stmt->execute([$productID]);
        $ratings = $stmt->fetchAll();
        return $ratings;
    }

    function getReviewCount()
    {
        return $this->reviewCount;
    }

    function setReviewCount($reviewCount)
    {
        $this->reviewCount = $reviewCount;
    }

    function getTotalRating($review, $productID): int
    {
        $rating = 0;
        $reviewCount = 0;

        $ratings = $review->getRating($productID);
    
        foreach ($ratings as $starRating) {
    
            $starRating = $starRating['rating'];
    
            if ($starRating === 1) {
                $rating += 20;
            } else if ($starRating === 2) {
                $rating += 40;
            } else if ($starRating === 3) {
                $rating += 60;
            } else if ($starRating === 4) {
                $rating += 80;
            } else if ($starRating === 5) {
                $rating += 100;
            }
            
            $reviewCount++;
        }

        $this->setReviewCount($reviewCount);
        return $rating;
    }

    function getStarRating($count, $rating): string 
    {
        $average = $rating / $count;
        $star = "";
    
        if ($average >= 20 && $average < 30) {
            $star = "★";
        } else if ($average >= 30 && $average < 50) {
            $star = "★★";
        } else if ($average >= 50 && $average < 70) {
            $star = "★★★";
        } else if ($average >= 70 && $average < 90) {
            $star = "★★★★";
        } else {
            $star = "★★★★★";
        }

        return $star;
    }
}