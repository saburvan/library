<?php
    include "php_link.php";
    session_start();


    $id_book_collection = $_GET['bookID'];
    $id_user_collection = $_SESSION['id_user'];

    print_r($id_book_collection);
    print_r($id_user_collection);

    $sql_book_collection = "INSERT INTO `user_book` (`id_user`, `id_book`) VALUES ('$id_user_collection', '$id_book_collection');";
    $sql_book_collection = mysqli_query($link, $sql_book_collection);