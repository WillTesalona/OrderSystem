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
    <title>Upload XML File</title>
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
        <h2>Upload XML File</h2>

        <form action="uploadXML2.php" method="post" enctype="multipart/form-data">
            <div class="submitContainer">
                <input type="file" id="file" name="filename" accept=".xml">
                <input type="submit" name="submit" value="Upload">
            </div>
        </form>

        <br><br><form action="addMenu.php">
                <div class="submitContainer">
                    <input type="submit" value="Cancel"/>
                </div>
            </form>

        </div>
    </div>

    
</body>
</html>
