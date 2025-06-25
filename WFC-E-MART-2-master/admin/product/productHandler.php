<?php
session_start();
include_once '../database.php';

function func_alert($message)
{
  echo '<script language="javascript">';
  echo 'alert("' . $message . '");';
  echo 'location.href="products.php"';
  echo '</script>';
}

if (isset($_POST["createProductBtn"])) {
  $date = date_create();
  $dbimage = "../Images/Products/" . date_timestamp_get($date) . "-" . basename($_FILES["imageFile"]["name"]);
  $image = "../../Images/Products/" . date_timestamp_get($date) . "-" . basename($_FILES["imageFile"]["name"]);

  if (move_uploaded_file($_FILES["imageFile"]["tmp_name"], $image)) {
    $productName = $_POST["txtProductName"];
    $quantity = $_POST["txtQuantity"];
    $price = $_POST["txtUnitPrice"];
    $brandId = $_POST["txtBrandId"];
    $categoryId = $_POST["txtCategoryId"];
    $SubcategoryId = $_POST["txtsubCategoryId"];
    $unit = $_POST["txtunit"];

    $sql = "INSERT INTO `products` (`product_name`,`image_url`, `stock_quantity`, `price`, `brand`, `category`, `subCategory`, `unit`) 
          VALUES ('$productName', '$dbimage', '$quantity', '$price', '$brandId', '$categoryId', '$SubcategoryId', '$unit');";

    if (!mysqli_query($conn, $sql)) {
      func_alert("Unable to insert a new product: " . mysqli_error($conn));
    } else {
      func_alert("Product Added Successfully!!!");
    }
  } else {
    func_alert("Unable insert a product image: " . mysqli_error($conn));
  }
}

if (isset($_POST["editProductBtn"])) {
  $id = $_POST["id"];
  $productName = $_POST["txtProductName"];
  $quantity = $_POST["txtQuantity"];
  $unitPrice = $_POST["txtUnitPrice"];
  $brandId = $_POST["txtBrandId"];
  $categoryId = $_POST["txtCategoryId"];
  $SubcategoryId = $_POST["txtsubCategoryId"];
  $unit = $_POST["txtunit"];

  if (!file_exists($_FILES['imageFile']["tmp_name"]) || !is_uploaded_file($_FILES['imageFile']["tmp_name"])) {
    $image = $_SESSION["image"];
    $dbImage = $_SESSION["dbImage"];
  } else {
    $date = date_create();
    $dbimage = "../Images/Products" . date_timestamp_get($date) . "-" . basename($_FILES["imageFile"]["name"]);
    $image = "../../Images/Products" . date_timestamp_get($date) . "-" . basename($_FILES["imageFile"]["name"]);
    move_uploaded_file($_FILES["imageFile"]["tmp_name"], $image);
  }

  $sql = "UPDATE `products` SET `product_name` = '$productName', `image_url` = '$dbImage',
   `stock_quantity` = '$quantity', `price` = '$unitPrice', `brand` = '$brandId', `category` = '$categoryId', `subCategory` = '$SubcategoryId', `unit` = '$unit' WHERE `product_id` = $id";

  if (!mysqli_query($conn, $sql)) {
    func_alert("Unable update product: " . mysqli_error($conn));
  } else {
    func_alert("Product Updated Successfully!!!");
  }
}

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];

  $sql = "DELETE FROM `products` WHERE `product_id` = $id";

  if (!mysqli_query($conn, $sql)) {
    func_alert("Unable to delete product: " . mysqli_error($conn));
  } else {
    func_alert("Product Deleted Successfully!!!");
  }
}

mysqli_close($conn);
