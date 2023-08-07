
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
        $DBConnect = mysqli_connect("localhost", "root", "") or die("Unable to Connect" . mysqli_error());

        $db = mysqli_select_db($DBConnect, 'dbordersystem');

        $date = $_POST['date'];

        // $sql = "SELECT DISTINCT SUM(amount) AS total_amount FROM tblorder WHERE date = '$date'";
        $sql = "SELECT DISTINCT SUM(total_price) AS total_amount, 
                                SUM(mQuantity + sQuantity + dQuantity) AS total_quantity,
                                SUM(mQuantity) AS total_maindish,
                                SUM(sQuantity) AS total_sidedish,
                                SUM(dQuantity) AS total_drinks,
                                SUM(orig_price - total_price) AS total_discount

                FROM tblorder 
                WHERE date = '$date'";

        $result = mysqli_query($DBConnect, $sql);

        $xml = new DOMDocument('1.0', 'UTF-8');

        $root = $xml->createElement('summary');
        $xml->appendChild($root);

        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {

                $order = $xml->createElement('date');

                $order->appendChild($xml->createElement('total_amount', $row["total_amount"]));
                $order->appendChild($xml->createElement('total_quantity', $row["total_quantity"]));
                $order->appendChild($xml->createElement('total_maindish', $row["total_maindish"]));
                $order->appendChild($xml->createElement('total_sidedish', $row["total_sidedish"]));
                $order->appendChild($xml->createElement('total_drinks', $row["total_drinks"]));
                $order->appendChild($xml->createElement('total_discount', $row["total_discount"]));

                $root->appendChild($order);
            }
        }

        $xml->formatOutput = true; // For better formatting
        $currentDateTime = date('Ymd_His');
        $xmlFilePath = '/Applications/XAMPP/xamppfiles/htdocs/will/PHASE2_FINAL/generatedXMLfiles/summary_' . $date . '.xml'; // Dynamic filename
        $fileName = 'summary_' . $date . '.xml';
        // Save the XML content to the file
        file_put_contents($xmlFilePath, $xml->saveXML());

        mysqli_close($DBConnect);

        echo "<div class=\"submitContainer\">";
        echo "<h2>Data generated and saved to: " . $fileName . "</h2>";
        echo "</div>";
        ?>

        <br>
        <form action="genSumReport.php" method="POST">
            <div class="submitContainer">
                <input type="submit" value="Generate Again"/>
            </div>
        </form>

        <br>

        <form action="admin.php" method="POST">
            <div class="submitContainer">
                <input type="submit" value="Back to main menu"/>
            </div>
        </form>
    </div>
</div>

    
</body>
</html>
