
document.addEventListener("DOMContentLoaded", function() {
    // Fetch order status using AJAX
    $.ajax({
        type: 'GET',
        url: '../Includes/get_order_status.php',
        success: function(response) {
            const orderStatus = JSON.parse(response);
            console.log(response);
            updateProgressBar(orderStatus);
        },
        error: function(xhr, status, error) {
            console.error(xhr, status, error);
        }
    });

    function updateProgressBar(orderStatus) {
        const steps = ['selectItem', 'confirmOrder', 'Packing', 'Shipping', 'Payment', 'Delivered'];
        steps.forEach((step, index) => {
            const progressStep = document.querySelector(`.${step}`);
            if (progressStep) {
                if (orderStatus[step]) {
                    progressStep.classList.add('active');
                } else {
                    progressStep.classList.remove('active');
                }
            }
        });
    }
});