<?php
session_start();
include_once '../database.php';

function func_alert($message)
{
  echo '<script language="javascript">';
  echo 'alert("' . $message . '");';
  echo 'location.href="orders_received.php"';
  echo '</script>';
}


if (isset($_GET['delete'])) {
  $id = $_GET['delete'];

  $sql = "DELETE FROM `orders` WHERE `id` = $id";

  if (!mysqli_query($conn, $sql)) {
    func_alert("Unable to delete Order: " . mysqli_error($conn));
  } else {
    func_alert("Order Deleted Successfully!!!");
  }
}

mysqli_close($conn);
