<?php
require_once '../Includes/dbh.inc.php';
require_once '../Includes/config_session.inc.php';

if (!isset($_SESSION["alert_shown"]) && isset($_SESSION["user_id"])) {
    // Escape the username for JavaScript
    $username = addslashes($_SESSION["user_username"]);
    $_SESSION["alert_shown"] = true; // Move this line here to ensure the session variable is set

    // Echo the SweetAlert JavaScript code directly in the HTML body
    echo "<script>";
    echo "document.addEventListener('DOMContentLoaded', function () {";
    echo "swal({
            title: 'Welcome, $username',
            icon: 'success',
            button: 'OK',
          });";
    echo "});";
    echo "</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width , initial-scale=1.0">
        <title>WFC E-Mart Online</title>
        <script src="https://kit.fontawesome.com/b262aa5062.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
        <link rel="stylesheet"  type="text/css" href="../CSS/home.css"/>
    </head>
    <body>

        <?php include '../Includes/header.php'; ?>

        <div class="heading">
            <h1>our shop</h1>
            <p><a href="../User pages/home.php">home >></a> shop</p>
        </div>

        <section class="category">
            
            <h1 class="title">our <span> category </span> <a href="../User pages/all-products.php"> view all >></a></h1>

            <div class="box-container">

                <a href="../Categories/bakery.php" class="box">
                    <img src="../Images/SVG/Baker-rafiki.svg" alt="">
                    <h3>bakery</h3>
                </a>
                <a href="../Categories/beverages.php" class="box">
                    <img src="../Images/SVG/cherry drink-amico.svg" alt="">
                    <h3>beverages</h3>
                </a>
                <a href="../Categories/grocery.php" class="box">
                    <img src="../Images/SVG/Grocery shopping-pana.svg" alt="">
                    <h3>grocery</h3>
                </a>
                <a href="../Categories/fresh.php" class="box">
                    <img src="../Images/SVG/Eco shopping-pana.svg" alt="">
                    <h3>fresh</h3>
                </a>
                <a href="../Categories/frozen.php" class="box">
                    <img src="../Images/SVG/Frozen food-amico.svg" alt="">
                    <h3>frozen</h3>
                </a>

            </div>
            
        </section>

        <sections class="products">

            <h1 class="title">new <span> arrival </span> <a href="#"> view all >></a></h1>

            <div class="box-container">

                <div class="box">

                    <div class="icons">
                        <a href="../User pages/cart.php" class="fas fa-shopping-cart"></a>
                        <a href="../User pages/wishlist.php" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-eye"></a>
                    </div>
                    <div class="image">
                        <img src="../Images/Sample/pic-3.webp" alt="" >
                    </div>
                    <div class="content">
                        <h3>Revello Specialty Dessert Brownie 200G</h3>
                        <div class="price">Rs 700.00</div>
                    </div>
                </div>

                <div class="box">
                    
                    <div class="icons">
                        <a href="../User pages/cart.php" class="fas fa-shopping-cart"></a>
                        <a href="../User pages/wishlist.php" class="fas fa-heart"></a>
                        <a href="../User pages/product.php" class="fas fa-eye"></a>
                    </div>
                    <div class="image">
                        <img src="../Images/Sample/pic-4.webp" alt="" >
                    </div>
                    <div class="content">
                        <h3>Sozo Cosmo Mixer Can 250Ml</h3>
                        <div class="price">Rs 520.00</div>
                    </div>
                </div>

                <div class="box">
                    
                    <div class="icons">
                        <a href="../User pages/cart.php" class="fas fa-shopping-cart"></a>
                        <a href="../User pages/wishlist.php" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-eye"></a>
                    </div>
                    <div class="image">
                        <img src="../Images/Sample/pic-5.jpeg" alt="" >
                    </div>
                    <div class="content">
                        <h3>La Treats Hazelnut & Raisin Cookies 105G</h3>
                        <div class="price">Rs 890.00</div>
                    </div>
                </div>

                <div class="box">
                    
                    <div class="icons">
                        <a href="../User pages/cart.php" class="fas fa-shopping-cart"></a>
                        <a href="../User pages/wishlist.php" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-eye"></a>
                    </div>
                    <div class="image">
                        <img src="../Images/Sample/pic-6.webp" alt="" >
                    </div>
                    <div class="content">
                        <h3>Diamond Fruit & Nut Muesli 350G</h3>
                        <div class="price">Rs 1,250.00</div>
                    </div>
                </div>

                <div class="box">
                    
                    <div class="icons">
                        <a href="../User pages/cart.php" class="fas fa-shopping-cart"></a>
                        <a href="../User pages/wishlist.php" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-eye"></a>
                    </div>
                    <div class="image">
                        <img src="../Images/Sample/pic-7.webp" alt="" >
                    </div>
                    <div class="content">
                        <h3>Kewpie Mayonnaise Japanese Style 310Ml</h3>
                        <div class="price">Rs 1,990.00</div>
                    </div>
                </div>

            </div>
             
        </section>

        <div class="space" style="height: 5vh;"></div>

        <Section class="home">

            <div class="slides-container">

                <div class="slide active">
                    <div class="content">
                        <span>Fresh is our Passion</span>
                        <a href="#" class="btn">explore freshness</a>
                    </div>
                    <div class="image">
                        <img src="../Images/Slider/slider-1.jpg" alt=""/>
                    </div>
                </div>    

                <div class="slide">
                    <div class="content">
                        <span>Fresh is our Passion</span>
                        <a href="#" class="btn">explore freshness</a>
                    </div>
                    <div class="image">
                        <img src="../Images/Slider/slider-2.jpg" alt=""/>
                    </div>
                </div>

                <div class="slide">
                    <div class="content">
                        <span>Save the hassle!</span>
                        <a href="#" class="btn">shop now</a>
                    </div>
                    <div class="image">
                        <img src="../Images/Slider/slider-3.jpg" alt=""/>
                    </div>
                </div>

                <div id="next-slide" class="fas fa-angle-right" onclick="next()"></div>
                <div id="prev-slide" class="fas fa-angle-left" onclick="prev()"></div>
            </div>
        </Section>

        <section class="banner-container">

            <div class="banner">
                <img src="../Images/Banner/banner-1.jpg" alt="">
                <div class="content">
                    <span>Chips</span>
                    <a href="#"></a>
                </div>
            </div>
            <div class="banner">
                <img src="../Images/Banner/banner-2.jpg" alt="">
                <div class="content">
                    <span>Biscuits</span>
                    <a href="#"></a>
                </div>
            </div>
            <div class="banner">
                <img src="../Images/Banner/banner-3.jpg" alt="">
                <div class="content">
                    <span>Ice cream</span>
                    <a href="#"></a>
                </div>
            </div>

        </section>

        <div style="height: 5vh;"></div>


        <?php include '../Includes/footer.php'; ?>

        <script src="../JavaScript/nav-menu.js"></script>

    </body>
</html>