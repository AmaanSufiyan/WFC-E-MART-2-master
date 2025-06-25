 <?php
  include_once '../database.php';

  if (isset($_GET["id"]) && !empty($_GET["id"])) {
    $id =  $_GET["id"];
    $sql = "SELECT * FROM `category` WHERE `category_id` = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
  }

  mysqli_close($conn);
  ?>


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
      $title = "Edit Category";
      include("../shared/nav.php");
      ?>

     <div class="page-content px-25">

       <a href="categories.php" class="custom-btn m-25">Go Back</a>

       <div class="card my-25 ">

         <form action="categoryHandler.php?id=<?php echo $_GET["id"] ?>" method="post" enctype="multipart/form-data" class="form-content">
           <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">

           <div class="form-group mb-15">
             <label for="txtCategoryName">Category Name</label>
             <input type="text" name="txtCategoryName" id="txtCategoryName" value="<?php echo $row["name"]; ?>" required />
           </div>

           <div class="form-group mb-15">
             <label for="txtsubCategoryName">Category Name</label>
             <input type="text" name="txtsubCategoryName" id="txtsubCategoryName" value="<?php echo $row["subCategory"]; ?>" required />
           </div>

           <div class="mb-15">
             <button type="submit" class="custom-btn" name="editCategoryBtn" id="editCategoryBtn">Update</button>
           </div>
         </form>
       </div>
     </div>
   </section>

 </body>

 </html>