<?php

declare(strict_types=1);

require_once '../Includes/dbh.inc.php'; 
require_once '../Includes/all-products_model.inc.php'; 

// Call the function to fetch all products
$products = getAllProducts($pdo);

?>
