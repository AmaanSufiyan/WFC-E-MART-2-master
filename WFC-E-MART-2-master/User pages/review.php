<?php
    require_once '../Includes/dbh.inc.php';
    require_once '../Includes/config_session.inc.php';
    require_once '../Includes/review_model.inc.php';
    require_once '../Includes/review_view.inc.php';
    require_once '../Includes/delete_review_view.inc.php';

    if (!isset($_SESSION['user_id'])) {
        // Redirect user to login page or display an error message
        header("Location: ../User pages/signup.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review</title>
    <script src="https://kit.fontawesome.com/b262aa5062.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <link rel="stylesheet" type="text/css" href="../CSS/home.css"/>
    <link rel="stylesheet" type="text/css" href="../CSS/review.css"/>
</head>
<body>

<?php 
include '../Includes/header.php';
?>

<div class="heading">
    <h1>client's review</h1>
    <p><a href="../User pages/home.php">home >></a> review</p>
</div>

<div class="info-container">

    <div class="info">
        <img src="../Images/SVG/Free shipping-pana.svg" alt="">
        <div class="content">
            <h3>fast delivery</h3>
            <span>within 03 days</span>
        </div>
    </div>

    <div class="info">
        <img src="../Images/SVG/Secure login-pana.svg" alt="">
        <div class="content">
            <h3>24/7 availability</h3>
            <span>call us anytime</span>
        </div>
    </div>

    <div class="info">
        <img src="../Images/SVG/Cash Payment-bro.svg" alt="">
        <div class="content">
            <h3>easy payment</h3>
            <span>cash or card</span>
        </div>
    </div>

</div>

<section class="review">

<?php

// Fetch all reviews from the database using your model function
$reviews = getAllReviews($pdo);

// Check if there are any reviews
if (!empty($reviews)) {
    // Loop through each review and display them
    foreach ($reviews as $review) {
        // Display review details here
        echo '<div class="box">';
        echo '<div class="user">';

        if ($_SESSION['user_id'] === $review['user_id']) {
            // If it matches, display the delete and edit buttons
            echo '<div class="review-buttons">';
            echo '<a href="../Includes/delete_review.inc.php?id=' . $review['id'] . '"><i class="fa-solid fa-trash"></i></a>';
            echo '<a href="../User pages/update_review.php?id=' . $review['id'] . '"><i class="fa-solid fa-pencil"></i></a>';
            echo '</div>';
        }

        // Display user image, name, review title, review, and rating
        echo '<div class="info">';
        
        // Get the username using the user_id
        $user_id = $review['user_id'];
        $user = getUsernameById($pdo, $user_id);
        echo '<h3>' . $user['username'] . '</h3>';
        
        echo '<span>' . $review['title'] . '</span>';
        echo '</div>';
        echo '<p>' . $review['review'] . '</p>';
        echo '<div class="rating">';
        echo '<p>Rating: ' . $review['rating'] . '<i class="fa-solid fa-star" style="color: #FFD43B;"></i></p>'; // Display rating number next to stars
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
} else {
    // If no reviews found, display a message
    echo "<script>
        document.addEventListener('DOMContentLoaded', function () {
            swal({
                title: 'No Reviews!',
                text: 'No reviews added yet!',
                icon: 'info',
                button: 'OK'
            });
        });
      </script>";
}
?>

<?php
    check_review_errors()
?>


</section>

        <section class="review-section">
            <h1 class="title">Leave your review</h1>
            <form action="../Includes/review.inc.php" method="post">
              <div class="review-input">
                <label for="review-title">Review Title:</label>
                <input type="text" id="title" name="title" placeholder="Enter a short and descriptive title">
                <label for="review">Review Description:</label>
                <textarea name="review" id="review" cols="30" rows="10" placeholder="Write your review here..."></textarea>
              </div>
              <div class="rating">
                <label for="rating">Rating:</label>
                <input type="radio" id="star5" name="rating" value="5">
                <label for="star5"> 5<i class="fa fa-star"></i></label>
                <input type="radio" id="star4" name="rating" value="4">
                <label for="star4"> 4<i class="fa fa-star"></i></label>
                <input type="radio" id="star3" name="rating" value="3">
                <label for="star3"> 3<i class="fa fa-star"></i></label>
                <input type="radio" id="star2" name="rating" value="2">
                <label for="star2"> 2<i class="fa fa-star"></i></label>
                <input type="radio" id="star1" name="rating" value="1">
                <label for="star1"> 1<i class="fa fa-star"></i></label>
              </div>
              <input type="submit" value="Submit Review">
            </form>
          </section>

        <?php include '../Includes/footer.php'; ?>

        <script src="../JavaScript/nav-menu.js"></script>

    </body>
</html>