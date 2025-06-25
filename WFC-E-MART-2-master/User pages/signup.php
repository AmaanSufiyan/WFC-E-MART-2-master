<?php 
require_once '../Includes/config_session.inc.php';
require_once '../Includes/signup_view.inc.php';
require_once '../Includes/login_view.inc.php';
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://kit.fontawesome.com/b262aa5062.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" type="text/css" href="../CSS/login-styles.css">
<title>Sign In & Sign Up</title>
</head>

<body>

    <div class="container">
        <div class="forms-container">
          <div class="signin-signup">
            <form action="../Includes/login.inc.php" method="post" class="sign-in-form" id="sign-in-form">
              <h2 class="title">Sign in</h2>
              <div class="input-field">
                <i class="fas fa-user"></i>
                <input type="text" id="username" name="username" placeholder="Username" />
              </div>
              <div class="input-field">
                <i class="fas fa-lock"></i>
                <input type="password" id="password" name="password" placeholder="Password" />
              </div>
              <input type="submit" id ="login" class="btn solid" value="Login" />
            </form>

            <?php
                check_login_errors();
            ?>

            <form action="../Includes/signup.inc.php" method="post" class="sign-up-form" id="sign-up-form">
                <h2 class="title">Sign up</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" id="username" name="username" placeholder="Username" />
                </div>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="email" id="email" name="email" placeholder="Email" />
                </div>
                <div class="input-field">
                    <i class="fas fa-phone"></i>
                    <input type="tel" id="phone" name="phone" placeholder="Phone Number"  />
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="password" name="password" placeholder="Password" />
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="c_password" name="c_password" placeholder="Confirm Password" />
                </div>
                <input type="submit" id="signup" class="btn" value="Sign up"/>
            </form>

            <?php
                check_signup_errors();
            ?>
            
          </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>New here?</h3>
                    <span class="signup-text">Join our community and explore exciting opportunities!</span>
                    <button class="btn transparent" id="sign-up-btn">Sign up</button>
                </div>

                <img src="../Images/SVG/undraw-sign-up.svg" class="image" alt="">
            </div>

            <div class="panel right-panel">
                <div class="content">
                    <h3>One of us?</h3>
                    <span class="signup-text">Already a member? Sign in and connect with us!</span>
                    <button class="btn transparent" id="sign-in-btn">Sign in</button>
                </div>

                <img src="../Images/SVG/undraw-sign-in.svg" class="image" alt="">
            </div>
        </div>
    </div>

    <script src="../JavaScript/login-page.js"></script>
    
	
</body>
</html>