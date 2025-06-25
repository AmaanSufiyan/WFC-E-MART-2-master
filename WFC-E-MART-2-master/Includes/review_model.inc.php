<?php
// review_model.inc.php

declare(strict_types=1);

function getAllReviews(PDO $pdo)
{
    $query = "SELECT * FROM reviews";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function getUsernameById(PDO $pdo, int $userId)
{
    $query = "SELECT username FROM user WHERE id = :userId";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":userId", $userId, PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function add_review(PDO $pdo, int $userId, string $title, string $review, int $rating)
{
    $query = "INSERT INTO reviews (user_id, title, review, rating) VALUES (:userId, :title, :review, :rating)";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":userId", $userId);
    $stmt->bindParam(":title", $title);
    $stmt->bindParam(":review", $review);
    $stmt->bindParam(":rating", $rating);
    $stmt->execute();
}

?>
