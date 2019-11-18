<!DOCTYPE html>
<html class = "no-js" lang="en" dir = "ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="foundation-6/css/foundation.css">
    <link rel="stylesheet" href="foundation-6/css/app.css">
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

    <!-- Show book in table -->
    <?php clearstatcache(); ?>
    <?php if(filesize("JSON.txt") > 0) : ?>

        <!-- Get book as array of objects -->
        <?php $book = json_decode(file_get_contents("JSON.txt"));?>
        
        <!-- Show in table -->
        <div class = "grid-x">
            <div class = "cell small-2"></div>
            <div class = "cell small-8 text-center">
                <table>
                    <tr style = "text_align: center">
                        <th width = 150>First Name</th>
                        <th width = 150>Last Name</th>
                        <th width = 100>Phone</th>
                        <th width = 400>E-Mail</th>
                    </tr>
                    <tbody>
                        <?php foreach ($book as $entry) : ?>
                        <tr style = "text_align: center">
                            <td> <?php echo $entry->first_name; ?> </td>
                            <td> <?php echo $entry->last_name; ?> </td>
                            <td> <?php echo $entry->phone; ?> </td>
                            <td> <?php echo $entry->email; ?> </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class = "cell small-2"></div>
        </div>
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
</body>
</html>