<?php
include_once '../database.php';

function func_alert($message)
{
  echo '<script language="javascript">';
  echo 'alert("' . $message . '");';
  echo 'location.href="brands.php"';
  echo '</script>';
}

if (isset($_POST["createBrandBtn"])) {
  $brandName = $_POST["txtBrandName"];
  
  $sql = "INSERT INTO `brand` (`name`) VALUES ('$brandName');";
  
  if (!mysqli_query($conn, $sql)) {
    func_alert("Unable to insert a new brand: " . mysqli_error($conn));
  } else {
    func_alert("Brand Added Successfully!!!");
  }
}

if (isset($_POST["editBrandBtn"])) {
  $id = $_POST["id"];
  $brandName = $_POST["txtBrandName"];
 
  $sql = "UPDATE `brand` SET `name` = '$brandName' WHERE `brand_id` = $id";
 
  if (!mysqli_query($conn, $sql)) {
    func_alert("Unable to update brand: " . mysqli_error($conn));
  } else {
    func_alert("Brand Updated Successfully!!!");
  }
}

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  
  $sql = "DELETE FROM `brand` WHERE `brand_id` = $id";
  
  if (!mysqli_query($conn, $sql)) {
    func_alert("Unable to delete brand: " . mysqli_error($conn));
  } else {
    func_alert("Brand Deleted Successfully!!!");
  }
}

mysqli_close($conn);

?>