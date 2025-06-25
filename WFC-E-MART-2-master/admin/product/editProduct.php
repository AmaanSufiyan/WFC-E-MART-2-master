  <?php
  session_start();
  include_once '../database.php';

  if (isset($_GET["id"]) && !empty($_GET["id"])) {
    $id =  $_GET["id"];
    $sql = "SELECT * FROM `products` WHERE `product_id` = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
  }
  ?>

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
      $title = "Edit Product";
      include("../shared/nav.php");
      ?>

      <div class="page-content px-25">

        <a href="products.php" class="custom-btn m-25">Go Back</a>

        <div class="card my-25">
          <form action="productHandler.php?id=<?php echo $_GET["id"] ?>" method="post" enctype="multipart/form-data" class="form-content">
            <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">

            <div class="form-group mb-15">
              <label for="txtProductName">Product Name</label>
              <input type="text" name="txtProductName" id="txtProductName" value="<?php echo $row["product_name"]; ?>" required />
            </div>

            <div class="form-group mb-15">
              <label for="imageFile">Image</label>
              <input type="file" name="imageFile" id="imageFile" class="mb-5">
              <?php
              if ($row["image_url"]) {
                $_SESSION["image_url"] = "../../../" . $row["image_url"];
                $_SESSION["dbImage"] = $row["image_url"];
                echo '<img src="' . $row["image_url"] . '">';
              }
              ?>
            </div>

            <div class="form-group mb-15">
              <label for="txtBrandId">Brand</label>
              <select name="txtBrandId" id="txtBrandId" required>
                <?php
                $sql = "SELECT * FROM `brand`";
                $result = mysqli_query($conn, $sql);
                while ($rows = mysqli_fetch_assoc($result)) {
                  if ($rows['brand'] == $row["brand"]) {
                    echo '<option selected value="' . $rows['brand_id'] . '">' . $rows['name'] . '</option>';
                  }
                  if ($rows['brand_id'] != $row["brand_id"]) {
                    echo '<option value="' . $rows['brand_id'] . '">' . $rows['name'] . '</option>';
                  }
                }
                ?>
              </select>
            </div>

            <div class="form-group mb-15">
              <label for="txtCategoryId">Category</label>
              <select name="txtCategoryId" id="txtCategoryId" required>
                <?php
                $sql = "SELECT * FROM `category`";
                $result = mysqli_query($conn, $sql);
                while ($rows = mysqli_fetch_assoc($result)) {
                ?>
                  <option value="<?php echo $rows['category_id']; ?>"><?php echo $rows['name']; ?></option>
                <?php
                }
                ?>
              </select>
            </div>

            <div class="form-group mb-15">
             <label for="txtsubCategoryId">Sub Category</label>
             <select name="txtsubCategoryId" id="txtsubCategoryId" required>
               <?php
                $sql = "SELECT * FROM `category`";
                $result = mysqli_query($conn, $sql);
                while ($rows = mysqli_fetch_assoc($result)) {
                ?>
                 <option value="<?php echo $rows['category_id']; ?>"><?php echo $rows['subCategory']; ?></option>
               <?php
                }
                ?>
             </select>
           </div>

            <div class="form-group mb-15">
              <label for="txtunit">Unit</label>
              <input type="text" name="txtunit" id="txtunit" value="<?php echo $row["unit"]; ?>" required />
            </div>

            <div class="form-group mb-15">
              <label for="txtQuantity">Quantity</label>
              <input type="number" name="txtQuantity" id="txtQuantity" value="<?php echo $row["stock_quantity"]; ?>" required />
            </div>

            <div class="form-group mb-15">
              <label for="txtUnitPrice">Unit Price</label>
              <input type="text" name="txtUnitPrice" id="txtUnitPrice" value="<?php echo $row["price"]; ?>" required />
            </div>



            <div class="mb-15">
              <button type="submit" class="custom-btn" name="editProductBtn" id="editProductBtn">Save</button>
            </div>
          </form>
        </div>
      </div>
    </section>
  </body>

  </html>

  <?php mysqli_close($conn); ?>