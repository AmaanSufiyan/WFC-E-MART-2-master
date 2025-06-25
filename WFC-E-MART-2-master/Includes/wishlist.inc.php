<?php

declare(strict_types=1);

require_once 'dbh.inc.php';
require_once 'config_session.inc.php';
require_once 'wishlist_model.inc.php';
require_once 'wishlist_contr.inc.php'; 

if (isset($_POST['add_to_wishlist'])) {
    if (!isset($_SESSION['user_id'])) {
        header("Location: ../User pages/signup.php");
        exit();
    }

    try {
        $userId = (int)$_SESSION['user_id'];

        $productId = (int)$_POST['product_id'];

        $errors = [];   

        if (productAlreadyExist($pdo, $userId, $productId)) {
            $errors['product_exists'] = "Product was already added!";
        
            if ($errors) {
                $_SESSION["errors_wishlist"] = $errors;
        
                header("Location: ../User pages/wishlist.php"); 
                exit(); 
            }
            
        } else {
            addToWishlist($pdo, $userId, $productId);
            header("Location: ../User pages/wishlist.php?wishlist=success");
            exit();
        }
    } catch (PDOException $e) {
        die("Failed to add item to wishlist: " . $e->getMessage());
    }
} else {
    die("Form submission error: 'add_to_wishlist' not set");
}

?>
