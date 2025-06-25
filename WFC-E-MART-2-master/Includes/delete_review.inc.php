<?php

declare(strict_types=1);

require_once '../Includes/dbh.inc.php'; // Include your database connection script
require_once '../Includes/config_session.inc.php';

// Check if the review ID is provided in the query parameter
if(isset($_GET['id'])) {
    // Sanitize the input to prevent SQL injection
    $review_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

    // Prepare and execute a SQL query to delete the review
    $stmt = $pdo->prepare("DELETE FROM reviews WHERE id = ?");
    $stmt->execute([$review_id]);

    // Redirect back to the review page or any other appropriate page
    header("Location: ../User pages/review.php");
    exit();
} else {
    // If review ID is not provided, redirect to an error page or appropriate handling
    header("Location: ../User pages/review.php");
    exit();
}
?>
