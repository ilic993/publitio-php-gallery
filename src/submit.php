<?php

namespace PhpGallery;

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $file = $_FILES['file']['tmp_name'];
    $title = $_POST['title'];

    var_dump($file, $title);
} else {
    header("Location: /");
}

die();