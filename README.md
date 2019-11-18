# addressbook

A web application for storing information on clients/customers.
Can add, search, view, delete and edit records. Basic functions of app complete. Added Foundation 6. Added custom.css for button radius.
Uses 'JSON.txt' as a database file.


entry.php provides a class to group details into objects which can easily be converted to JSON or written out. The constructor takes in all four of first, last, phone and email but can be left NULL.

add.php allows you to create a new object of Entry and merge this with the JSON.txt file. It handles the case of an empty file
by adding the [...] characters for nesting. Also handles duplicate entries allowing duplicate first and last names seperately.

search.php allows you to search the JSON file by first/last name. If an entry is found it creates an http request passing the
entry and its key in the JSON to the edit.php page.

edit.php uses the entry and key from search.php to edit any details of the entry and then replace it in the JSON.

delete.php allows you to delete entries from the JSON by first/last name. Will not delete anything if JSON is empty as no entries will be found. Handles issues with deleting last entry in JSON whereby the nesting acharcters '[]' are left in the file.

view.php allows you to view the entrie book in a table format by decoding the JSON into array of objects and then accessing the objects state varibales.

Founation 6 was used for a more responsive design
