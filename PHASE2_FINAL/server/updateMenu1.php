<?php
require("connect.php");



if (isset($_GET["edit"])) {
    $menu_id = $_GET["edit"];
    header("Location: editMenu.php?edit=" . $menu_id);
    exit();
} elseif (isset($_GET["delete"])) {
    $menu_id = $_GET["delete"];


    $deleteQuery = "DELETE FROM tblmenu  WHERE Item = '$menu_id'";
    $deleteQuery1 = "DELETE FROM tblcombo WHERE Main = '$menu_id' 
                    OR sides = '$menu_id' OR drink = '$menu_id'";

    if (mysqli_query($DBConnect, $deleteQuery)) {
        // The first query was successful, now execute the second query
        if (mysqli_query($DBConnect, $deleteQuery1)) {
            echo "Item has been deleted";
            exit();
        } else {
            // Display an error message for the second query
            echo "<script>alert('Error: Unable to delete item from tblcombo.');
                  window.location.href = 'updateMenu1.php';</script>";
            exit();
        }
    } else {
        // Display an error message for the first query
        echo "<script>alert('Error: Unable to delete item from tblmenu.');
              window.location.href = 'updateMenu1.php';</script>";
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

 

    <div class="dashboardd">
        <div class="checkoutbgg">
            <table>
                <thead>
                    <th>Image</th>
                    <th>Item Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Actions</th>
                    
                </thead>

                <tbody>
          <?php
           $Category = $_POST['p_category'];
           $dishQuery = mysqli_query($DBConnect, "SELECT img, Item, Category, Price FROM tblmenu WHERE Category LIKE '%$Category%'order by Item");

          while ($dishResult = mysqli_fetch_assoc($dishQuery)) {
            echo "<tr>";
            echo "<td><img class='cardImagee' src='" . $dishResult['img'] . "'></td>";
            echo "<td>" . $dishResult['Item'] . "</td>";
            echo "<td>" . $dishResult['Category'] . "</td>";
            echo "<td>PHP " . $dishResult['Price'] . "</td>";
            echo "<td>";
            echo "<a class='action-btn' href='updateMenu1.php?edit=" . $dishResult['Item'] . "'>Update</a><br>";
            echo "<a href='#' class='action-btn delete-btn' data-menu-id='" . $dishResult['Item'] . "'>Delete</a>";
            echo "</td>";
            echo "</tr>";
          }
          ?>
        </tbody>
            </table>
         
                
            <div class="submitContainer">
                <form>
                    <input type="submit" value="Cancel" formaction="updateMenu.php">
                </form>
            </div>
            
        </div>
    </div>

    <script>
        
        function handleDelete(menuId) {
            
            if (confirm("Are you sure you want to delete this item?")) {
                
                fetch(`updateMenu1.php?delete=${menuId}`, {
                    method: 'DELETE'
                })
                .then(response => response.text())
                .then(data => {
                  
                    alert(data);
                    window.location.reload();
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            }
        }

        const deleteButtons = document.querySelectorAll(".delete-btn");
        deleteButtons.forEach(btn => {
            btn.addEventListener("click", function (event) {
                event.preventDefault();
                const menuId = this.getAttribute("data-menu-id");
                handleDelete(menuId);
            });
        });
    </script>
   
</body>
</html>
