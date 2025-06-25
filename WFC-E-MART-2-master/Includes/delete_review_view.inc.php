<?php

declare(strict_types=1);

if(isset($_GET['delete']) && $_GET['delete'] === 'success') {
    echo "<script>
        document.addEventListener('DOMContentLoaded', function () {
            swal({
                title: 'Review Deleted!',
                text: 'The review has been successfully deleted.',
                icon: 'success',
                button: 'OK'
            });
        });
    </script>";
} elseif(isset($_GET['delete']) && $_GET['delete'] === 'error') {
    echo "<script>
        document.addEventListener('DOMContentLoaded', function () {
            swal({
                title: 'Error!',
                text: 'An error occurred while deleting the review.',
                icon: 'error',
                button: 'OK'
            });
        });
    </script>";
}
?>
