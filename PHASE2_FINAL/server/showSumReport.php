<?php
require("connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/Style.css" rel="stylesheet">
    <link href="../css/tab.css" rel="stylesheet">
    <link href="../css/newheader.css" rel="stylesheet">
    <link href="../css/login.css" rel="stylesheet">
    <link href="../css/addMenu.css" rel="stylesheet">
    <link href="../css/updateMenu.css" rel="stylesheet">
    <title>Update/Delete Menu Item</title>
</head>
<body>
  
    <header class="header header-dark bg-dark header-sticky">
        <div class="container">
            <div class="row">
                <nav class="navbar navbar-expand-lg navbar-dark">
                    <div class="logo">
                        <img src="../css/logo.png" alt="Logo" width="130">
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse"
                        aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </nav>
            </div>
        </div>
    </header>
    

    <div class="dashboard">
        <div class="checkoutbg">
            <?php 
            $conn = mysqli_connect("localhost", "root", "") or die ("Unable to connect!". mysqli_error());  
            mysqli_select_db($conn, "dbordersystem");  

            $date = $_POST['date'];

        ?>
        <h2>Summary Report</h2>
        <table border="1" width="50%">
            <tr bgcolor="#FLE5EB">
                <th>Total Amount</th>
                <th>Total Quantity</th>
                <th>Total Main Dish</th>
                <th>Total Side Dish</th>
                <th>Total Drinks</th>
                <th>Total Discount</th>
            </tr>

            <?php
                echo "<div class=\"submitContainer\">";
                echo "<br><h4>" . "Date: " . $date . "</h4><br>";
                echo "</div>";
                $query = mysqli_query($conn, "SELECT DISTINCT SUM(total_price) AS total_amount, 
                                                SUM(mQuantity + sQuantity + dQuantity) AS total_quantity,
                                                SUM(mQuantity) AS total_maindish,
                                                SUM(sQuantity) AS total_sidedish,
                                                SUM(dQuantity) AS total_drinks,
                                                SUM(orig_price - total_price) AS total_discount
                                                FROM tblorder  WHERE date = '$date'");
                while($result = mysqli_fetch_assoc($query)){
                    echo "<tr>";
                    echo "<td>". $result['total_amount']. "</td>";
                    echo "<td>". $result['total_quantity']. "</td>";
                    echo "<td>". $result['total_maindish']. "</td>";
                    echo "<td>". $result['total_sidedish']. "</td>";
                    echo "<td>". $result['total_drinks']. "</td>";
                    echo "<td>". $result['total_discount']. "</td>";
                    echo "</tr>";
                }
            ?>
        </table><br><br>
        
        <form action="sumReport.php" method="post">
    <input type="hidden" name="date" value="<?php echo htmlspecialchars($_POST['date']); ?>">
    <div class="submitContainer">
        <input type="submit" value="Generate XML"/>
    </div>
</form>
    
    <br>

    <form action ="genSumReport.php" method="POST">
    <div class="submitContainer">
        <input type="submit" value="Cancel"/>
    </div>
    </form>

        </div>
    </div>

    
</body>
</html>
