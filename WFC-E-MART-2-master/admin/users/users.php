<!DOCTYPE html>
<html lang="en">

<?php
$pageTitle = "Users";
include("../shared/head.php");
?>

<body>

  <?php
  $page = "Users";
  include("../shared/aside.php");
  ?>

  <section class="page-wrapper">

    <?php
    $title = "Users";

    include("../shared/nav.php");
    ?>

    <div class="page-content px-25">
    
      <?php
      include_once '../database.php';

      $sql = "SELECT * FROM `user`";
      $result = mysqli_query($conn, $sql);

      echo '<table>';
      echo "<thead>";
      echo "<tr>";
      echo "<th>User ID</th>";
      echo "<th>User Name</th>";
      echo "<th>Email</th>";
      echo "<th>Phone Number</th>";
      echo "</tr>";
      echo "</thead>";
      echo "<tbody>";

      if ($result) {
        if (mysqli_num_rows($result) > 0) {

          while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            echo '<td class="text-center">
            <span class="mx-5"></span>
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