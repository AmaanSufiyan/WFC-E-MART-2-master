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

function insert_review(object $pdo, int $review_id, string $title, string $review, int $rating){
    updateReview($pdo, $review_id, $title, $review, $rating);
}

?>