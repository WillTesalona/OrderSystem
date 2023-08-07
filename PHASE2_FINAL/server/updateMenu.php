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
        ?>
           
            <form action="updateMenu1.php" method="post">
                <br>
                <h2>Select Category of Menu Item to be Updated</h2>
                <br>
                <div class="orderDetails">
                    <div class="formGroup">
                        <label for="p_category">Category:</label>
                        <select name="p_category" id="p_category">
                            <option value="Mains">Mains</option>
                            <option value="Sides">Sides</option>
                            <option value="Drink">Drink</option>
                        </select>
                  </div>
                </div>
                        <div class="submitContainer">
                        <input type="submit" value="Enter" name="Enter"/> 
                        </div>
            </form>

            <br><form action="admin.php">
                <div class="submitContainer">
                    <input type="submit" value="Cancel"/>
                </div>
            </form>
        </div>
    </div>

    
</body>
</html>
