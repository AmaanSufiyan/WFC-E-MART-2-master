function addCartElm(userId) {
    const productBox = $(event.target).closest('.box');
    const productId = productBox.data('product-id');
    const productName = productBox.find('h3').text();
    const productPrice = productBox.find('.price').text().replace('Rs ', '').replace('/-', '');
    const productImageUrl = productBox.find('.image img').attr('src');

    const data = {
        product_id: productId,
        product_name: productName,
        price: productPrice,
        image_url: productImageUrl,
        user_id: userId 
    };

    $.ajax({
        type: 'POST',
        url: '../Includes/add-to-cart.php',
        data: data,
        success: function(response) {
            Swal.fire({
                icon: 'success',
                title: 'Product Added!',
                text: 'The product has been added to your cart.',
                showConfirmButton: true,
                allowOutsideClick: false
            }).then((result) => {
                // Reload the page after the user clicks OK
                if (result.isConfirmed) {
                    location.reload();
                }
            });
        },
        error: function(xhr, status, error) {
            console.error(xhr, status, error);
        }
    });
}

function rmvItem(productName, userId) {
    const data = {
        product_name: productName,
        user_id: userId
    };

    $.ajax({
        type: 'POST',
        url: '../Includes/remove-from-cart.php',
        data: data,
        success: function(response) {
            Swal.fire({
                icon: 'success',
                title: 'Product Removed!',
                text: 'The product has been Removed From your cart.',
                showConfirmButton: true,
                allowOutsideClick: false
            }).then((result) => {
                // Reload the page after the user clicks OK
                if (result.isConfirmed) {
                    location.reload();
                }
            });
        },
        error: function(xhr, status, error) {
            console.error(xhr, status, error);
        }
    });
}

function checkout(userId, deliveryAddress) {
    const data = {
        user_id: userId,
        delivery_address: deliveryAddress
    };

    $.ajax({
        type: 'POST',
        url: '../Includes/checkout.php',
        data: data,
        success: function(response) {
            console.log(response);
            window.location.href = '../User pages/order_tracking.html';
        },
        error: function(xhr, status, error) {
            console.error(xhr, status, error);
        }
    });
}