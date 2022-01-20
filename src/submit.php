<?php

namespace PhpGallery;

require '../vendor/autoload.php';

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

    try{
        $fp = fopen($file, "r");
        if (!$fp) {
            throw new Exception('File open failed.');
        }

        $publitio = new \Publitio\API('xxx','yyy');
        $publitio->uploadFile($fp, 'file', array(
            'public_id' => $title !== '' ? $title : '',
            'title' => $title !== '' ? $title : '',
            'folder' => 'zzz'
        ));

        $_SESSION['success'] = "File uploaded successfully";
    } catch (Exception $e) {
        $_SESSION['error'] = "Oops, something is not working...";
    } 
} else {
    header("Location: /");
}

header("Location: /");
die();