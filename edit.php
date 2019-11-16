<?php
    include("entry.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Address Book: Edit Entry</title>
</head>
<body>
    <h1>Edit Entry </h1><hr><br>

    Edit any of the following: <br><br>
    <form action="">
        <input type = "text" name = "current_first" placeholder = "First Name">to
        <input type = "text" name = "new_first" placeholder = "New First Name"><br>

        <input type = "text" name = "current_last" placeholder = "Last Name">to
        <input type = "text" name = "new_last" placeholder = "New Last Name"><br>

        <input type = "text" name = "current_phone" placeholder = "Phone">to
        <input type = "text" name = "new_phone" placeholder = "New Phone"><br>

        <input type = "text" name = "current_email" placeholder = "E-Mail">to
        <input type = "text" name = "new_email" placeholder = "New E-Mail"><br>

        <input type = "submit">
    </form>
    
    <?php

    $current_first = $_POST["current_first"];
    $current_last = $_POST["current_last"];
    $current_phone = $_POST["current_phone"];
    $current_email = $_POST["current_email"];

    $old_entry = new Entry($current_first, $current_last, $current_phone, $current_email);

    $new_first = $_POST["new_first"];
    $new_last = $_POST["new_last"];
    $new_phone = $_POST["new_phone"];
    $new_email = $_POST["new_email"];

    $new_entry = new Entry($new_first, $new_last, $new_phone, $new_email);

    $json_arr = json_decode(file_get_contents("JSON.txt"), true);

    print_r($old_entry);
    print_r("<br><br>");

    foreach($json_arr as $entry) {
        if ($old_entry->first == $entry["first_name"] &&
            $old_entry->last == $entry["last_name"] &&
            $old_entry->phone == $entry["phone"] &&
            $old_entry->email == $entry["email"]) {

                print_r("Found a match");
                print_r("<br><br>");
                print_r($entry);
                print_r("<br><br>");

                if ($new_entry->first != NULL) {
                    $entry["first_name"] = $new_entry->first;
                }
                if ($new_entry->last != NULL) {
                    $entry["last_name"] = $new_entry->last;
                }
                if ($new_entry->phone != NULL) {
                    $entry["phone"] = $new_entry->phone;
                }
                if ($new_entry->email != NULL) {
                    $entry["email"] = $new_entry->email;
                }

                print_r("Edited to: ");
                print_r("<br><br>");
                print_r($entry);
        }
     }

    ?>





    <form action = "/addressbook/index.html"><br>
        <input type = "submit" value = "Home">
    </form>
</body>
</html>