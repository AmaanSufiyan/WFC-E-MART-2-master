<?php

require_once '../Includes/config_session.inc.php';

if($_SERVER["REQUEST_METHOD"] === "POST"){

    if(isset($_SESSION['user_id'])){
    // Retrieve user ID from the session
    $userId =(int) $_SESSION['user_id'];

    $title = $_POST["title"];
    $review = $_POST["review"];
    $rating =(int) $_POST["rating"];

        try{

            require_once 'dbh.inc.php';
            require_once 'review_model.inc.php';
            require_once 'review_contr.inc.php';

            // ERROR HANDLERS
            $errors = [];

            if(is_input_empty($title, $review)){
                $errors["empty_input"] = "Fil all the fields!";
            }

            if(is_rating_empty($rating)){
                $errors["empty_rating"] = "Please enter a rating!";
            }

            if($errors){
                $_SESSION["errors_review"] = $errors;

                header("location: ../User pages/review.php");
                die();
            }

            insert_review($pdo, $userId, $title, $review, $rating);

            header("location: ../User pages/review.php?review=success");

            die();

        } catch (PDOException $e) {

            die("Query failed: " . $e->getMessage());
        }
    } 
}else{
    header("location: ../User pages/home.php");
    die();
}

?>