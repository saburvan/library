<?php
    session_start();

    $_SESSION['email'] = '';
    $_SESSION['login'] = '';
    $_SESSION['id_user'] = '';
    $_SESSION['role'] = '';

    session_destroy();

    header("Location: index.php");
    exit();


?>