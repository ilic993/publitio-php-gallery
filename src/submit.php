<?php

namespace PhpGallery;

require '../vendor/autoload.php';
require_once('class.variables.php');

session_start();

// If form is submitted
if($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Grab submitted values
    $file = $_FILES['file']['tmp_name'];
    $title = $_POST['title'];

    // Check if submitted title is too long
    if(strlen($title) > 255){

        // If it is set error message and redirect to index page
        $_SESSION['error'] = "Please input a shorter title";
        header("Location: /");
    }

    // Check if file is an image
    $is_image = getimagesize($file) ? true : false;
    if(!$is_image){

        // If it is not set error message and redirect to index page
        $_SESSION['error'] = "Please select an image";
        header("Location: /");
    }

    try{

        // Open the selected file
        $fp = fopen($file, "r");

        // Check if file can be opened
        if (!$fp) {
            throw new Exception('File open failed.');
        }

        // Create Publitio instance with key and secret
        $publitio = new \Publitio\API(Variables::$API_KEY, Variables::$API_SECRET);

        // Upload a file with the title if set and to specified folder
        $publitio->uploadFile($fp, 'file', [
            'public_id' => $title !== '' ? $title : null,
            'title' => $title !== '' ? $title : null,
            'folder' => Variables::$FOLDER
        ]);

        // Everything is good, set success message
        $_SESSION['success'] = "File uploaded successfully";
    } catch (Exception $e) {

        // If anything fails set error message
        $_SESSION['error'] = "Oops, something is not working...";
    } 
}

// Redirect back to index page
header("Location: /");
die();
