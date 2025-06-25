<?php

declare(strict_types=1);

function is_input_empty(string $title, string $review){
    if( empty($title) || empty($review) ){
        return true;
    } else {
        return false;
    }
}

function is_rating_empty($rating){
    if( !isset($rating) || $rating === 0 ){
        return true;
    } else {
        return false;
    }
}

function insert_review(object $pdo, int $userId, string $title, string $review, int $rating){
    add_review( $pdo, $userId, $title, $review, $rating);
}

?>