<?php

$cookie = $_COOKIE['musicstorecookie'];
//Set our user and authID variables
$user_name = $cookie['user'];
$authID = $cookie['authID'];
$conn = mysqli_connect("localhost","root","","musicstore");
//check conection
if(!$conn){
	die("Connection failed due to: " .mysqli_connect_error());
}

// load cart
$sql = "select user_name, instrument, quantity, price from cart where user_name = '".$user_name."' and order_status is null";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

if($row){
	$total = 0;
	echo "<table id='cartTable' border = 1>
			<tr>
				<td>Instrument</td>
				<td>Price</td>
				<td>Quantity</td>
				<td>Sub Total</td>
			</tr>";
			
	echo "<tr><td>".$row['instrument']."</td>";
		  echo "<td>".$row['price']."</td>";
		  echo "<td>".$row['quantity']."</td>";
		  $subTotal = (floatval($row['quantity']) * floatval($row['price']));
		  $total = $total + $subTotal;
		  echo "<td>".$subTotal."</td>";
		  echo "<td><input type='number' id='".$row['instrument']."' style='width:50px' min='1' max='5'></td>";
		  echo "<td><button id = 'deleteItem' type = 'button' onclick = 'updateItem(this)'> Update </button></td>";
		  echo "<td><button id = 'deleteItem' type = 'button' onclick = 'deleteItem(this)'> Delete </button></td></tr>";
		  
	while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
		  echo "<tr><td>".$row['instrument']."</td>";
		  echo "<td>".$row['price']."</td>";
		  echo "<td>".$row['quantity']."</td>";
		  $subTotal = (floatval($row['quantity']) * floatval($row['price']));
		  $total = $total + $subTotal;
		  echo "<td>".$subTotal."</td>";
		  echo "<td><input type='number' id='".$row['instrument']."' style='width:50px' min='1' max='5'></td>";
		  echo "<td><button id = 'deleteItem' type = 'button' onclick = 'updateItem(this)'> Update </button></td>";
		  echo "<td><button id = 'deleteItem' type = 'button' onclick = 'deleteItem(this)'> Delete </button></td></tr>";
	  }
	echo "</table>";
	echo "<br><br>Total: ".$total;
	echo "<br><br><button onclick='checkOut()'>Check Out</button>";
} else{
	echo "<br>Your cart is empty";
}

// load order history
echo "<br><br><br>";
echo "<h2>Order History</h2>";
$sql1 = "select user_name, instrument, quantity, price from cart where user_name = '".$user_name."' and order_status is not null";
$result1 = mysqli_query($conn,$sql1);
$row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);

if($row1){
	echo "<table id='orderTable' border = 1>
			<tr>
				<td>Instrument</td>
				<td>Price</td>
				<td>Quantity</td>
				<td>Sub Total</td>
			</tr>";
			
	echo "<tr><td>".$row1['instrument']."</td>";
		  echo "<td>".$row1['price']."</td>";
		  echo "<td>".$row1['quantity']."</td>";
		  $subTotal = (floatval($row1['quantity']) * floatval($row1['price']));
		  echo "<td>".$subTotal."</td>";
		  
	while($row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC)){
		  echo "<tr><td>".$row1['instrument']."</td>";
		  echo "<td>".$row1['price']."</td>";
		  echo "<td>".$row1['quantity']."</td>";
		  $subTotal = (floatval($row1['quantity']) * floatval($row1['price']));
		  echo "<td>".$subTotal."</td>";
	  }
	echo "</table>";

} else{
	echo "<br>you have not place any order yet";
}

?>