<?php

declare(strict_types=1);

function getReviewById(PDO $pdo, int $review_id)
{
    $query = "SELECT * FROM reviews WHERE id = :review_id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":review_id", $review_id, PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function updateReview(PDO $pdo, int $review_id, string $title, string $review, int $rating)
{
    $query = "UPDATE reviews SET title = :title, review = :review, rating = :rating WHERE id = :review_id";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":title", $title);
    $stmt->bindParam(":review", $review);
    $stmt->bindParam(":rating", $rating);
    $stmt->bindParam(":review_id", $review_id, PDO::PARAM_INT);
    return $stmt->execute();
}
?>