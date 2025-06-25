<?php

include '../Includes/dbh.inc.php';
require_once '../Includes/config_session.inc.php';

if(isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
}

$select_user = $pdo->prepare("SELECT * FROM `user` WHERE id = ? LIMIT 1");
$select_user->execute([$userId]);
$fetch_user = $select_user->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);

    if(!empty($name)){
        $update_name = $pdo->prepare("UPDATE `user` SET name = ? WHERE id = ?");
        $update_name->execute([$name, $userId]);
        $success_msg[] = 'Username updated!';
    }

    if(!empty($email)){
        $verify_email = $pdo->prepare("SELECT * FROM `user` WHERE email = ?");
        $verify_email->execute([$email]);
        if($verify_email->rowCount() > 0){
            $warning_msg[] = 'Email already taken!';
        }else{
            $update_email = $pdo->prepare("UPDATE `user` SET email = ? WHERE id = ?");
            $update_email->execute([$email, $userId]);
            $success_msg[] = 'Email updated!';
        }
    }

    $prev_pass = $fetch_user['password'];

    $old_pass = password_hash($_POST['old_pass'], PASSWORD_DEFAULT);
    $old_pass = filter_var($old_pass, FILTER_SANITIZE_STRING);

    $empty_old = password_verify('', $old_pass);

    $new_pass = password_hash($_POST['new_pass'], PASSWORD_DEFAULT);
    $new_pass = filter_var($new_pass, FILTER_SANITIZE_STRING);

    $empty_new = password_verify('', $new_pass);

    $c_pass = password_verify($_POST['c_pass'], $new_pass);
    $c_pass = filter_var($c_pass, FILTER_SANITIZE_STRING);

    if($empty_old != 1){
        $verify_old_pass = password_verify($_POST['old_pass'], $prev_pass);
        if($verify_old_pass == 1){
            if($c_pass == 1){
                if($empty_new != 1){
                    $update_pass = $pdo->prepare("UPDATE `user` SET password = ? WHERE id = ?");
                    $update_pass->execute([$new_pass, $user_id]);
                    $success_msg[] = 'Password updated!';
                }else{
                    $warning_msg[] = 'Please enter new password!';
                }
            }else{
                $warning_msg[] = 'Confirm password not matched!';
            }
        }else{
            $warning_msg[] = 'Old password not matched!';
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>update profile</title>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
   <link rel="stylesheet" href="../CSS/update.css">

</head>
<body>
   
<!-- header section starts  -->
<?php include '../Includes/header.php'; ?>
<!-- header section ends -->

<!-- update section starts  -->

<section class="account-form">

   <form action="" method="post">
      <h3>update your profile!</h3>
      <p class="placeholder">your name</p>
      <input type="text" name="name" maxlength="50" placeholder="<?= $fetch_user['username']; ?>" class="box">
      <p class="placeholder">your email</p>
      <input type="email" name="email" maxlength="50" placeholder="<?= $fetch_user['email']; ?>" class="box">
      <p class="placeholder">old password</p>
      <input type="password" name="old_pass" maxlength="50" placeholder="enter your old password" class="box">
      <p class="placeholder">new password</p>
      <input type="password" name="new_pass" maxlength="50" placeholder="enter your new password" class="box">
      <p class="placeholder">confirm password</p>
      <input type="password" name="c_pass" maxlength="50" placeholder="confirm your new password" class="box">
      <input type="submit" value="update now" name="submit" class="btn">
   </form>

</section>

<?php include '../Includes/footer.php';?>

</body>
</html>
