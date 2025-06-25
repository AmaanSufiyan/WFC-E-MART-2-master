<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Progress Bar Controller</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<?php
$pageTitle = "Order Status";
include("../shared/head.php");
?>
<body>

<?php
  $page = "Order Status";
  include("../shared/aside.php");
  ?>

  <section class="page-wrapper">

    <?php
    $title = "Order Status";

    include("../shared/nav.php");
    ?>

    <div class="page-content px-25">
        <div class="controls">
            <label for="userId">User ID:</label>
            <input type="text" id="userId" name="userId">
            <form onsubmit="updateOrderStatus(); return false;">
                <input type="checkbox" id="selectItem" name="progress[]" value="selectItem">
                <label for="selectItem">Select Item</label><br>
                <input type="checkbox" id="confirmOrder" name="progress[]" value="confirmOrder">
                <label for="confirmOrder">Confirm Order</label><br>
                <input type="checkbox" id="packing" name="progress[]" value="packing">
                <label for="packing">Packing</label><br>
                <input type="checkbox" id="shipping" name="progress[]" value="shipping">
                <label for="shipping">Shipping</label><br>
                <input type="checkbox" id="payment" name="progress[]" value="payment">
                <label for="payment">Payment</label><br>
                <input type="checkbox" id="delivered" name="progress[]" value="delivered">
                <label for="delivered">Delivered</label><br>
                <button type="submit">Update Status</button>
            </form>
        </div>
    </div>
  </section>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: #c2ffc8;
            background-image: url();
            margin: 0;
            padding: 10px;
        }

        .controls {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 5px 10px rgba(0,0,0,0.2);
            padding: 50px;
            max-width: 300px;
            margin: 30px auto;
        }

        label, input[type="checkbox"] {
            cursor: pointer;
        }

        input[type="text"], button {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #5cb85c;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #4cae4c;
        }

        @media (max-width: 768px) {
            .controls {
                width: 90%;
                padding: 10px;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 5px;
            }

            .controls {
                width: 100%;
            }
        }
    </style>

<script src="../../JavaScript/order_status.js"></script>
</body>
</html>