<!DOCTYPE html>
<html lang="en">

<?php
$pageTitle = "Products";
include("../shared/head.php");
?>

<body>

  <?php
  $page = "products";
  include("../shared/aside.php");
  ?>

  <section class="page-wrapper">

    <?php
    $title = "Products";

    include("../shared/nav.php");
    ?>

    <div class="page-content px-25">
      <a href="addProduct.php" class="custom-btn m-25">Add Product</a>

      <?php
      include_once '../database.php';

      $sql = "SELECT * FROM `products`";
      $result = mysqli_query($conn, $sql);

      echo '<table>';
      echo "<thead>";
      echo "<tr>";
      echo "<th>Product ID</th>";
      echo "<th>Product Name</th>";
      echo "<th>Image</th>";
      echo "<th>Quantity</th>";
      echo "<th>Unit</th>";
      echo "<th>Unit Price</th>";
      echo '<th class="text-center">Action</th>';
      echo "</tr>";
      echo "</thead>";
      echo "<tbody>";

      if ($result) {
        if (mysqli_num_rows($result) > 0) {

          while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['product_id'] . "</td>";
            echo "<td>" . $row['product_name'] . "</td>";
            echo "<td><img src='" . $row['image_url'] . "' width='100' height='100' /></td>";
            echo "<td>" . $row['stock_quantity'] . "</td>";
            echo "<td>" . $row['unit'] . "</td>";
            echo "<td> Rs. " . $row['price'] . "</td>";
            echo '<td class="text-center">
            <a href="editProduct.php?id=' . $row["product_id"] . '" class="custom-btn-outline">Edit</a>
            <span class="mx-5"></span>
            <a href="productHandler.php?delete=' . $row["product_id"] . '" class="custom-btn-outline">Delete</a>
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