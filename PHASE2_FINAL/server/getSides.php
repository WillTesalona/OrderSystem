<?php 
$conn = mysqli_connect("localhost", "root", "") or die ("Unable to connect!". mysqli_error());  
mysqli_select_db($conn, "dbordersystem");

$dishQuery = mysqli_query($conn, "SELECT img, Item, Price FROM tblmenu WHERE Category LIKE 'Sides' ORDER BY Price");

while($sideResult = mysqli_fetch_assoc($dishQuery)){
    echo "<div class='dashboardCard'>";
    echo "<img class='cardImage' src=".$sideResult['img'].">";
    echo "<div class='cardDetail'>";
    echo "<h4>".$sideResult['Item']."</h4>";
    echo "<p> PHP ".$sideResult['Price']."</p>";
    $Item = $sideResult['Item'];

    echo "<button class='buttonPlusImage' data-side='" . $sideResult['Item'] . "'><img src='https://static.thenounproject.com/png/5116985-200.png'/></button>";
    echo "<button class='buttonMinusImage' data-side='" . $sideResult['Item'] . "'> <img src='https://icons.iconarchive.com/icons/icons8/windows-8/256/Science-Minus-Math-icon.png'/></button>";
    echo "</div>";
    echo "</div>";
}
?>
