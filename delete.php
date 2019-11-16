<?php
    include("entry.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Address Book: Delete Entry</title>
</head>
<body>
    <h1>Delete Entry</h1><hr><br>
<!-- Search Form -->
    <div>
        Delete by name: <br><br>
        <form action="" method = "post">
            <input type = "text" name = "first" placeholder = "First Name"><br>
            <input type = "text" name = "last" placeholder = "Last Name"><br>
            <br><input type = "submit"><br>
        </form><br>
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
    <?php foreach($json_arr as $item => $value) : ?>
        <? if ($value["first_name"] == $first && $value["last_name"] == $last) : ?>

        <!-- If match show details -->
            <hr><br>Deleting this:<br><br>
            First Name: <?php echo $value["first_name"]; ?><br>
            Last Name: <?php echo $value["last_name"]; ?><br>
            Phone: <?php echo $value["phone"]; ?><br>
            E-Mail: <?php echo $value["email"]; ?><br>

        <!-- Delete -->
            <!-- Get array form of JSON=$json_arr-->
            <!-- Get index of array to remove $item -->
            <!-- Remove item from JSON -->
            <!-- Re-encode JSON -->
            <!-- Rewrite JSON to file-->

            <?php 
            unset($json_arr[$item]);
            $json_reindex_arr = array_values($json_arr);
            $modified_json = json_encode($json_reindex_arr);
            file_put_contents("JSON.txt", $modified_json);

            ?>

        <?php endif; ?>
    <?php endforeach; ?>
<!-- Go Home -->
    <hr>
    <form action = "/addressbook/index.html"><br>
        <input type = "submit" value = "Home">
    </form>
</body>
</html>