<!DOCTYPE html>
<html lang="en">

<?php
$pageTitle = "Wishlist of User";
include("../shared/head.php");
?>

<body>

  <?php
  $page = "Wishlist of User";
  include("../shared/aside.php");
  ?>

  <section class="page-wrapper">

    <?php
    $title = "Wishlist of User";

    include("../shared/nav.php");
    ?>

    <div class="page-content px-25">
      <?php
      include_once '../database.php';

      $sql = "SELECT * FROM `wishlist`";
      $result = mysqli_query($conn, $sql);

      echo '<table>';
      echo "<thead>";
      echo "<tr>";
      echo "<th>ID</th>";
      echo "<th>User ID</th>";
      echo "<th>Product ID</th>";
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
            echo "<td>" . $row['user_id'] . "</td>";
            echo "<td>" . $row['product_id'] . "</td>";
            echo "<td>" . $row['added_at'] . "</td>";
            echo '<td class="text-center">
            <span class="mx-5"></span>
            <a href="wishlistHandler.php?delete=' . $row["id"] . '" class="custom-btn-outline">Delete</a>
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