<?php
// Include the database connection file
include '../Includes/dbh.inc.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize form data
    if (isset($_POST['review_title'])) {
        $title = htmlspecialchars($_POST['review_title']);
    } else {
        // Handle the case where title is not set
        $title = ''; // You can assign a default value or handle it accordingly
    }
    $review = htmlspecialchars($_POST['review']);
    
    // Check if the 'rating' key is set in $_POST array
    $rating = isset($_POST['rating']) ? $_POST['rating'] : null;

    // Check if title is not null before inserting into the database
    if ($title !== '') {
        // Insert the review into the database
        $insert_review = $pdo->prepare("INSERT INTO reviews (title, review, rating) VALUES (?, ?, ?)");
        $insert_review->execute([$title, $review, $rating]);

        // Redirect back to the review page
        header("Location: ../User pages/review.php");
        exit();
    } else {
        // Handle the case where title is null
        echo "<script>
                document.addEventListener('DOMContentLoaded', function () {
                swal({
                    title: 'Error!',
                    text: 'Title cannot be empty',
                    icon: 'error',
                    button: 'OK'
                });
                });
              </script>";
    }
}
?>
