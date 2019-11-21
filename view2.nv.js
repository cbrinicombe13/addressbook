var HTML_container_tbody = document.getElementById("js_get");
var HTML_container_thead = document.getElementById("js_header");

// Create http request for JSON:
var getRequest = new XMLHttpRequest();
getRequest.open("GET", "JSON.json");

getRequest.onload = function() {
        
    var json_string = getRequest.responseText;

    // Display table or error message:
    if(json_string != "") {
        var data = JSON.parse(json_string);
        console.log(data);
        makeHTMLTable(data);
    }
}

getRequest.send();

function makeHTMLTable(data) {
    makeHeader();
    for(i = 0; i < data.length; i++) {
    var HTML_string = "<tr style = 'text_align: center'>" 
                        + "<td>" + data[i].first_name + "</td>"
                        + "<td>" + data[i].last_name + "</td>"
                        + "<td>" + data[i].phone + "</td>"
                        + "<td>" + data[i].email + "</td>"
                        + "<td>"
                            + "<div class = 'expanded button-group'>"
                                + "<button class = 'button radius secondary' data-open='edit_modal'>Edit</button>"
                                + "<button class = 'button radius alert'>Delete</button>"
                            + "</div>"
                    + "</tr>";
    HTML_container_tbody.insertAdjacentHTML("beforeend", HTML_string);
    }
}

function makeHeader() {
    var HTML_string = "<td width = 150>First Name</td>" +
                      "<td width = 150>Last Name</td>" +
                      "<td width = 150>Phone</td>" +
                      "<td width = 150>Email</td>" +
                      "<td width = 150>Actions</td>";
    HTML_container_thead.insertAdjacentHTML("beforeend", HTML_string);
}
