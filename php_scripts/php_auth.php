<?php
    global $link;
    session_start();
    include "php_link.php";

    function failed_auth($msg){
        $_SESSION['e'] = $msg;
        $_SESSION['modal'] = 'auth';
        header("Location: index.php");
        exit();
    }

    $auth_email = $_POST['auth_email'];
//    $auth_pass = password_hash($_POST['auth_pass'], PASSWORD_DEFAULT);
    $auth_pass = $_POST['auth_pass'];

    $pattern_email = '/\w+@\w+\.\w+/';

    if (!isset($auth_pass) or $auth_pass == '' or !isset($auth_email) or $auth_email == ''){
        failed_auth("Заполните все поля");
    }

    if (!preg_match($pattern_email, $auth_email)){
        failed_auth("Введен некорректный адрес эл. почты");
    }

    $sql_get_user = "SELECT * FROM `user` WHERE `password` = '$auth_pass' AND `email` = '$auth_email'";
    $q_get_user = mysqli_query($link, $sql_get_user);
    $res_get_user = mysqli_fetch_assoc($q_get_user);


    if(mysqli_num_rows($q_get_user) > 0){

        $_SESSION['login'] =  $res_get_user['login'];
        $_SESSION['id_user'] = $res_get_user['id_user'];
        $_SESSION['role'] =  $res_get_user['role'];

        header("Location: profile.php");
        exit();

    } else {
        $_SESSION['e'] = 'Неверный логин или пароль';
        header("Location: index.php");
        exit();
    }
