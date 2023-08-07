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
    <title>Generate Summary Report</title>
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
          
            <form action="showSumReport.php" method="post">
                <br>
                <h2>Generate Summary Report</h2><br>
    
                <div class="submitContainer">
                <label for = "date">Choose a date:</label>
                <select id = "date" name = "date">
                    <?php
                        $query = mysqli_query($DBConnect, "SELECT DISTINCT date FROM tblorder");
                        for ($date = mysqli_fetch_array($query); $date; $date = mysqli_fetch_array($query)) {
                            
                            echo '<option value="' . $date['date'] . '">' . $date['date'] . '</option>';
                        }
                        
                    ?>
                </select>
                </div>
                
                        <div class="submitContainer">
                        <br><br><input type="submit" value="Enter" name="Enter"/> 
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
