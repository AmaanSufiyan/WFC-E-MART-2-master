<?php
// Include necessary files
require_once '../Includes/dbh.inc.php';
require_once '../Includes/config_session.inc.php';
require_once '../Includes/update_review_model.inc.php';
require_once '../Includes/update_review_view.inc.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the review page if not logged in
    header("Location: ../User pages/review.php");
    exit;
}

// Check if review ID is set
if(isset($_GET['id'])) {
    // Sanitize review ID
    $review_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

    // Get review details from the database
    $review = getReviewById($pdo, $review_id);

    // Check if review exists
    if (!$review) {
        // Redirect to the review page if review not found
        header("Location: ../User pages/review.php");
        exit;
    }
} else {
    // Redirect to the review page if review ID is not set
    header("Location: ../User pages/review.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Review</title>
    <script src="https://kit.fontawesome.com/b262aa5062.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <link rel="stylesheet" type="text/css" href="../CSS/update_review.css"/>
</head>
<body>

    <?php
    check_review_update_errors();
    ?>

    <section class="review-section">
        <h1 class="title">Update Review</h1>
        <form action="../Includes/update_review.inc.php" method="post">
            <input type="hidden" name="review_id" value="<?php echo $review['id']; ?>">
            <div class="review-input">
                <label for="title">Review Title:</label>
                <input type="text" id="title" name="title" value="<?php echo $review['title']; ?>">
            </div>
            <div class="review-input">
                <label for="review">Review Description:</label>
                <textarea name="review" id="review" cols="30" rows="10"><?php echo $review['review']; ?></textarea>
            </div>
            <div class="rating">
                <label for="rating">Rating:</label>
                <input type="radio" id="star5" name="rating" value="5" <?php if ($review['rating'] == 5) echo 'checked'; ?>>
                <label for="star5"> 5<i class="fa fa-star"></i></label>
                <input type="radio" id="star4" name="rating" value="4" <?php if ($review['rating'] == 4) echo 'checked'; ?>>
                <label for="star4"> 4<i class="fa fa-star"></i></label>
                <input type="radio" id="star3" name="rating" value="3" <?php if ($review['rating'] == 3) echo 'checked'; ?>>
                <label for="star3"> 3<i class="fa fa-star"></i></label>
                <input type="radio" id="star2" name="rating" value="2" <?php if ($review['rating'] == 2) echo 'checked'; ?>>
                <label for="star2"> 2<i class="fa fa-star"></i></label>
                <input type="radio" id="star1" name="rating" value="1" <?php if ($review['rating'] == 1) echo 'checked'; ?>>
                <label for="star1"> 1<i class="fa fa-star"></i></label>
            </div>
            <input type="submit" value="Update">
        </form>
    </section>

</body>
</html>
