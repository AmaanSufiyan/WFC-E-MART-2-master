<?php

declare(strict_types=1);

function is_input_empty(string $username, string $email, int $phone, string $password){
    if(empty($username) || empty($email) || empty($phone) || empty($password)){
        return true;
    }else{
        return false;
    }
}

function is_email_invalid(string $email){
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        return true;
    }else{
        return false;
    }
}

function is_username_taken(object $pdo, string $username){
    if(get_username($pdo,$username)){
        return true;
    }else{
        return false;
    }
}

function is_email_registered(object $pdo, string $email){
    if(get_email($pdo,$email)){
        return true;
    }else{
        return false;
    }
}

function is_phone_registered(object $pdo,int $phone){
    $phone = strval($phone);
    if(get_phone($pdo, $phone)){
        return true ;
    }else{
        return false ;
    }
}

function is_password_matching(string $password, string $c_password){
    if($password !== $c_password){
        return true;
    }else{
        return false;
    }
}

function create_user(object $pdo, string $username, string $email, int $phone, string $password){
    set_user( $pdo, $username, $email, $phone, $password);
}

?>