<?php
    include("entry.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Address Book: Search/Edit Entry</title>
</head>
<body>
    <h1>Search/Edit Entry </h1><hr><br>
<!-- Search Form -->
    <div>
        Search below first: <br><br>
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
    <?php foreach($json_arr as $item) : ?>
        <? if ($item["first_name"] == $first && $item["last_name"] == $last) : ?>
        <!-- If match show details -->
            <hr><br>Found this:<br><br>
            <table>
                <tbody>
                    <tr>
                        First Name: <?php echo $item["first_name"]; ?><br>
                        Last Name: <?php echo $item["last_name"]; ?><br>
                        Phone: <?php echo $item["phone"]; ?><br>
                        E-Mail: <?php echo $item["email"]; ?><br>
                    </tr>
                </tbody>
            </table><hr><br>
            Make changes below: <br><br>
            <form action="">
                <input type="text" name = "new_first" placeholder = "New First Name"><br>
                <input type="text" name = "new_last" placeholder = "New Last Name"><br>
                <input type="text" name = "new_phone" placeholder = "New Phone"><br>
                <input type="email" name = "new_email" placeholder = "New E-Mail"><br><br>
                <input type="submit" value = "Submit Changes"><br><br>
            </form>
            <?php  
                if(isset($_POST["new_first"])) {
                    $new_first = $_POST["new_first"];
                    echo $new_first;
                }
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