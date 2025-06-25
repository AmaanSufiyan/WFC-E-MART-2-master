<?php
require_once 'config_session.inc.php';
require_once 'dbh.inc.php';

// Check if the "user_id" key exists in the $_POST array
$userId = isset($_POST["user_id"]) ? $_POST["user_id"] : null;

// Check if the "progress" key exists and is an array in the $_POST array
$progress = isset($_POST["progress"]) && is_array($_POST["progress"]) ? $_POST["progress"] : [];

if ($userId && !empty($progress)) {
    try {
        $stmt = $pdo->prepare("UPDATE orderstatus SET selectItem = 0, confirmOrder = 0, Packing = 0, Shipping = 0, Payment = 0, Delivered = 0 WHERE user_id = ?");
        $stmt->execute([$userId]);

        foreach ($progress as $status) {
            $stmt = $pdo->prepare("UPDATE orderstatus SET $status = 1 WHERE user_id = ?");
            $stmt->execute([$userId]);
        }

        echo "Order status updated successfully";
    } catch (PDOException $e) {
        echo "Error updating order status: " . $e->getMessage();
    }
} else {
    echo "Invalid user ID or progress values";
}
?>