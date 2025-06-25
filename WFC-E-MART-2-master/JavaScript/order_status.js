function updateOrderStatus() {
    var userId = document.getElementById('userId').value;
    var checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
    var progress = Array.from(checkboxes).map(function(checkbox) {
        return checkbox.value;
    });

    $.ajax({
        type: 'POST',
        url: '../../Includes/update_order_status.php',
        data: { user_id: userId, progress: progress },
        success: function(response) {
            Swal.fire({
                icon: 'success',
                title: 'Status Updated!',
                text: 'Status updated success.',
                showConfirmButton: true,
                allowOutsideClick: false
            }).then((result) => {
                // Reload the page after the user clicks OK
                if (result.isConfirmed) {
                    window.location.href = '../product/products.php';
                }
            });
        },
        error: function(xhr, status, error) {
            console.error(xhr, status, error);
        }
    });
}