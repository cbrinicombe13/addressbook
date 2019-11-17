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
    <title>Address Book | Create Entry</title>
</head>
<body>
    
    <div class="grid-x">
        <div class="cell small-4"></div>
        <div class="cell small-4 text-center">
            <h1>New Entry</h1><hr>
        </div>
        <div class="cell small-4"></div>
    </div>


<!-- Get input: -->
    <div class="grid-x">
        <div class="cell small-4"></div>
        <div class="cell small-4 text-center">
            <form action="" method = "post">
                <input type = "text" name = "first" placeholder = "First Name">
                <input type = "text" name = "last" placeholder = "Last Name">
                <input type = "text" name = "phone" placeholder = "Phone">
                <input type = "email" name = "email" placeholder = "E-Mail">
                <input type = "submit" name = "add_submit" class = "button radius">
            </form>
        </div>
        <div class="cell small-4"></div>
    </div>  

<!-- Store input and add to JSON -->
    <?php
    if(isset($_POST["add_submit"])) {
        $first = $_POST["first"];
        $last = $_POST["last"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
    }
    ?>

    <?php if(isset($first, $last, $phone, $email)) :

        // Create new object:
        $new_entry = new Entry($first, $last, $phone, $email);
        $new_json = json_encode($new_entry);

        // Check if already in database:
        $json_arr = json_decode(file_get_contents("JSON.txt"), true); ?>
        
        <?php foreach($json_arr as $item) :
            if($item["last_name"] == $new_entry->last_name && $item["phone"] == $new_entry->phone
                && $item["email"] == $new_entry->email) : ?>

                <!-- If in database, print error provide home button and exit() -->
                <div class="grid-x">
                    <div class="cell small-4"></div>
                    <div class="cell small-4 text-center">
                        <h5>Entry already exists.</h5>
                    </div>
                    <div class="cell small-4"></div>
                </div>
                <div class="grid-x">
                    <div class="cell small-4"></div>
                    <div class="cell small-4 text-center">
                        <hr>
                        <a href="/addressbook/index.html" class = "button radius secondary">Home</a>
                    </div>
                    <div class="cell small-4"></div>
                </div>
                <?php exit();
                endif;
            endforeach;

        // If the first object, add '[..]' to prepare for nesting:
        clearstatcache();
        if(filesize("JSON.txt") == 0) :
            file_put_contents("JSON.txt", "[".$new_json."]");

        // Else trim the '..]' and append ''new_json']':
        else :
            $json = file_get_contents("JSON.txt");
            file_put_contents("JSON.txt", rtrim($json, "]"));
            file_put_contents("JSON.txt", ",\n".$new_json."]", FILE_APPEND);
        endif;

    endif; ?>

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
