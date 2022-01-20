<?php

namespace PhpGallery;

session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $file = $_FILES['file']['tmp_name'];
    $title = $_POST['title'];

    if(strlen($title) > 255){
        $_SESSION['error'] = "Please input a shorter title";
        header("Location: /");
    }

    $is_image = getimagesize($file) ? true : false;
    if(!$is_image){
        $_SESSION['error'] = "Please select an image";
        header("Location: /");
    }

    $_SESSION['success'] = "File uploaded successfully";

} else {
    header("Location: /");
}

header("Location: /");
die();