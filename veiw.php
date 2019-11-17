<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Address Book: View</title>
</head>
<body>
    View Book <hr> <br>

    <?php
    $book = json_decode(file_get_contents("JSON.txt"));
    ?>

    <table>
	<tbody>
		<tr>
			<th>First Name</th>
            <th>Last Name</th>
            <th>Phone</th>
            <th>E-Mail</th>
        </tr>
		<?php foreach ($book as $entry) : ?>
        <tr>
            <td> <?php echo $entry->first_name; ?> </td>
            <td> <?php echo $entry->last_name; ?> </td>
            <td> <?php echo $entry->phone; ?> </td>
            <td> <?php echo $entry->email; ?> </td>
        </tr>
		<?php endforeach; ?>
	</tbody>
</table>

    <form action = "/addressbook/index.html"><br>
        <input type = "submit" value = "Home">
    </form>
</body>
</html>