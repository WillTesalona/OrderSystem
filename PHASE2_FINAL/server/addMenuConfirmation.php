<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href = "../css/Style.css" rel = "stylesheet">
    <link href = "../css/tab.css" rel = "stylesheet">
    <link href = "../css/newheader.css" rel = "stylesheet">
    <link href= "../css/confirmation.css" rel="stylesheet">
    <link href= "../css/addMenuConfirmation.css" rel="stylesheet">
    <title>Checkout Form</title>
</head>

    <body>
        <header class="header header-dark bg-dark header-sticky">
            <div class="container">
                <div class="row">
                    <nav class="navbar navbar-expand-lg navbar-dark">
                        
                        <div class ="logo">
                        <img src="../css/logo.png" alt="Logo" width="130">
                        </div>
        
        
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
        
                        <div class="navbarMenu" id="navbarMenu">
                          
                                    <a class=" address" href="#" data-toggle="modal" data-target="#addressModal"></i><b>Combo Meals</b><br></a>
                             
                        </div>
        
                        <div class="" id="navbarMenu2">
                            <ul class="navbar-nav ">
                                <li class="login">
                                    <a class="nav-link" href="/login">Log In</a>
                                </li>
        
                                <li class="cart">
                                    <a data-toggle="modal" data-target="#cart" class="nav-link"><span>Cart</span><span>0</span></a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>

            </div>
        </header>

       

        <div class="dashboard">
            <div class="checkoutbg">
                <form>

                <br><h2>Menu Item Has Been Added!</h2><br>

                <input type="submit" value="Back to Main Menu" formaction="admin.php">
                </form>
              
            </div>
        </div>

 
    </body>
</html>
