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
    $title = "Add Category";
    include("../shared/nav.php");
    ?>

    <div class="page-content px-25">

      <a href="categories.php" class="custom-btn m-25">Go Back</a>

      <div class="card my-25 ">
        <form action="categoryHandler.php" method="post" enctype="multipart/form-data" class="form-content">
          <div class="form-group mb-15">
            <label for="txtCategoryName">Category Name</label>
            <input type="text" name="txtCategoryName" id="txtCategoryName" required />
          </div>

          <div class="form-group mb-15">
            <label for="txtsubCategoryName">Sub Category Name</label>
            <input type="text" name="txtsubCategoryName" id="txtsubCategoryName" required />
          </div>

          <div class="mb-15">
            <button type="submit" class="custom-btn" name="createCategoryBtn" id="createCategoryBtn">Save</button>
          </div>
        </form>
      </div>
    </div>
  </section>
</body>

</html>