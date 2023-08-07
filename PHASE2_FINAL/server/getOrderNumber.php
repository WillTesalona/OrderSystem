<?php 
    $conn = mysqli_connect("localhost", "root", "") or die ("Unable to connect!". mysqli_error());  
    mysqli_select_db($conn, "dbordersystem");  

    $studQuery = mysqli_query($conn, "SELECT * FROM tblorder ORDER BY order_id DESC LIMIT 1");
    if ($studResult = mysqli_fetch_array($studQuery)) {
        $id = $studResult['order_id'];
        echo "Your order number is: $id";
    } else {
        echo "No orders found.";
    }
?>
