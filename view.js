// A script to 'GET' the JSON data via AJAX and present in table:

var HTML_container_tbody = document.getElementById("js_get");
var HTML_container_thead = document.getElementById("js_header");
var HTML_container_emptyError = document.getElementById("js_emptyError");

var local_server = "http://localhost:4000";

// Create http request for JSON:
var getRequest = new XMLHttpRequest();
getRequest.open("GET", local_server + "/addressbook/JSON.json");

getRequest.onload = function() {
        
    // Get response on load:
    var data = JSON.parse(getRequest.responseText);

    // Display table or error message:
    if(data.length > 0) {
        makeHTMLTable(data);
    }
    else {
        showEmpty();
    }
}

getRequest.send();

function showEmpty() {
    var HTML_string = "<div class = 'cell small-4'></div>" +
                      "<div class = 'cell small-4 text-center>" +
                            "<h5>The book is empty.</h5>" +
                      "</div>" +
                      "<div class = 'cell small-4'></div>";
    HTML_container_emptyError.insertAdjacentHTML("beforeend", HTML_string);
}

function makeHTMLTable(data) {
    makeHeader();
    for(i = 0; i < data.length; i++) {
    var HTML_string = "<tr style = 'text_align: center'>" 
                        + "<td>" + data[i].first_name + "</td>"
                        + "<td>" + data[i].last_name + "</td>"
                        + "<td>" + data[i].phone + "</td>"
                        + "<td>" + data[i].email + "</td>"
                    + "</tr>";
    HTML_container_tbody.insertAdjacentHTML("beforeend", HTML_string);
    }
}

function makeHeader() {
    var HTML_string = "<td width = 150>First Name</td>" +
                      "<td width = 150>Last Name</td>" +
                      "<td width = 150>Phone</td>" +
                      "<td width = 150>Email</td>";
    HTML_container_thead.insertAdjacentHTML("beforeend", HTML_string);
}
