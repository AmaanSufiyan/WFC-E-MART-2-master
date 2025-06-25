<?php
require_once '../Includes/config_session.inc.php';
require_once '../Includes/dbh.inc.php';

// Check if the "user_id" key exists in the $_SESSION array
$userId = isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : null;

$totalPrice = 0; // Initialize total price variable

if ($userId) {
    try {
        $stmt = $pdo->prepare("SELECT * FROM cart WHERE user_id = ?");
        $stmt->execute([$userId]);
        $cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Calculate total price
        foreach ($cartItems as $item) {
            $totalPrice += $item['total_price'];
        }
    } catch (PDOException $e) {
        echo "Error fetching cart items: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../CSS/cart.css">
    <title>WFC E-MART Cart</title>
</head>
<body>
    <div class="container">
       <table>
           <thead class="thead">
               <tr>
                   <th>Image</th>
                   <th>Item</th>
                   <th>Price</th>
                   <th>Quantity</th>
                   <th>Total Price</th>
               </tr>
           </thead>
           <tbody class="tbody">
           <?php if ($userId && isset($cartItems)) : ?>
               <?php foreach ($cartItems as $item) : ?>
               <tr>
                   <td><img src="<?php echo $item['image_url']; ?>" alt="<?php echo $item['product_name']; ?>" style="width: 100px;"></td>
                   <td><?php echo $item['product_name']; ?></td>
                   <td>$<?php echo $item['price']; ?></td>
                   <td>
                       <input type="hidden" class="item-id" value="<?php echo $item['id']; ?>">
                       <input type="number" class="quantity" value="<?php echo $item['quantity']; ?>" min="1">
                       <button class="increment" >+</button>
                       <button class="decrement" >-</button>
                   </td>
                   <td>$<?php echo $item['total_price']; ?><i class="fas fa-times" onclick="rmvItem('<?php echo $item['product_name']; ?>' , <?php echo json_encode($userId); ?>)"></i></td>
                   
               </tr>
               <?php endforeach; ?>
           <?php else : ?>
               <tr>
                   <td colspan="5">No items in the cart</td>
               </tr>
           <?php endif; ?>
           </tbody>
       </table> 
       <div>Cart Total: $<?php echo $totalPrice; ?></div>
       <div class="input-field">
            <i class="fas fa-map-marker-alt"></i>
            <input type="text" id="delivery-address" name="delivery-address" placeholder="Enter Delivery Address" />
        </div>
       <button class="btn checkout-btn" onclick="checkout(<?php echo json_encode($userId); ?>, $('#delivery-address').val())">Checkout</button>
    </div>

    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../JavaScript/cart.js"></script>

    <script>
            $(document).ready(function() {

                $('.checkout-btn').on('click', function(event) {
                    event.preventDefault(); // Prevent default form submission

                    const deliveryAddress = $('#delivery-address').val().trim();
                    if (deliveryAddress !== '') {
                        checkout(<?php echo json_encode($userId); ?>, deliveryAddress);
                    } else {
                        alert('Please enter a delivery address');
                    }
            });

            $('.quantity').on('change', function() {
                const itemId = $(this).siblings('.item-id').val();
                const newQuantity = $(this).val();
                const price = parseFloat($(this).closest('tr').find('.price').text().substring(1)); // Get the price without the "$" sign
                const totalPriceCell = $(this).closest('tr').find('.total-price');

                // Calculate new total price
                const newTotalPrice = price * newQuantity;
                totalPriceCell.text('$' + newTotalPrice.toFixed(2)); // Set the new total price in the table

                $.ajax({
                    type: 'POST',
                    url: '../Includes/update-quantity.php',
                    data: { item_id: itemId, quantity: newQuantity, total_price: newTotalPrice },
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr, status, error);
                    }
                });
            });

            $('.increment').on('click', function() {
                const quantityInput = $(this).siblings('.quantity');
                quantityInput.val(parseInt(quantityInput.val()) + 1);
                quantityInput.trigger('change');
                location.reload();
            });

            $('.decrement').on('click', function() {
                const quantityInput = $(this).siblings('.quantity');
                if (parseInt(quantityInput.val()) > 1) {
                    quantityInput.val(parseInt(quantityInput.val()) - 1);
                    quantityInput.trigger('change');
                    location.reload();
                }
            });
        });
    </script>



</body>
</html>