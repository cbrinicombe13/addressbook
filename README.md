# addressbook

A web application for storing information on clients/customers.
Can add, search, view, delete and edit records. Basic functions of app complete.



entry.php provides a class to group details into objects which can easily be converted to JSON or written out. The constructor takes in all four of first, last, phone and email but can be left NULL.

add.php allows you to create a new object of Entry and merge this with the JSON.txt file. It handles the case of an empty file
by adding the [...] characters for nesting.

search.php allows you to search the JSON file by first/last name. If an entry is found it provides a way of passing the
enrty and its key in the JSON to the edit.php page.

edit.php uses the entry and key from search.php to edit any details of the entry and then replace it in the JSON.

delete.php allows you to delete entries from the JSON by first/last name. Will not delete anything if JSON is empty as no entries will be found.

view.php allows you to view the entrie book in a table format by decoding the JSON into array of objects and then accessing the objects state varibales.




TODO:
Front-end etc..
