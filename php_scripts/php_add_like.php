<?php

    include "php_link.php";
    session_start();

    $add_like_book_id = $_GET['bookID'];
    $add_like_user_id = $_SESSION['id_user'];

    $sql_add_like = "INSERT INTO `like_book` (`id_user`, `id_book`) VALUES ('$add_like_user_id', '$add_like_book_id');";
    $q_add_like = mysqli_query($link, $sql_add_like);