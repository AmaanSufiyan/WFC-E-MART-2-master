<?php
// Include the database connection file
require_once '../Includes/dbh.inc.php';

// Retrieve subcategory and sorting criteria from the AJAX request
$subcategory = $_GET['subcategory'];
$sortBy = $_GET['sortBy'];

// Prepare and execute a query to fetch products based on the subcategory and sorting criteria
// This is just a placeholder query, you need to replace it with your actual query
$query = "SELECT * FROM products WHERE subcategory = :subcategory ORDER BY $sortBy";
$stmt = $pdo->prepare($query);
$stmt->execute(['subcategory' => $subcategory]);
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Return the fetched products as JSON
header('Content-Type: application/json');
echo json_encode($products);
?>
