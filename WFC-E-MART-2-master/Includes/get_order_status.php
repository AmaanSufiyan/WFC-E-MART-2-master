<?php
    require_once 'config_session.inc.php';
    require_once 'dbh.inc.php';

    // Check if the "user_id" key exists in the $_SESSION array
    $userId = isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : null;

    if ($userId) {
        try {
            $stmt = $pdo->prepare("SELECT selectItem, confirmOrder, Packing, Shipping, Payment, Delivered  FROM orderstatus WHERE user_id = ?");
            $stmt->execute([$userId]);
            $orderStatus = $stmt->fetch(PDO::FETCH_ASSOC);
            echo json_encode($orderStatus);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "User ID not found";
    }
?>