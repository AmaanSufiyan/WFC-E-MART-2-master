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
    $title = "Add Brand";
    include("../shared/nav.php");
    ?>

    <div class="page-content px-25">

      <a href="brands.php" class="custom-btn m-25">Go Back</a>

      <div class="card my-25 ">
        <form action="brandHandler.php" method="post" enctype="multipart/form-data" class="form-content">
          <div class="form-group mb-15">
            <label for="txtBrandName">Brand Name</label>
            <input type="text" name="txtBrandName" id="txtBrandName" required />
          </div>

          <div class="mb-15">
            <button type="submit" class="custom-btn" name="createBrandBtn" id="createBrandBtn">Save</button>
          </div>
        </form>
      </div>
    </div>
  </section>
</body>

</html>