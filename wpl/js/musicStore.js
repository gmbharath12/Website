
function downloadFile(fileName){

	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	} else { // code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.open("GET","https://localhost/wpl/downloads/"+fileName,true);
	xmlhttp.send();
}

function productAvailability(productName){

	if (productName=="") {
		alert("Please enter product name");
	}else{
		if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		} else { // code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				document.getElementById(productName).innerHTML=xmlhttp.responseText;
			}
		}
		xmlhttp.open("GET","getProductAvailability.php?product="+productName,true);
		xmlhttp.send();
	}
}

function subscribe(){
	str = document.getElementById("sEmail").value;
	if (str=="") {
		alert("Please enter email");
	}else{
		if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		} else { // code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				document.getElementById("subscriptionMsg").innerHTML=xmlhttp.responseText;
			}
		}
		xmlhttp.open("GET","subscribe.php?email="+str,true);
		xmlhttp.send();
	}
}

function addToCart(instrument, price, id){
	quantity = document.getElementById(id).value;
	if (quantity=="") {
		alert("Please enter the quantity");
	}else{
		if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		} else { // code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		message = xmlhttp.responseText
		xmlhttp.open("GET","addToCart.php?quantity="+quantity+"&instrument="+instrument+"&price="+price,true);
		xmlhttp.send();
		alert("Added to cart");
	}
}

function loadCart(){
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	} else { // code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			document.getElementById("cart").innerHTML=xmlhttp.responseText;
		}
	}
	
	xmlhttp.open("GET","loadCart.php",true);
	xmlhttp.send();
	
}

function deleteItem(row){
	index =row.parentNode.parentNode.rowIndex;
	table = document.getElementById("cartTable");
	instrument = table.rows[index].cells[0].firstChild.nodeValue;
	
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	} else { // code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	status = xmlhttp.responseText;
	xmlhttp.open("GET","deleteItem.php?instrument="+instrument,true);
	xmlhttp.send();
	alert("Item deleted from the cart");
	location.reload();
}

function updateItem(row){
	index =row.parentNode.parentNode.rowIndex;
	table = document.getElementById("cartTable");
	instrument = table.rows[index].cells[0].firstChild.nodeValue;
	quantity = document.getElementById(instrument).value;
	price = table.rows[index].cells[1].firstChild.nodeValue;
	
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	} else { // code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}

	status = xmlhttp.responseText;
	xmlhttp.open("GET","updateItem.php?instrument="+instrument+"&quantity="+quantity+"&price="+price,true);
	xmlhttp.send();
	alert("Item updated to the cart");
	location.reload();
}

function checkOut(){
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	} else { // code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}

	xmlhttp.open("GET","checkOut.php",true);
	xmlhttp.send();
	alert("you have successfully placed your order");
	location.reload();
}