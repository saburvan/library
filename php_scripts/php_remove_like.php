<?php
    include "php_link.php";
    session_start();

    $add_remove_book_id = $_GET['bookID'];
    $add_remove_user_id = $_SESSION['id_user'];

    $sql_remove_like = "DELETE FROM `like_book` WHERE `like_book`.`id_user` = '$add_remove_user_id' AND `like_book`.`id_book` = '$add_remove_book_id'";
    $q_remove_like = mysqli_query($link, $sql_remove_like);