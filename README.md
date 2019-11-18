# addressbook

A web application for storing information on clients/customers.
Can add, search, view, delete and edit records. Basic functions of app complete. Added Foundation 6. Added custom.css for button radius.
Uses 'JSON.json' as a database file.


entry.php provides a class to group details into objects which can easily be converted to JSON or written out. The constructor takes in all four of first name, last name, phone and email but can be left NULL.

add.php allows you to create a new object of Entry and merge this with the JSON.json file. It handles the case of an empty file by adding the [...] characters for future nesting. Also doesnt allow duplicate entries but will allow duplicate last names in the case that the phone and email are different to allow the user to enter multiplte contact details for one entry e.g work/home contact. This also handles the case that the user may want make two entries related by last name.

search.php allows you to search the JSON file by first and last name. If an entry is found it creates an http request passing the entry and its key in the JSON to the edit.php page if the user wishes. edit.php then uses the entry and key to edit any details of the entry and then replace it in the JSON.

delete.php allows you to delete entries from the JSON by first/last name. Will not delete anything if JSON is empty as no entries will be found. Handles issues with deleting last entry in JSON whereby the nesting acharcters '[]' are left in the file. Will tell the user if the entry they are trying to delete cannot be found.

view.php allows you to view the entrie book in a table format by decoding the JSON.

Founation 6 was used for a more responsive design.

Now looking at AJAX and javascript to access the JSON. 
