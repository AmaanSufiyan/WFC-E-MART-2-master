<?php

declare(strict_types=1);

function productAlreadyExist(object $pdo, int $userId, int $productId){
    if (isProductInWishlist($pdo, $userId, $productId)) {
        return true;
    } else {
        return false;
    }
}

?>