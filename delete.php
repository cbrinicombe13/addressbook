<?php
    include("entry.php");
?>

<!DOCTYPE html>
<html class = "no-js" lang="en" dir = "ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="foundation-6/css/foundation.css">
    <link rel="stylesheet" href="foundation-6/css/app.css">
    <link rel="stylesheet" href="custom.css">
    <title>Address Book | Delete Entry</title>
</head>
<body>
    
    <div class = "grid-x">
        <div class = "cell small-4"></div>
        <div class = "cell small-4 text-center">
            <h1>Delete Entry</h1><hr>
        </div>
        <div class = "cell small-4"></div>
    </div>

    <?php clearstatcache() ?>
    <?php if(filesize("JSON.txt") > 0) : ?>

        <!-- Search Form -->
        <div class = "grid-x">
            <div class = "cell small-4"></div>
            <div class = "cell small-4 text-center">
                <form action="" method = "post">
                    <input type = "text" name = "first" placeholder = "First Name">
                    <input type = "text" name = "last" placeholder = "Last Name">
                    <br><input type = "submit" class = "button radius">
                </form>
            </div>
            <div class = "cell small-4"></div>
        </div>

        <!-- Get search parameters -->
        <?php
        if(isset($_POST["first"], $_POST["last"])) {
            $first = $_POST["first"];
            $last = $_POST["last"];
        }

        $json = file_get_contents("JSON.txt");
        $json_arr = json_decode($json, true);
        ?>

        <!-- Check for matches in JSON -->
        <?php $match = false; ?>
        <?php foreach($json_arr as $item => $value) : ?>
            <? if ($value["first_name"] == $first && $value["last_name"] == $last) : ?>
                
                <!-- Found match -->
                <?php $match = true; ?>

                <!-- Delete -->
                <?php 
                unset($json_arr[$item]);
                $json_reindex_arr = array_values($json_arr);
                $modified_json = json_encode($json_reindex_arr);
                file_put_contents("JSON.txt", $modified_json);
                ?>

                <!-- Clean up nesting '[]' if the last entry was just removed -->
                <?php if(file_get_contents("JSON.txt") == "[]") {
                    file_put_contents("JSON.txt", "");
                }?>

            <?php endif; ?>
        <?php endforeach; ?>
    <?php else: ?>
        <div class = "grid-x">
            <div class = "cell small-4"></div>
            <div class = "cell small-4 text-center">
                <h5>The book is empty.</h5>
            </div>
            <div class = "cell small-4"></div>
        </div>
    <?php endif; ?>

    <!-- Go Home -->
    <div class="grid-x">
        <div class="cell small-4"></div>
        <div class="cell small-4 text-center">
            <hr>
            <a href="/addressbook/index.html" class = "button radius secondary">Home</a>
        </div>
        <div class="cell small-4"></div>
    </div>
</body>
</html>