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
    <link href="../css/admin.css" rel="stylesheet">
    <title>Admin Page</title>

</head>

<body>
    <header class="header header-dark bg-dark header-sticky">
        <div class="container">
            <div class="row">
                <nav class="navbar navbar-expand-lg navbar-dark">

                    <div class="logo">
                        <img src="../css/logo.png" alt="Logo" width="130">
                    </div>

                    <ul class="navbar-nav ">
                            <li class="login">
                                <a class="nav-link" href="../server/login.php">Log Out</a>
                            </li>
                        </ul>

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
            
                <br>
                <h2>Main Menu</h2>
                <br>
                <div class="options-container">
                    <div class="option">
                        <a href="addMenu.php">
                            <button>Add Menu Item</button>
                        </a>
                    </div>
                    <div class="option">
                        <a href="updateMenu.php">
                            <button>Update/Delete Menu Item</button>
                        </a>
                    </div>
                    <div class="option">
                        <a href="createCombo.php">
                            <button>Create Combo Meal</button>
                        </a>
                    </div>
                    <div class="option">
                        <a href="genSumReport.php">
                            <button>Generate Summary Report</button>
                        </a>
                    </div>
                </div>
            
        </div>
    </div>
</body>
</html>
