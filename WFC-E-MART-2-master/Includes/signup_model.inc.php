<?php

declare(strict_types=1);

function get_username(object $pdo, string $username)
{
    $query = "SELECT username from user where username =:username;";
    $stmt = $pdo->prepare($query);
    $stmt -> bindParam(":username" , $username);
    $stmt -> execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_email(object $pdo, string $email)
{
    $query = "SELECT email from user where email =:email;";
    $stmt = $pdo->prepare($query);
    $stmt -> bindParam(":email" , $email);
    $stmt -> execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_phone(object $pdo, string $phone)
{
    $query = "SELECT phone from user where phone =:phone;";
    $stmt = $pdo->prepare($query);
    $stmt -> bindParam(":phone" , $phone);
    $stmt -> execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function set_user(object $pdo, string $username, string $email, int $phone, string $password)
{
    $query = "INSERT INTO user (username, email, phone, password) VALUES (:username, :email, :phone, :password);";
    $stmt = $pdo->prepare($query);

    $options = [
        'cost' => 12 // Cost slows down the brute forcing process
    ];
    // Hashing done by using PASSWORD_BCRYPT algorithm
    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

    // Your database operations
    $stmt -> bindParam(":username" , $username);
    $stmt -> bindParam(":email" , $email);
    $stmt -> bindValue(":phone" , $phone, PDO::PARAM_INT);
    $stmt -> bindParam(":password" , $hashedPwd);
    $stmt -> execute();
    
}