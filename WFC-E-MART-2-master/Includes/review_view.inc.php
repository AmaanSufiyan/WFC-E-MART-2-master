<?php

declare(strict_types=1);

function check_review_errors(){
    if(isset($_SESSION["errors_review"])){
        $errors = $_SESSION["errors_review"];

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

        unset($_SESSION["errors_review"]);
    }else if (isset($_GET["review"]) && $_GET["review"] === "success" ) {
        echo "<script>";
        echo "document.addEventListener('DOMContentLoaded', function () {";
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
