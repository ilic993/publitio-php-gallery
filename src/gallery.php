<?php 

namespace PhpGallery;

require 'vendor/autoload.php';
require_once('src/class.variables.php');

$publitio = new \Publitio\API(Variables::$API_KEY, Variables::$API_SECRET);
$images = $publitio->call('/files/list', 'GET', [
    'limit' => Variables::$PER_PAGE, 
    'folder' => Variables::$FOLDER, 
    'order' => 'date:desc',
    'filter_type' => 'image'
]);
?>

<div class="gallery">
    <?php foreach($images->files as $image): ?>

        <div class="gallery-image">
            <span><?php echo $image->title; ?></span>
            <img src="<?php echo $image->url_preview; ?>" alt="">
        </div>

    <?php endforeach; ?>
</div>