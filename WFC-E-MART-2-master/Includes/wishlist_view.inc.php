<?php

declare(strict_types=1);

function product_exists(){
    if(isset($_SESSION["errors_wishlist"])){
        $errors = $_SESSION["errors_wishlist"];

        echo "<script>";
        echo "document.addEventListener('DOMContentLoaded', function () {";
        echo "swal({
                title: 'Oops!',
                text: '".implode("\\n", $errors)."',
                icon: 'error',
                button: 'OK',
            }).then(function() {
                window.location.href = '../User pages/wishlist.php';
              });";
        echo "});";
        echo "</script>";

        unset($_SESSION["errors_wishlist"]);

    }else if (isset($_GET["wishlist"]) && $_GET["wishlist"] === "success" ) {
        echo "<script>";
        echo "document.addEventListener('DOMContentLoaded', function () {";
        echo "swal({
                title: 'Success!',
                text: 'Product added to wishlist!',
                icon: 'success',
                button: 'OK',
                }).then(function() {
                window.location.href = '../User pages/wishlist.php';
            });";
        echo "});";
        echo "</script>";

    }
}

?>
