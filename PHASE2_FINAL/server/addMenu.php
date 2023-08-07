<?php
session_start();


function checkIfMenuExists($DBConnect, $name, $category) {
    $query = mysqli_query($DBConnect, "SELECT Item, Category FROM tblmenu 
    WHERE Item='$name'
    AND Category='$category'");

    return mysqli_fetch_array($query);
}

if (isset($_POST["saveBtn"])) {
    require("connect.php");
    $name = $_POST["p_name"];
    $category = $_POST["p_category"];
    $price = $_POST["p_price"];
    $image = $_POST["p_image_link"];

    $fetch = checkIfMenuExists($DBConnect, $name, $category);

 //   $findNum = mysqli_query($DBConnect, "SELECT * FROM tblmenu");

   // $row1 = mysqli_fetch_assoc($findNum);

    if ($fetch) {
       
        $_SESSION["error"] = "Item and Category already exist in the database. Please enter different values.";
        header("location:addMenu.php"); 
        exit();
    } else {
   //     $num = mysqli_num_rows($findNum) + 1;
        $studQuery = "INSERT INTO tblmenu (Item, Category, Price, img) VALUES ('$name', '$category', '$price', '$image')";
        $studResult = mysqli_query($DBConnect, $studQuery);

        header("location:addMenuConfirmation.php");
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
    <title>Add Menu Item</title>
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
           
            <form action="addMenu.php" method="post">
                <br>
                <h2>Add a New Menu Item</h2>
                <br>
                <div class="orderDetails">
                    <div class="formGroup">
                        <input type="text" name="p_name" placeholder="Enter the product name" required/>
                        <br>
                        <label for="p_category">Category:</label>
                        <select name="p_category" id="p_category">
                            <option value="Mains">Mains</option>
                            <option value="Sides">Sides</option>
                            <option value="Drink">Drink</option>
                        </select>
                        <input type="text" name="p_price" pattern="^\d+(\.\d{1,2})?$" placeholder="Enter the product price (e.g., 10.99)" required/>
                        <input type="text" name="p_image_link" placeholder="Enter the image link" required/>
                        <div class="image-preview">
                            <img id="preview-image" src="#" alt="Image Preview">
                        </div>
                         
            <?php
            if (isset($_SESSION["error"])) {
                echo '<p style="color: red;">' . $_SESSION["error"] . '</p>';
                unset($_SESSION["error"]);
            }
            ?>
                    </div>
                </div>
                
                <div class="submitContainer">
                    <input type="submit" value="Save" name="saveBtn"/> 
                </div>
            </form>

            <br><form action="uploadXML.php">
                <div class="submitContainer">
                    <input type="submit" value="Upload XML File"/>
                </div>
            </form>
            

            <br><form action="admin.php">
                <div class="submitContainer">
                    <input type="submit" value="Cancel"/>
                </div>
            </form>
        </div>
    </div>

    <script>
        const imageLinkInput = document.querySelector('input[name="p_image_link"]');
        const imagePreview = document.getElementById('preview-image');

        imageLinkInput.addEventListener('input', function() {
            const imageUrl = this.value.trim();
            if (isValidImageUrl(imageUrl)) {
                imagePreview.src = imageUrl;
                imagePreview.style.display = 'block';
            } else {
                imagePreview.style.display = 'none';
            }
        });

        function isValidImageUrl(url) {
            return url.match(/\.(jpeg|jpg|gif|png)$/i) !== null;
        }

        
        const errorMessage = "<?php echo isset($_SESSION['error']) ? $_SESSION['error'] : ''; ?>";
        if (errorMessage !== "") {
            setTimeout(() => {
                alert(errorMessage);
                <?php unset($_SESSION['error']); ?> 
            }, 100);
        }
    </script>
</body>
</html>
