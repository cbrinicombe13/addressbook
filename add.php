<?php
    include("entry.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Address Book: Create Entry</title>
</head>
<body>
    <h1>Create Entry </h1><hr><br>
<!-- Get input: -->
    Fill in details:<br><br>
    <form action="" method = "post">
        <input type = "text" name = "first" placeholder = "First Name"><br>
        <input type = "text" name = "last" placeholder = "Last Name"><br>
        <input type = "text" name = "phone" placeholder = "Phone"><br>
        <input type = "email" name = "email" placeholder = "E-Mail"><br>
        <input type = "submit">
    </form>

    <?php
// Store input in JSON.json:
    $first = $_POST["first"];
    $last = $_POST["last"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];

    if($first != NULL && $last != NULL && $phone != NULL && $email != NULL) {
        
        // Create new json to write as object of 'Entry':
        $new_entry = new Entry($first, $last, $phone, $email);
        $new_json = json_encode($new_entry);

        // If the first object, add '[..]' to prepare for nesting:
        clearstatcache();
        if(filesize("JSON.txt") == 0) {
            file_put_contents("JSON.txt", "[".$new_json."]");
        }
        // Else trim the '..]' and append 'new_json]':
        else {
            // Probably wont scale well ..
            $json = file_get_contents("JSON.txt");
            file_put_contents("JSON.txt", rtrim($json, "]"));
            file_put_contents("JSON.txt", ",\n".$new_json."]", FILE_APPEND);
        }
    }
    ?>
    <form action = "/addressbook/index.html"><br>
        <input type = "submit" value = "Home">
    </form>
</body>
</html>