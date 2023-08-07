<?php
/*
// Include the database connection file
require("connect.php");

// Check if the form was submitted
if (isset($_POST["submit"])) {
    // Check if a file was uploaded successfully
    if (isset($_FILES["filename"]) && $_FILES["filename"]["error"] == 0) {
        $file_tmp = $_FILES["filename"]["tmp_name"];

        // Validate the file type (make sure it's XML)
        if ($_FILES["filename"]["type"] === "text/xml") {
            // Load the XML file
            $xml = simplexml_load_file($file_tmp);

            // Loop through the menu items and insert them into the database
            foreach ($xml->children() as $menu_item) {
                $item = $menu_item->Item;
                $category = $menu_item->Category;
                $price = $menu_item->Price;
                $img = $menu_item->img;

                // Escape special characters
                $item = addslashes($item);
                $category = addslashes($category);
                $img = addslashes($img);

                // Insert the values into the database
                $query = "INSERT INTO tblmenu (Item, Category, Price, img) VALUES ('$item', '$category', $price, '$img')";
                if ($DBConnect->query($query) !== TRUE) {
                    echo "Error: " . $query . "<br>" . $DBConnect->error;
                    break; // If there's an error, stop the loop
                }
            }

        //    echo "XML file uploaded and inserted into the database successfully.";
           header("location:addMenuConfirmation.php");
        } else {
            echo "Invalid file type. Only XML files are allowed.";
        }
    } else {
        $_SESSION["error"] = "Item and Category already exist in the database. Please enter different values.";
        header("location:addMenu.php"); 
     //   echo "Error uploading file. Please try again.";
    }
}
*/


session_start();
// Include the database connection file
require("connect.php");

// Function to check if a menu item already exists in the database
function checkIfMenuExists($DBConnect, $name, $category) {
    $name = addslashes($name);
    $category = addslashes($category);
    $query = mysqli_query($DBConnect, "SELECT Item, Category FROM tblmenu 
    WHERE Item='$name'
    AND Category='$category'");

    return mysqli_fetch_array($query);
}

// Check if the form was submitted
if (isset($_POST["submit"])) {
    // Check if a file was uploaded successfully
    if (isset($_FILES["filename"]) && $_FILES["filename"]["error"] == 0) {
        $file_tmp = $_FILES["filename"]["tmp_name"];

        // Validate the file type (make sure it's XML)
        if ($_FILES["filename"]["type"] === "text/xml") {
            // Load the XML file
            $xml = simplexml_load_file($file_tmp);

            // Loop through the menu items and insert them into the database
            $duplicateItems = array(); // To store duplicate items found in the XML

            foreach ($xml->children() as $menu_item) {
                $item = $menu_item->Item;
                $category = $menu_item->Category;
                $price = $menu_item->Price;
                $img = $menu_item->img;

                // Check if the menu item already exists in the database
                $fetch = checkIfMenuExists($DBConnect, $item, $category);

                if ($fetch) {
                    $duplicateItems[] = "$item (Category: $category)";
                } else {
                    // Insert the values into the database
                    $query = "INSERT INTO tblmenu (Item, Category, Price, img) VALUES ('$item', '$category', $price, '$img')";
                    if ($DBConnect->query($query) !== TRUE) {
                        echo "Error: " . $query . "<br>" . $DBConnect->error;
                        break; // If there's an error, stop the loop
                    }
                }
            }

            if (!empty($duplicateItems)) {
                // Set an error message for duplicate items
                $_SESSION["error"] = "The following items already exist in the database: " . implode(", ", $duplicateItems);
                header("location:addMenu.php");
                exit();
            } else {
                // No duplicates, redirect to confirmation page
                header("location:addMenuConfirmation.php");
                exit();
            }
        } else {
            $_SESSION["error"] = "Invalid file type. Only XML files are allowed.";
            header("location:addMenu.php");
            exit();
        }
    } else {
        $_SESSION["error"] = "Error uploading file. Please try again.";
        header("location:addMenu.php");
        exit();
    }
}




?>
