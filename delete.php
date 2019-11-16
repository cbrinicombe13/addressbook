<?php
    include("Entry.php");
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
    <h1>Delete Entry</h1> <hr> <br>

    Delete entry by: <br>
    <form action="" method = "post">
        <input type="text" name = "last" placeholder = "Last Name"><br>
        <input type="text" name = "phone" placeholder = "Phone"><br>
        <input type="email" name = "email" placeholder = "E-Mail"><br>
        <input type="submit">
    </form>

    <?php

    $last = $_POST["last"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];

    $data = file_get_contents("JSON.txt");
    $data_arr = json_decode($data, true);

    $to_delete = new Entry(NULL, $last, $phone, $email);

    $index = 0;
    foreach($data_arr as $entry) {
        print_r($entry);
        if($entry["last_name"] == $to_delete->last_name) {
            unset($data_arr, $entry);
            array_values($data_arr);
        }
    }
    print_r("<br><br>");
    foreach($data_arr as $entry) {
        print_r($entry);
    }


    ?>

    <form action = "/addressbook/index.html"><br>
        <input type = "submit" value = "Home">
    </form>
</body>
</html>