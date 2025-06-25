<?php
session_start();
include_once '../database.php';

function func_alert($message)
{
  echo '<script language="javascript">';
  echo 'alert("' . $message . '");';
  echo 'location.href="wishlist.php"';
  echo '</script>';
}


if (isset($_GET['delete'])) {
  $id = $_GET['delete'];

  $sql = "DELETE FROM `wishlist` WHERE `id` = $id";

  if (!mysqli_query($conn, $sql)) {
    func_alert("Unable to delete wished item: " . mysqli_error($conn));
  } else {
    func_alert("Deleted Successfully!!!");
  }
}

mysqli_close($conn);
