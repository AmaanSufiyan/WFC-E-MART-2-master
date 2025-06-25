<?php

declare(strict_types=1);

function check_signup_errors(){
    if(isset($_SESSION["errors_signup"])){
        $errors = $_SESSION["errors_signup"];

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

        unset($_SESSION["errors_signup"]);
    }else if (isset($_GET["signup"]) && $_GET["signup"] === "success" ) {
        echo "<script>";
        echo "document.addEventListener('DOMContentLoaded', function () {";
        echo "swal({
                title: 'Success!',
                text: 'Signup success!',
                icon: 'success',
                button: 'OK',
              });";
        echo "});";
        echo "</script>";
    }
}

?>
