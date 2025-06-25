<!DOCTYPE html>
<html lang="en">

<?php
$pageTitle = "Orders Received";
include("../shared/head.php");
?>

<body>

  <?php
  $page = "Orders Received";
  include("../shared/aside.php");
  ?>

  <section class="page-wrapper">

    <?php
    $title = "Orders Received";

    include("../shared/nav.php");
    ?>

    <div class="page-content px-25">
      <?php
      include_once '../database.php';

      $sql = "SELECT * FROM `orders`";
      $result = mysqli_query($conn, $sql);

      echo '<table>';
      echo "<thead>";
      echo "<tr>";
      echo "<th>Order ID</th>";
      echo "<th>Product Name</th>";
      echo "<th>user ID</th>";
      echo "<th>Quantity</th>";
      echo "<th>Total price</th>";
      echo "<th>Delivery address</th>";
      echo "<th>Date and Time</th>";
      echo '<th class="text-center">Action</th>';
      echo "</tr>";
      echo "</thead>";
      echo "<tbody>";

      if ($result) {
        if (mysqli_num_rows($result) > 0) {

          while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['product_name'] . "</td>";
            echo "<td>" . $row['user_id'] . "</td>";
            echo "<td>" . $row['quantity'] . "</td>";
            echo "<td> Rs. " . $row['total_price'] . "</td>";
            echo "<td>" . $row['delivery_address'] . "</td>";
            echo "<td>" . $row['created_at'] . "</td>";
            echo '<td class="text-center">
            <span class="mx-5"></span>
            <a href="orderHandler.php?delete=' . $row["id"] . '" class="custom-btn-outline">Delete</a>
            </td>';
            echo "</tr>";
          }

          mysqli_free_result($result);
        } else {
          echo "<tr>";
          echo "<td><em>No records were found.</em></td>";
          echo "</tr>";
        }
      } else {
        echo "<tr>";
        echo "<td><em>Oops! Something went wrong. Please try again later.</em></td>";
        echo "</tr>";
      }

      echo "<tbody>";
      echo "</tbody>";
      echo "</table>";

      mysqli_close($conn);
      ?>
    </div>
  </section>
</body>

</html>