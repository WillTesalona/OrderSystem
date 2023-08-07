<?php
session_start();
require("connect.php");

function checkIfComboExists($DBConnect, $main, $sides, $drink) {
   
    $query = mysqli_query($DBConnect, "SELECT main, sides, drink FROM tblcombo
    WHERE main='$main'
    AND sides='$sides'
    AND drink='$drink'");
 
    return mysqli_fetch_array($query);
 }

 

 if (isset($_POST["saveBtn"])) {


    $main = $_POST['selectedDish'];
    $sides =  $_POST['selectedsideDish'];
    $drink =  $_POST['selectedDrink'];
    $name = $_POST['c_name'];
    $discount =  $_POST['discount'];

    $fetch = checkIfComboExists($DBConnect, $main, $sides, $drink);

    $findNum = mysqli_query($DBConnect, "SELECT * FROM tblcombo");

    $row1 = mysqli_fetch_assoc($findNum);


    if ($fetch) {
       
        $_SESSION["error"] = "Combo already exist in the database. Please enter different values.";
        header("location:createCombo.php"); 
        exit();
    } else {
        $num = mysqli_num_rows($findNum) + 1;
        $studQuery = "INSERT INTO tblcombo (combo_id, name, main,sides,drink,discount) VALUES ($num, '$name', '$main', '$sides', '$drink','$discount')";
        $studResult = mysqli_query($DBConnect, $studQuery);

        header("location:createComboConfirmation.php");
        exit(); 
    }
}



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
    <title>Create a Combo Meal</title>
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

<?php

        $mainDishQuery = mysqli_query($DBConnect, " SELECT *
        FROM tblmenu 
        WHERE Category
        LIKE 'Mains' ");

        $sideDishQuery =mysqli_query($DBConnect, " SELECT *
        FROM tblmenu 
        WHERE Category
        LIKE 'Sides' ");
        $drinksQuery =mysqli_query($DBConnect, " SELECT *
        FROM tblmenu 
        WHERE Category
        LIKE 'Drink' ");


?>



    <div class="dashboard">
        <div class="checkoutbg">
           
            <form action="createCombo.php" method="post">
                <br>
                <h2>Create a Combo Meal</h2>
                <br>
                <div class="orderDetails">
                    <div class="formGroup">
                        <h3> Select a Main dish: </h3>
                 <select name="selectedDish">
                    <?php 
                    while ($row = mysqli_fetch_assoc($mainDishQuery)){
                        echo '<option value="' . $row['Item'] . '">' . $row['Item'] . '</option>';
                    }
                    ?>
                </select>      

                     <h3> Select a Side dish: </h3>
                     <select name="selectedsideDish">
                    <?php 
                    while ($row = mysqli_fetch_assoc($sideDishQuery)){
                        echo '<option value="' . $row['Item'] . '">' . $row['Item'] . '</option>';
                    }
                    ?>
                    </select>

                       <h3> Select a drink: </h3>
                     <select name="selectedDrink">
                    <?php 
                    while ($row = mysqli_fetch_assoc($drinksQuery)){
                        echo '<option value="' . $row['Item'] . '">' . $row['Item'] . '</option>';
                    }
                    ?>
                      </select>

                      <h3> Discount Percentage: </h3>
                  <input type="number" min="0" max="1" step="0.01" name="discount"/>

                      <h3> Combo Name: </h3>
                  <input type="text" name="c_name" placeholder="Enter the combo name" required/>

                
                <br><br><div class="submitContainer">
                    <input type="submit" value="Save" name="saveBtn"/> 
                </div>

                </div>

                </form>
                
                <form action="admin.php">
                <div class="submitContainer">
                    <input type="submit" value="Cancel"/>
                </div>
            </form>
            
            <?php
            if (isset($_SESSION["error"])) {
                echo '<p style="color: red;">' . $_SESSION["error"] . '</p>';
                unset($_SESSION["error"]);
            }
            ?>
                    </div>
                </div>
                
            

            
        </div>
    </div>

</body>
</html>
