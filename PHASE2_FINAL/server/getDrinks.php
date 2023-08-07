<?php 
        $conn = mysqli_connect("localhost", "root", "") or die ("Unable to connect!". mysqli_error());  
        mysqli_select_db($conn, "dbordersystem");
         
        
        $dishQuery = mysqli_query($conn, "SELECT img, Item, Price FROM tblmenu WHERE Category LIKE 'Drink' ORDER BY Price");

        while($drinkResult = mysqli_fetch_assoc($dishQuery)){
            echo "<div class = 'dashboardCard'>";
            echo "<img class = 'cardImage' src = ".$drinkResult['img'].">";
            echo "<div class = 'cardDetail'>";
            echo "<h4>".$drinkResult['Item']."</h4>";
            echo "<p> PHP ".$drinkResult['Price']."</p>";
            $Item = $drinkResult['Item'];
            echo "<button class='buttonPlusImage' data-drink='" . $drinkResult['Item'] . "'><img src='https://static.thenounproject.com/png/5116985-200.png'/></button>";
            echo "<button class='buttonMinusImage' data-drink='" . $drinkResult['Item'] . "'> <img src='https://icons.iconarchive.com/icons/icons8/windows-8/256/Science-Minus-Math-icon.png'/></button>";
            echo "</div>";
            echo "</div>";
        }
    ?> 