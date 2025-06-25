<?php

    require_once 'dbh.inc.php'; 

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $productName = $_POST['product_name'];
        $userId = $_POST['user_id'];

        try {
            $stmt = $pdo->prepare("DELETE FROM cart WHERE user_id = ? AND product_name = ?");
            $stmt->execute([$userId, $productName]);

            echo "Product removed from cart successfully";
        } catch (PDOException $e) {
            echo "Error removing product from cart: " . $e->getMessage();
        }
    } else {
        echo "Invalid request method";
    }

?>