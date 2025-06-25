<?php
    require_once 'config_session.inc.php';
    require_once 'dbh.inc.php';

    // Check if the "user_id" key exists in the $_SESSION array
    $userId = isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : null;

    if ($userId && isset($_POST['delivery_address']) && !empty($_POST['delivery_address'])) {
        try {
            $stmt = $pdo->prepare("SELECT * FROM cart WHERE user_id = ?");
            $stmt->execute([$userId]);
            $cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Insert order details into the order table
            foreach ($cartItems as $item) {
                $orderId = uniqid(); // Generate a unique order ID
                $productName = $item['product_name']; // Retrieve product name from $item array
                $quantity = $item['quantity'];
                $totalPrice = $item['total_price'];
                $deliveryAddress = $_POST['delivery_address'];

                // Insert into the order table
                $stmt = $pdo->prepare("INSERT INTO orders (product_name, user_id, quantity, total_price, delivery_address) VALUES (?, ?, ?, ?, ?)");
                $stmt->execute([$productName, $userId, $quantity, $totalPrice, $deliveryAddress]);

                // Insert into the orderStatus table
                $stmt = $pdo->prepare("INSERT INTO orderStatus (order_id, user_id, selectItem, confirmOrder) VALUES (?,?,1,1)");
                $stmt->execute([$orderId, $userId]);
                
            }

            // Clear the cart after checkout
            $stmt = $pdo->prepare("DELETE FROM cart WHERE user_id = ?");
            $stmt->execute([$userId]);

            echo "Checkout successful";
        } catch (PDOException $e) {
            echo "Error during checkout: " . $e->getMessage();
        }
    } else {
        echo "Delivery address is required";
    }
?>