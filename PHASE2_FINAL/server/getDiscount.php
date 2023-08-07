<?php 
$conn = mysqli_connect("localhost", "root", "") or die ("Unable to connect!". mysqli_error());  
mysqli_select_db($conn, "dbordersystem");

// Get the value of chosenDish from the AJAX request
$chosenDish = $_GET['chosenDish'];
$chosenSide = $_GET['chosenSide'];
$chosenDrink = $_GET['chosenDrink'];

// Prepare the SQL query to fetch the discount based on the selected items
$sql = "SELECT discount FROM tblcombo WHERE main = '$chosenDish' AND sides = '$chosenSide' AND drink = '$chosenDrink'";

// Execute the SQL query
$result = $conn->query($sql);

// Check if the query was successful
if ($result) {
    if ($result->num_rows > 0) {
        // Fetch the first row from the result set
        $row = $result->fetch_assoc();
        // Get the discount value and format it as double
        $discount = doubleval($row['discount']);
        // Return the discount value
        echo $discount;
    } else {
        // No matching combo found in the database
        echo "0"; // No discount
    }
} else {
    // Query execution failed
    echo "0"; // No discount
}

// Close the database connection
mysqli_close($conn);
?>
