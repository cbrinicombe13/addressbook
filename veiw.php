<!DOCTYPE html>
<html class = "no-js" lang="en" dir = "ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="foundation.css">
    <link rel="stylesheet" href="app.css">
    <link rel="stylesheet" href="custom.css">
    <title>Address Book | View</title>
</head>
<body>
    <div class = "grid-x">
        <div class = "cell small-4"></div>
        <div class = "cell small-4 text-center">
            <h1>View Book</h1><hr>
        </div>
        <div class = "cell small-4"></div>
    </div>

    <?php clearstatcache(); ?>
    <?php if(filesize("JSON.json") > 0) : ?>

        <!-- Show in table (AJAX) -->
        <div class = "grid-x">
            <div class = "cell small-2"></div>
            <div class = "cell small-8 text-center">
                <table>
                    <tr style = "text_align: center", id = "js_header"></tr>
                    <tbody id = "js_get"></tbody>
                </table>
            </div>  
            <div class = "cell small-2"></div>
        </div>

        <div class = "grid-x" id = "js_emptyError"></div>

    <!-- Or show empty -->
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

    <script src = "view.js"></script>
    <script src="jquery.js"></script>
    <script src="what-input.js"></script>
    <script src="foundation.js"></script>
    <script src="app.js"></script>
</body>
</html>