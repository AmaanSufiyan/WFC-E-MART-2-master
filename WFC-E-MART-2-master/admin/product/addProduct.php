 <?php include_once '../database.php'; ?>
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
      $title = "Add Product";
      include("../shared/nav.php");
      ?>

     <div class="page-content px-25">

       <a href="products.php" class="custom-btn m-25">Go Back</a>

       <div class="card my-25">
         <form action="productHandler.php" method="post" enctype="multipart/form-data" class="form-content">
           <div class="form-group mb-15">
             <label for="txtProductName">Product Name</label>
             <input type="text" name="txtProductName" id="txtProductName" required />
           </div>

           <div class="form-group mb-15">
             <label for="imageFile">Image</label>
             <input type="file" name="imageFile" id="imageFile" required>
           </div>

           <div class="form-group mb-15">
             <label for="txtBrandId">Brand</label>
             <select name="txtBrandId" id="txtBrandId" required>
               <?php
                $sql = "SELECT * FROM `brand`";
                $result = mysqli_query($conn, $sql);
                while ($rows = mysqli_fetch_assoc($result)) {
                ?>
                 <option value="<?php echo $rows['brand_id']; ?>"><?php echo $rows['name']; ?></option>
               <?php
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
             <input type="text" name="txtunit" id="txtunit" required />
           </div>

           <div class="form-group mb-15">
             <label for="txtQuantity">Quantity</label>
             <input type="number" name="txtQuantity" id="txtQuantity" required />
           </div>

           <div class="form-group mb-15">
             <label for="txtUnitPrice">Unit Price</label>
             <input type="text" name="txtUnitPrice" id="txtUnitPrice" required />
           </div>



           <div class="mb-15">
             <button type="submit" class="custom-btn" name="createProductBtn" id="createProductBtn">Save</button>
           </div>
         </form>
       </div>
     </div>
   </section>
 </body>

 </html>