<?php
    require_once '../Includes/dbh.inc.php';
    require_once '../Includes/config_session.inc.php';
    require_once '../Includes/wishlist_model.inc.php';
    require_once '../Includes/wishlist_view.inc.php';
    require_once '../Includes/wishlist_delete.inc.php';

    if (!isset($_SESSION['user_id'])) {
        header("Location: ../User pages/signup.php");
        exit;
    }

    $userId = $_SESSION['user_id'];
    $products = fetchWishlistItems($pdo, $userId);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wishlist || WFC E-MART</title>
    <script src="https://kit.fontawesome.com/b262aa5062.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <link rel="stylesheet" type="text/css" href="../CSS/wishlist.css"/>
</head>
<body>

<?php include '../Includes/header.php'; ?>

<div class="heading">
    <h1>wishlist</h1>
    <p><a href="../User pages/home.php">home >></a> wishlist</p>
</div>

<div class="info-container">

    <div class="info">
        <img src="../Images/SVG/Wishes-cuate.svg" alt="">
        <div class="content">
            <h3>wish granted</h3>
            <span>magical transactions</span>
        </div>
    </div>

    <div class="info">
        <img src="../Images/SVG/Magic trick-pana.svg" alt="">
        <div class="content">
            <h3>wishlist wonder</h3>
            <span>discover the wonder of your wishlist</span>
        </div>
    </div>

    <div class="info">
        <img src="../Images/SVG/Online wishes list-rafiki.svg" alt="">
        <div class="content">
            <h3>add once</h3>
            <span>never remember</span>
        </div>
    </div>

</div>

<?php product_exists() ?>
    <div class="box">
    <section class="add-to-wishlist">

        <?php if (!empty($products)) : ?>
                <?php foreach ($products as $product): ?>
                    <div class="wishlist-item">
                        <div class="product-image">
                            <img src="<?php echo $product['image_url']; ?>" class="product-thumb" alt="">
                        </div>
                        <div class="product-info">
                            <h3 class="product-name"><?php echo $product['product_name']; ?></h3>
                            <p class="product-brand"><?php echo $product['brand']; ?></p>
                            <p class="product-unit"><?php echo $product['unit']; ?></p>
                            <p><span class="price">Rs. <?php echo $product['price']; ?>/-</span></p>     
                        </div>
                        <script>
                            const userId = <?php echo json_encode($userId); ?>;
                        </script>
                        <div class="button-container">
                            <a href="#<?php echo $product['product_id']; ?>">
                            <button type="submit" class="add-btn" onclick="addCartElm(userId)">add to cart</button>
                            </a>
                            <form action="../Includes/wishlist_delete.inc.php" method="post">
                            <button type="submit" class="remove-btn" name="remove_item" value="<?php echo $product['product_id']; ?>">remove item</button>
                            </form>
                        </div>  
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
            <?php endif; ?>

        </section>
        </div>
        <?php include '../Includes/footer.php'; ?>
        
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="../JavaScript/nav-menu.js"></script>
        <script src="../JavaScript/cart.js"></script>

    </body>
</html>