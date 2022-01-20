<?php 

namespace PhpGallery;

require 'vendor/autoload.php';
require_once('src/class.variables.php');

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * Variables::$PER_PAGE;

$publitio = new \Publitio\API(Variables::$API_KEY, Variables::$API_SECRET);
$images = $publitio->call('/files/list', 'GET', [
    'offset' => $offset, 
    'limit' => Variables::$PER_PAGE, 
    'folder' => Variables::$FOLDER, 
    'order' => 'date:desc',
    'filter_type' => 'image'
]);

$pages = ceil($images->files_total / Variables::$PER_PAGE) ?? 1;
?>

<div class="gallery">
    <?php foreach($images->files as $image): ?>

        <div class="gallery-image">
            <span><?php echo $image->title; ?></span>
            <img src="<?php echo $image->url_preview; ?>" alt="">
        </div>

    <?php endforeach; ?>

    <div class="pagination">

        <?php if($page != 1): ?>
            <a href="?page=<?php echo $page-1; ?>" class="back"></a>
        <?php endif; ?>

        <?php if($page != $pages): ?>
            <a href="?page=<?php echo $page+1; ?>" class="forward"></a>
        <?php endif; ?>

    </div>
</div>