<?php
    include("entry.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Address Book: Search</title>
</head>
<body>
    <h1>Search Book</h1><hr><br>

<!-- Search Form -->
    <div>
        Search by name: <br><br>
        <form action="" method = "post">
            <input type = "text" name = "first" placeholder = "First Name"><br>
            <input type = "text" name = "last" placeholder = "Last Name"><br>
            <br><input type = "submit"><br>
        </form><br>
    </div>

<!-- Post search parameters -->
    <?php
    if(isset($_POST["first"], $_POST["last"])) {
        $first = $_POST["first"];
        $last = $_POST["last"];
    }

// Convert JSON to attributed-array
    $json = file_get_contents("JSON.txt");
    $json_arr = json_decode($json, true);
    ?>

<!-- Check for matches in attributed-array -->
    <?php foreach($json_arr as $key => $item) : ?>
        <? if ($item["first_name"] == $first && $item["last_name"] == $last) : ?>
        <!-- If match show details -->
            <hr><br>Found this:<br><br>

            First Name: <?php echo $item["first_name"]; ?><br>
            Last Name: <?php echo $item["last_name"]; ?><br>
            Phone: <?php echo $item["phone"]; ?><br>
            E-Mail: <?php echo $item["email"]; ?><br>

            <!-- Send 'item' and 'key' to edit.php -->
            <?php
            $http_query_item = http_build_query(array("current_item" => $item));
            $http_query_key = http_build_query(array("current_key" => $key));
            $url_item = urlencode($http_query_item);
            $url_key = urlencode($http_query_key);
            echo "<a href = \"/addressbook/edit.php?current_item=".$url_item."&current_key=".$url_key."\"> Edit";
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