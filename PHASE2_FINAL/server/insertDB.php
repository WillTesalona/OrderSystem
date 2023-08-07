<?php

// Make sure you establish a database connection here
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbordersystem";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the POST data from the JavaScript AJAX request
$data = json_decode(file_get_contents("php://input"), true);

// Retrieve the maximum order_id from the table and increment it
$maxOrderIdQuery = "SELECT MAX(order_id) as max_order_id FROM tblorder";
$maxOrderIdResult = $conn->query($maxOrderIdQuery);
$maxOrderIdRow = $maxOrderIdResult->fetch_assoc();
$nextOrderId = $maxOrderIdRow['max_order_id'] + 1;

$chosenDish = $data['chosenDish'];
$chosenSide = $data['chosenSide'];
$chosenDrink = $data['chosenDrink'];
$itemAmount = $data['itemAmount'];
$sideAmount = $data['sideAmount'];
$drinkAmount = $data['drinkAmount'];
$discountPrice = $data['discountPrice'];
$name = $data['name'];
$date = $data['date']; // This is already in ISO format: 'YYYY-MM-DDTHH:MM:SS.sssZ'
$originalTotalPrice = $data['originalTotalPrice'];

// Prepare and execute the SQL query
$stmt = $conn->prepare("INSERT INTO tblorder (order_id, main, side, drink, mQuantity, sQuantity, dQuantity, total_price, name, date, orig_price) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("isssiiidssd", $nextOrderId, $chosenDish, $chosenSide, $chosenDrink, $itemAmount, $sideAmount, $drinkAmount, $discountPrice, $name, $date, $originalTotalPrice);

if ($stmt->execute()) {
    echo "Order successfully inserted into the database.";
} else {
    echo "Error inserting order: " . $stmt->error;
}

$stmt->close();
$conn->close();

?>
