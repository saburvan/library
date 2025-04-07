<?php
    include "php_link.php";

    $id_review = $_POST['id_review'];
    $status = $_POST['status_review'];

    $sql_update = "UPDATE `review` SET `status` = '$status' WHERE `review`.`id_review` = '$id_review'";
    $q_update = mysqli_query($link, $sql_update);

    header("Location: admin.php");
    exit();