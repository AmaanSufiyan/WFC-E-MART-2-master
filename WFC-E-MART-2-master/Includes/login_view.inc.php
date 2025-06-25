<?php

declare(strict_types=1);

function check_login_errors()
{
    if (isset($_SESSION["errors_login"])){
        $errors = $_SESSION["errors_login"];
        
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
        
        unset($_SESSION["errors_login"]);
    } else if(isset($_GET["login"]) && $_GET["login"] === "success" ) {
        echo "<script>";
        echo "document.addEventListener('DOMContentLoaded', function () {";
        echo "swal({
                title: 'Success!',
                text: 'Login success!',
                icon: 'success',
                button: 'OK',
              });";
        echo "});";
        echo "</script>";
        exit;
    }
}

?>
