<?php
require_once 'config_session.inc.php';
require_once 'dbh.inc.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['item_id']) && isset($_POST['quantity'])) {
        $itemId = $_POST['item_id'];
        $quantity = $_POST['quantity'];

        try {
            // Get the item price from the database
            $stmt = $pdo->prepare("SELECT price FROM cart WHERE id = ?");
            $stmt->execute([$itemId]);
            $item = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($item) {
                $price = $item['price'];

                // Calculate the new total price
                $totalPrice = $price * $quantity;

                // Update the quantity and total price in the database
                $stmt = $pdo->prepare("UPDATE cart SET quantity = ?, total_price = ? WHERE id = ?");
                $stmt->execute([$quantity, $totalPrice, $itemId]);

                echo "Update successful";
            } else {
                echo "Item not found";
            }
        } catch (PDOException $e) {
            echo "Error updating quantity: " . $e->getMessage();
        }
    } else {
        echo "Missing parameters";
    }
} else {
    echo "Invalid request method";
}
?>