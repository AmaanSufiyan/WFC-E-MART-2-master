 <?php
  include_once '../database.php';

  if (isset($_GET["id"]) && !empty($_GET["id"])) {
    $id =  $_GET["id"];
    $sql = "SELECT * FROM `brand` WHERE brand_id=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
  }

  mysqli_close($conn);
  ?>


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
      $title = "Edit Brand";
      include("../shared/nav.php");
      ?>

     <div class="page-content px-25">

       <a href="brands.php" class="custom-btn m-25">Go Back</a>

       <div class="card my-25 ">

         <form action="brandHandler.php?id=<?php echo $_GET["id"] ?>" method="post" enctype="multipart/form-data" class="form-content">
           <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">

           <div class="form-group mb-15">
             <label for="txtBrandName">Brand Name</label>
             <input type="text" name="txtBrandName" id="txtBrandName" value="<?php echo $row["name"]; ?>" required />
           </div>

           <div class="mb-15">
             <button type="submit" class="custom-btn" name="editBrandBtn" id="editBrandBtn">Update</button>
           </div>
         </form>
       </div>
     </div>
   </section>

 </body>

 </html>