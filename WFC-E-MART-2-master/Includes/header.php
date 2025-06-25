<?php

require_once '../Includes/config_session.inc.php';
require_once '../Includes/dbh.inc.php';

// Check if the "user_id" key exists in the $_SESSION array
$userId = isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : null;

if ($userId) {
    try {
        $stmt = $pdo->prepare("SELECT * FROM cart WHERE user_id = ?");
        $stmt->execute([$userId]);
        $cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error fetching cart items: " . $e->getMessage();
    }
}

?>

<header class="header">
    <a href="../User pages/home.php" class="logo"><i class="fa-solid fa-shop" style="color: #ECF39E;"></i>WFC E-MART</a> 

    <nav class="navbar">
        <a href="../User pages/home.php">Home</a>
        <a href="../User pages/all-products.php">Products</a>
        <a href="../User pages/about.html"><i class="fa-solid fa-location-dot" style="color: #ECF39E;"></i> Store Location</a>
        <?php if ($userId) : ?>
            <a href="../User pages/review.php"><i class="fa-solid fa-pen-to-square" style="color: #ECF39E;"></i> Review</a>
            <a href="../User pages/wishlist.php"><i class="fa-solid fa-hand-holding-heart" style="color: #ECF39E;"></i> My Lists</a>
            <a href="../User pages/order_tracking.html"><i class="fa-solid fa-truck-ramp-box" style="color: #ECF39E;"></i> Track My Order</a>
            <a href="../Includes/logout.inc.php"><i class="fa-solid fa-right-from-bracket" style="color: #ECF39E;"></i> Logout</a>
        <?php endif; ?>
        
        <?php if (!$userId) : ?>
            <a href="../User pages/signup.php"><i class="fa-solid fa-user-plus" style="color: #ECF39E;"></i> Login | Signup</a>
        <?php endif; ?>
    </nav>
    
    <div class="icons">
        <div id="menu-btn" class="fa-solid fa-bars" style="color: #ECF39E;"></div>
        <div id="cart-btn" class="fa-solid fa-cart-shopping" style="color: #ECF39E;"></div>
        <div id="search-btn" class="fa-solid fa-magnifying-glass" style="color: #ECF39E;"></div>
        <?php if ($userId) : ?>
            <a href="../User pages/update.php"><div id="user-btn" class="fa-solid fa-user-large" style="color: #ECF39E;"></div></a>
        <?php endif; ?>
    </div>
    

    <form class="search-form">
        <input type="search" name="search" id="search-box" placeholder="search here...">
        <label for="search-box" class="fa-solid fa-magnifying-glass"></label>
    </form>

    <script>
        const userId = <?php echo json_encode($userId); ?>;
    </script>
    <div class="shopping-cart">
    <?php if ($userId && isset($cartItems)) : ?>
        <?php foreach ($cartItems as $item) : ?>
            <div class="box">
            <i class="fas fa-times" onclick="rmvItem('<?php echo $item['product_name']; ?>' , <?php echo json_encode($userId); ?>)"></i>
                <img src="<?php echo $item['image_url']; ?>" alt="<?php echo $item['product_name']; ?>" />
                <div class="content">
                    <h3><?php echo $item['product_name']; ?></h3>
                    <span class="quantity"><?php echo $item['quantity']; ?></span>
                    <span class="multiply">x</span>
                    <span class="price"> Rs <?php echo $item['total_price']; ?></span>
                </div>
            </div>
        <?php endforeach; ?>
        <div>
            <h3 class="total"> total : <span> Rs <?php 
                $total = array_sum(array_column($cartItems, 'total_price'));
                echo $total; ?></span></h3>
            <a href="../User pages/cart.php" class="checkout-btn">checkout cart</a>
        </div>
    <?php else : ?>
        <p>No items in the cart</p>
    <?php endif; ?>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../JavaScript/cart.js"></script>
    

</header>
