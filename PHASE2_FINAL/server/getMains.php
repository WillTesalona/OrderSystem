<?php 
$conn = mysqli_connect("localhost", "root", "") or die ("Unable to connect!". mysqli_error());  
mysqli_select_db($conn, "dbordersystem");

$dishQuery = mysqli_query($conn, "SELECT img, Item, Price FROM tblmenu WHERE Category LIKE 'Mains' ORDER BY Price");

while($dishResult = mysqli_fetch_assoc($dishQuery)){
    echo "<div class='dashboardCard'>";
    echo "<img class='cardImage' src=".$dishResult['img'].">";
    echo "<div class='cardDetail'>";
    echo "<h4>".$dishResult['Item']."</h4>";
    echo "<p> PHP ".$dishResult['Price']."</p>";
    $Item = $dishResult['Item'];

    echo "<button class='buttonPlusImage' data-item='" . $dishResult['Item'] . "'><img src='https://static.thenounproject.com/png/5116985-200.png'/></button>";
    echo "<button class='buttonMinusImage' data-item='" . $dishResult['Item'] . "'> <img src='https://icons.iconarchive.com/icons/icons8/windows-8/256/Science-Minus-Math-icon.png'/></button>";
    echo "</div>";
    echo "</div>";
}
?>
