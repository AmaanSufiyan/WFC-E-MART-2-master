<?php

declare(strict_types=1);

function check_review_update_errors(){
    if(isset($_SESSION["errors_update"])){
        $errors = $_SESSION["errors_update"];

        echo "<script>";
        echo "document.addEventListener('DOMContentLoaded', function () {";
        echo "swal({
                title: 'Oops!',
                text: '".implode("\\n", $errors)."',
                icon: 'error',
                button: 'OK',
              });";
        echo "});";
        echo "</script>";

        unset($_SESSION["errors_update"]);
    }elseif (isset($_GET["update"]) && $_GET["update"] === "success") {
        // Display success message if the update parameter is present in the URL
        echo "<script>";
        echo "document.addEventListener('DOMContentLoaded', function () {";
            echo "console.log('Success message script executed.');";
        echo "swal({
                title: 'Success!',
                text: 'Review updated successfully!',
                icon: 'success',
                button: 'OK',
              });";
        echo "});";
        echo "</script>";
    }
}

?>
