<!DOCTYPE html>
<html lang="en">

<?php
$pageTitle = "Categories";
include("../shared/head.php");
?>

<body>

  <?php
  $page = "categories";
  include("../shared/aside.php");
  ?>

  <section class="page-wrapper">

    <?php
    $title = "Categories";
    include("../shared/nav.php");
    ?>

    <div class="page-content px-25">
      <a href="addCategory.php" class="custom-btn m-25">Add Category</a>

      <?php
      include_once '../database.php';

      $limit = 5;
      $sql = "SELECT * FROM category";
      $result = mysqli_query($conn, $sql);
      $total_rows = mysqli_num_rows($result);
      $total_pages = ceil($total_rows / $limit);

      if (!isset($_GET['page'])) {
        $page_number = 1;
      } else {
        $page_number = $_GET['page'];
      }

      $initial_page = ($page_number - 1) * $limit;
      $getQuery = "SELECT * FROM `category` ORDER BY `category_id` DESC LIMIT $initial_page, $limit ";

      echo '<table>';
      echo "<thead>";
      echo "<tr>";
      echo "<th>Category ID</th>";
      echo "<th>Category Name</th>";
      echo "<th>Sub Category Name</th>";
      echo '<th class="text-center">Action</th>';
      echo "</tr>";
      echo "</thead>";
      echo "<tbody>";

      if ($result = mysqli_query($conn, $getQuery)) {
        if (mysqli_num_rows($result) > 0) {

          while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['category_id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['subCategory'] . "</td>";
            echo '<td class="text-center">
              <a href="editCategory.php?id=' . $row["category_id"] . '" class="custom-btn-outline">Edit</a>
              <span class="mx-5"></span>
              <a href="categoryHandler.php?delete=' . $row["category_id"] . '" class="custom-btn-outline">Delete</a>
              </td>';
            echo "</tr>";
          }

          if ($total_pages > 1) {
            echo '<tr class="table-row">';
            echo '<td class="table-account pagination" colspan="3">';
            for ($page_number = 1; $page_number <= $total_pages; $page_number++) {
              echo '<a href = "categories.php?page=' . $page_number . '">' . $page_number . ' </a>';
            }
            echo ' </td>';
            echo '</tr>';
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