<?php

declare(strict_types=1);

require_once 'dbh.inc.php';
require_once 'config_session.inc.php';

if(isset($_POST['remove_item'])) {
    $productId = (int)$_POST['remove_item'];
    
    // Prepare and execute the DELETE query
    $query = "DELETE FROM wishlist WHERE product_id = :product_id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':product_id', $productId, PDO::PARAM_INT);
    $stmt->execute();
    
    header("Location: ../User pages/wishlist.php?delete=success");

    $pdo = null;
    $stmt = null;
    
    exit();
}

if (isset($_GET["delete"]) && $_GET["delete"] === "success" ) {
    echo "<script>";
    echo "document.addEventListener('DOMContentLoaded', function () {";
    echo "swal({
            title: 'Success!',
            text: 'Product deleted from wishlist!',
            icon: 'success',
            button: 'OK',
          }).then(function() {
              window.location.href = '../User pages/wishlist.php';
            });";
    echo "});";
    echo "</script>";
}


?>
