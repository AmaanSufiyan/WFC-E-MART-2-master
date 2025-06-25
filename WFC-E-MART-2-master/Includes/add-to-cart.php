<?php
    require_once 'dbh.inc.php'; // Include the file where the PDO connection is established
    require_once 'config_session.inc.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $productName = $_POST['product_name'];
        $price = $_POST['price'];
        $imageUrl = $_POST['image_url'];
        $userId = $_POST['user_id'];

        try {
            // Check if the product already exists in the cart
            $stmt = $pdo->prepare("SELECT * FROM cart WHERE product_name = ?");
            $stmt->execute([$productName]);
            $existingProduct = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($existingProduct) {
                // Product already exists, update the quantity and total price
                $quantity = $existingProduct['quantity'] + 1;
                $totalPrice = $existingProduct['price'] * $quantity;

                $stmt = $pdo->prepare("UPDATE cart SET quantity = ?, total_price = ? WHERE product_name = ?");
                $stmt->execute([$quantity, $totalPrice, $productName]);
            } else {
                // Product does not exist, insert a new record
                $stmt = $pdo->prepare("INSERT INTO cart (product_name, price, image_url, quantity, total_price, user_id) VALUES (?, ?, ?, 1, ?, ?)");
                $stmt->execute([$productName, $price, $imageUrl, $price, $userId]);
            }

            echo "Product added to cart successfully";
        } catch (PDOException $e) {
            echo "Error adding product to cart: " . $e->getMessage();
        }
    } else {
        echo "Invalid request method";
    }

    
?>
