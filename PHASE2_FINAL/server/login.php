<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href = "../css/Style.css" rel = "stylesheet">
    <link href = "../css/tab.css" rel = "stylesheet">
    <link href = "../css/newheader.css" rel = "stylesheet">
    <link href= "../css/login.css" rel="stylesheet">
    <title>Admin Login</title>
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

                        <ul class="navbar-nav ">
                            <li class="login">
                                <a class="nav-link" href="../client/MCO1.html">Main Menu</a>
                            </li>
                        </ul>
        
                    
        
                
                    </nav>
                </div>

            </div>
        </header>
<!------------------------------------------------>

<!------------------------------------------------>
        
        <div class="dashboard">
            <div class="checkoutbg">
            <form action="check.php" method="post">
                <br><h2>Admin Login</h2><br>
                <div class="orderDetails">
                    <div class="formGroup">
                    <td>Username:</td><td><input type="text" name="username"/></td>
                    </div>
                    <div class="formGroup">
                        <label for="address">Password:</label>
                        <input type="password" name="pass"/>
                    </div>
                    <?php
                        if(isset($_GET["error"])) {
                            $error=$_GET["error"];
                    
                            //this line will be called by the check.php if the login credentials are incorrect 
                            if ($error==1) {
                                echo "<p align='center'>Username and/or password invalid<br/></p>"; 
                            }
                        }
                    
                    ?>
                  
                </div>
                <div class="submitContainer">
                    <input type="submit" value="Login" name="loginBtn"/> 
                </div>
                
            </form>
            </div>
        </div>
        

    
    </body>
</html>
