$(document).ready(function(){
	$("#search").click(function(){
		loadDoc();
	});
});

function loadDoc() {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			myFunction(this);
		}
	};
	xhttp.open("GET", "books.xml", true);
	xhttp.send();
}

function myFunction(xml) {
	// alert("myFunction");
	var i;
	var xmlDoc = xml.responseXML;
	var table = "<tr>"+
				"<th>Title</th>"+
				"<th>Author</th>"+
				"<th>Category</th>"+
				"<th>Year</th>"+
				"<th>Price</th>"+
				"</tr>";
	var x = xmlDoc.getElementsByTagName("book");
	for (i = 0; i < x.length; i++) {
		table += "<tr><td>" + 
		x[i].getElementsByTagName("title")[0].childNodes[0].nodeValue + 
		"</td><td>";
		$.each(x[i].getElementsByTagName("author"), function(key, value){
			if(key + 1 - x[i].getElementsByTagName("author").length < 0)
				table += value.childNodes[0].nodeValue + ", "; 
			else
				table += value.childNodes[0].nodeValue + "</td><td>";
		});
		table += x[i].getAttribute("category") +
		"</td><td>" +
		x[i].getElementsByTagName("year")[0].childNodes[0].nodeValue +
		"</td><td>" +
		x[i].getElementsByTagName("price")[0].childNodes[0].nodeValue +
		"</td></tr>";
	}
	document.getElementById("book-table").innerHTML = table;
}