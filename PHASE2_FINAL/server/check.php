<?php
require("connect.php"); 
if (isset($_POST["loginBtn"]))
 {
    $user=$_POST["username"];
    $pass=$_POST["pass"];
    
    $query = mysqli_query($DBConnect, "SELECT username, password FROM tblaccount 
                                       WHERE username='$user'
                                       AND password='$pass'");

    $fetch = mysqli_fetch_array($query);

    if($user==$fetch["username"] && $pass==$fetch["password"]) 
    {
      session_start(); 
      $_SESSION['getLogin'] = $user;
      header("location:admin.php");  
    }
   else
    {
      header("location:login.php?error=1");
    }
}
?>