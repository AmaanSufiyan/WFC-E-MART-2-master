<!DOCTYPE html>
<html lang="en">

<?php
$pageTitle = "Brands";
include("../shared/head.php");
?>

<body>
  <?php
  $page = "brands";
  include("../shared/aside.php");
  ?>

  <section class="page-wrapper">

    <?php
    $title = "Brands";
    include("../shared/nav.php");
    ?>

    <div class="page-content px-25">

      <a href="addBrand.php" class="custom-btn m-25">Add Brand</a>

      <?php
      include_once '../database.php';

      $sql = "SELECT * FROM `brand` ORDER BY `brand_id`";
      $result = mysqli_query($conn, $sql);

      if ($result) {
        if (mysqli_num_rows($result) > 0) {
          echo '<table>';
          echo "<thead>";
          echo "<tr>";
          echo "<th>Brand ID</th>";
          echo "<th>Brand Name</th>";
          echo '<th class="text-center">Action</th>';
          echo "</tr>";
          echo "</thead>";
          echo "<tbody>";

          while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['brand_id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo '<td class="text-center">
                  <a href="editBrand.php?id=' . $row["brand_id"] . '" class="custom-btn-outline">Edit</a>
                  <span class="mx-5"></span>
                  <a href="brandHandler.php?delete=' . $row["brand_id"] . '" class="custom-btn-outline">Delete</a>
                  </td>';
            echo "</tr>";
          }

          echo "</tbody>";
          echo "</table>";
        } else {
          echo "<p>No records were found.</p>";
        }
      } else {
        echo "<p>Oops! Something went wrong. Please try again later.</p>";
      }

      mysqli_close($conn);
      ?>
    </div>
  </section>

</body>

</html>
