<?php  
$conn = mysqli_connect("localhost", "root", "") or die ("Unable to connect!". mysqli_error());  
        mysqli_select_db($conn, "dbordersystem");
       

        $studQuery = mysqli_query($conn, "SELECT * FROM tblorder");
while($studResult = mysqli_fetch_array($studQuery)){
    $counter += 1;
}
$final = $counter + 1;
$main = $_POST["main"]; 
$side = $_POST["side"];
$drink = $_POST["drink"];
$mQuan = $_POST["mQuan"];
$sQuan = $_POST["sQuan"];
$dQuan = $_POST["dQuan"];
$tPrice;
$name = $_POST["name"];
$date = $_POST["date"];
$oPrice;

$insertQuery = mysqli_query($conn, INSERT INTO tblorder (order_id, main, side, drink, mQuantity, sQuantity, dQuantity, total_price, name, date, orig_price) VALUES ('$final', '$main', '$side', '$drink', '$mQuan', 'sQuan', 'dQuan', '$tPrice', '$name', '$date', '$oPrice')");      

    

?>