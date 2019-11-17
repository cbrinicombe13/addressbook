<!DOCTYPE html>
<html class = "no-js" lang="en" dir = "ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="foundation-6/css/foundation.css">
    <link rel="stylesheet" href="foundation-6/css/app.css">
    <link rel="stylesheet" href="custom.css">
    <title>Address Book | Edit</title>
</head>
<body>

    <div class = "grid-x">
        <div class = "cell small-4"></div>
        <div class = "cell small-4 text-center">
            <h1>Edit</h1><hr>
        </div>
        <div class = "cell small-4"></div>
    </div>

<!--  Get '$item' and '$key' from search.php and make '$json_arr' -->

    <?php
    $json = file_get_contents("JSON.txt");
    $json_arr = json_decode($json, true);

    parse_str($_GET["current_item"]);
    // Can now access 'item' as 'current_item'.

    parse_str($_GET["current_key"]);
    // Can now access 'key' as 'current_key'.

    ?>

<!-- Form for the changes -->

    <div class = "grid-x">
        <div class = "cell small-4"></div>
        <div class = "cell small-4 text-center">
            <form action="" method = "post">
                <input type="text" name = "new_first" placeholder = "New First Name">
                <input type="text" name = "new_last" placeholder = "New Last Name">
                <input type="text" name = "new_phone" placeholder = "New Phone">
                <input type="email" name = "new_email" placeholder = "New E-Mail">
                <input type = "submit" name = "new_submit" class = "button radius">
            </form>
        </div>
        <div class = "cell small-4"></div>
    </div>

<!--  Make changes -->
    <?php
    $new_first = $_POST["new_first"];
    $new_last = $_POST["new_last"];
    $new_phone = $_POST["new_phone"];
    $new_email = $_POST["new_email"];

    if(isset($_POST["new_submit"])) {
        if(!empty($new_first)) {
            $current_item["first_name"] = $new_first; 
        }
        if(!empty($new_last)) {
            $current_item["last_name"] = $new_last; 
        }
        if(!empty($new_phone)) {
            $current_item["phone"] = $new_phone; 
        }
        if(!empty($new_email)) {
            $current_item["email"] = $new_email;
        }

        // Replace in JSON with changes:

        $json_arr[$current_key] = $current_item;

        file_put_contents("JSON.txt",json_encode($json_arr));
        
    }

    ?>

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
