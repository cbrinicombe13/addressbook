<?php
    include("entry.php");
?>

<!DOCTYPE html>
<html class = "no-js" lang="en" dir = "ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="foundation.css">
    <link rel="stylesheet" href="app.css">
    <link rel="stylesheet" href="custom.css">
    <title>Address Book | Search/Edit</title>
</head>
<body>
    <div class = "grid-x">
        <div class = "cell small-4"></div>
        <div class = "cell small-4 text-center">
            <h1>Search</h1><hr>
        </div>
        <div class = "cell small-4"></div>
    </div>

    <?php clearstatcache(); ?>
    <?php if(filesize("JSON.json") > 0) : ?>

        <!-- Search Form -->
        <div class = "grid-x">
            <div class = "cell small-4"></div>
            <div class = "cell small-4 text-center">
                <form action="" method = "post">
                    <input type = "text" name = "first" placeholder = "First Name">
                    <input type = "text" name = "last" placeholder = "Last Name">
                    <input type = "submit" name = "search_submit" class = "button radius">
                </form>
            </div>
            <div class = "cell small-4"></div>
        </div>
        
        <!-- Post search parameters -->
        <?php if(isset($_POST["first"], $_POST["last"])) {
            $first = $_POST["first"];
            $last = $_POST["last"];
        }

        // Convert JSON to associative-array
        $json = file_get_contents("JSON.json");
        $json_arr = json_decode($json, true);
        ?>

        <!-- Check for matches in attributed-array -->
        <?php foreach($json_arr as $key => $item) : ?>
            <?php $match = $item["first_name"] == $first && $item["last_name"] == $last; ?>
            <? if ($match) : ?>

            <!-- Show details -->
                <div class = "grid-x">
                    <div class = "cell small-2"></div>
                    <div class = "cell small-8 text-center">
                        <h5>Found this:</h5>
                        <table>
                            <tr style = "text_align: center">
                                <th width = 150>First Name</th>
                                <th width = 150>Last Name</th>
                                <th width = 100>Phone</th>
                                <th width = 400>E-Mail</th>
                            </tr>
                            <tbody>
                                <tr style = "text_align : center">
                                    <td> <?php echo $item["first_name"]; ?> </td>
                                    <td> <?php echo $item["last_name"]; ?> </td>
                                    <td> <?php echo $item["phone"]; ?> </td>
                                    <td> <?php echo $item["email"]; ?> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class = "cell small-2"></div>
                </div>

            <!-- Send 'item' and 'key' to edit.php -->
                <?php
                $http_query_item = http_build_query(array("current_item" => $item));
                $http_query_key = http_build_query(array("current_key" => $key));
                $url_item = urlencode($http_query_item);
                $url_key = urlencode($http_query_key);
                ?>
                <div class = "grid-x">
                    <div class = "cell small-4"></div>
                    <div class = "cell small-4 text-center">
                        <?php echo "<a class = 'button radius' href = \"/addressbook/edit.php?current_item=".$url_item."&current_key=".$url_key."\"> Edit</a>"; ?>
                    </div>
                    <div class = "cell small-4"></div>
                </div>
                
            <!-- Otherwise, show error message -->
            <?php elseif( $_POST["search_submit"] && !$match && ($key == count($json_arr) -1) ) : ?>
                <div class = "grid-x">
                    <div class = "cell small-4"></div>
                    <div class = "cell small-4 text-center">
                        <h5>No such entry exists.</h5>
                    </div>
                    <div class = "cell small-4"></div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php else : ?>
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