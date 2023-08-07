<?php
require("connect.php");

if (isset($_GET["edit"])) {
    $menu_id = $_GET["edit"];

   
    $query = "SELECT * FROM tblmenu WHERE Item='$menu_id'";
    $result = mysqli_query($DBConnect, $query);
    $menuItem = mysqli_fetch_assoc($result);

    
    if (isset($_POST["updateBtn"])) {
        $name = $_POST["p_name"];
        $category = $_POST["p_category"];
        $price = $_POST["p_price"];
        $image = $_POST["p_image_link"];

        
        $updateQuery = "UPDATE tblmenu SET Item='$name', Category='$category', Price='$price', img='$image' WHERE Item='$menu_id'";
        mysqli_query($DBConnect, $updateQuery);

        //try menu_id

        header("Location: updateMenuConfirmation.php");
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
    <title>Update Menu Item</title>
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
            <h2>Edit Menu Item</h2>
            <form action="editMenu.php?edit=<?php echo $menu_id; ?>" method="post">
                <div class="orderDetails">
                    <div class="formGroup">
                        <label for="p_name">Item Name:</label>
                        <input type="text" name="p_name" value="<?php echo $menuItem['Item']; ?>" required />
                        <br>
                        <label for="p_category">Category:</label>
                        <select name="p_category" id="p_category">
                            <option value="Mains" <?php if ($menuItem['Category'] === 'Mains') echo 'selected'; ?>>Mains</option>
                            <option value="Sides" <?php if ($menuItem['Category'] === 'Sides') echo 'selected'; ?>>Sides</option>
                            <option value="Drinks" <?php if ($menuItem['Category'] === 'Drinks') echo 'selected'; ?>>Drinks</option>
                        </select>
                        <br>
                        <label for="p_price">Price:</label>
                        <input type="text" name="p_price" pattern="^\d+(\.\d{1,2})?$" value="<?php echo $menuItem['Price']; ?>" required />
                        <br>
                        <label for="p_image_link">Image Link:</label>
                        <input type="text" name="p_image_link" value="<?php echo $menuItem['img']; ?>" required />
                        <br>
                        <div class="image-preview">
                            <img id="preview-image" src="<?php echo $menuItem['img']; ?>" alt="Image Preview">
                        </div>
                    </div>
                </div>
                <div class="submitContainer">
                    <input type="submit" value="Update" name="updateBtn" />
                </div>
            </form>
            <br><div class="submitContainer">
                <form>
                    <input type="submit" value="Cancel" formaction="updateMenu.php">
                </form>
            </div>
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
    </script>
</body>
</html>
