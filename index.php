<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Php-gallery with Publitio</title>
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        <div class="wrap">
            <h3>Php-gallery with Publitio</h3>

            <form action="/src/submit.php" method="post" enctype="multipart/form-data">
                <label class="upload-button" for="file">
                    <svg version="1.1" width="50" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 286.036 286.036" style="enable-background:new 0 0 286.036 286.036;" xml:space="preserve"><g><path style="fill: white;" d="M231.641,113.009c-3.915-40.789-37.875-72.792-79.684-72.792c-32.351,0-60.053,19.201-72.819,46.752   c-3.844-1.225-7.849-2.056-12.095-2.056c-22.214,0-40.226,18.021-40.226,40.226c0,4.416,0.885,8.591,2.199,12.551   C11.737,147.765,0,166.26,0,187.696c0,32.092,26.013,58.105,58.105,58.105v0.018h160.896v-0.018   c37.044,0,67.035-30.009,67.035-67.044C286.036,146.075,262.615,118.927,231.641,113.009z M176.808,164.472h-15.912v35.864   c0,4.943-3.987,8.957-8.939,8.957h-17.878c-4.934,0-8.939-4.014-8.939-8.957v-35.864h-15.921c-9.708,0-13.668-6.481-8.823-14.383   l33.799-33.316c6.624-6.615,10.816-6.838,17.646,0l33.799,33.316C190.503,158,186.516,164.472,176.808,164.472z"/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
                    Select a file
                </label>

                <input type="file" name="file" id="file" accept="image/*" hidden>
                
                <div class="form-bottom">
                    <input type="text" name="title" placeholder="File title" autocomplete="off">
                    <input class="btn" type="submit" value="Upload">
                </div>
            </form>

            <?php if(isset($_SESSION["success"])): ?>
                <div class="message success"><?php echo $_SESSION["success"]; ?></div>
            <?php endif; ?>
            
            <?php if(isset($_SESSION["error"])): ?>
                <div class="message error"><?php echo $_SESSION["error"]; ?></div>
            <?php endif; ?>
            
        </div>

        <div class="cloud">
            <svg xmlns="http://www.w3.org/2000/svg" width="564.368" height="248.173" viewBox="0 0 564.368 248.173"><path id="Intersection_1" data-name="Intersection 1" d="M-1056.875,809a48.911,48.911,0,0,1-.294-5.363,48.354,48.354,0,0,1,48.361-48.361h31.056a48.366,48.366,0,0,0,48.361-48.363,48.371,48.371,0,0,0-34.263-46.261,48.425,48.425,0,0,0-14.1-2.1h-206.257a48.367,48.367,0,0,1-48.359-48.362,48.362,48.362,0,0,1,48.359-48.362h457.072a48.359,48.359,0,0,1,48.362,48.362,48.365,48.365,0,0,1-48.362,48.362h-26.547a48.355,48.355,0,0,0-48.362,48.362,48.363,48.363,0,0,0,48.362,48.363H-669V809Z" transform="translate(1232.867 -561.327)" fill="#3c4655" stroke="rgba(0,0,0,0)" stroke-miterlimit="10" stroke-width="1"/></svg>
        </div>
    </body>
</html>

<?php session_unset(); ?>
