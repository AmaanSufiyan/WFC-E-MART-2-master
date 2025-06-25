<?php

declare(strict_types=1);

// Include session configuration
require_once '../Includes/config_session.inc.php';

// Check if all required fields are set in the POST request
if (isset($_POST['review_id'], $_POST['title'], $_POST['review'], $_POST['rating'])) {
    // Extract data from POST request
    $review_id = (int) $_POST['review_id'];
    $title = $_POST['title'];
    $review = $_POST['review'];
    $rating = (int) $_POST['rating'];

    try {
        // Include necessary files
        require_once 'dbh.inc.php';
        require_once 'update_review_model.inc.php';
        require_once 'update_review_contr.inc.php';

        // ERROR HANDLERS
        $errors = [];

        // Check for empty input fields
        if (is_input_empty($title, $review)) {
            $errors["empty_input"] = "Fill all the fields!";
        }

        // Check if rating is empty
        if (is_rating_empty($rating)) {
            $errors["empty_rating"] = "Please enter a rating!";
        }

        // If there are errors, store them in session and redirect back
        if ($errors) {
            $_SESSION["errors_update"] = $errors;
            header("location: " . $_SERVER['HTTP_REFERER']);
            exit();
        }

        // Update the review
        updateReview($pdo, $review_id, $title, $review, $rating);

        // Redirect with success message
        header("Location: ../User pages/review.php?update=success");

        $pdo = null;
        $stmt = null;

        die();

    } catch (PDOException $e) {
        // Handle database query errors
        die("Query failed: " . $e->getMessage());
    }
} else{
    header("location: ../User pages/home.php");
    die();
}

?>
