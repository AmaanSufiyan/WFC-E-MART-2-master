<?php
declare(strict_types=1);

function fetchWishlistItems(object $pdo, int $userId) {
    $query = "SELECT p.*, w.user_id 
            FROM wishlist w
            JOIN products p ON w.product_id = p.product_id
            WHERE w.user_id = :user_id";
    
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function isProductInWishlist(object $pdo, int $userId, int $productId){
    $query = "SELECT COUNT(*) FROM wishlist WHERE user_id = :user_id AND product_id = :product_id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
    $stmt->bindParam(':product_id', $productId, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchColumn();
}


function addToWishlist(object $pdo, int $userId, int $productId) {

    $query = "INSERT INTO wishlist (user_id, product_id) 
            VALUES (:user_id, :product_id)";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
    $stmt->bindParam(':product_id', $productId, PDO::PARAM_INT);
    $stmt->execute();
}

?>
