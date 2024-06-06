<?php

require("Connection.php");

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <title>admin login</title>
    <link rel="stylesheet" type="text/css" href="log.css">
</head>
<body>

    <div class="login-form">
                <h2>LOGIN FORM<h2>
                    <form action="#" method="POST">
                <p>User Name</p>
                <input type="text" placeholder="Admin name" name="Adminname">
                <p>Password</p>
                <input type="password" placeholder="Password" name="Adminpassword">
                <button type="submit" name="Signin">Sign In</button>
            </form>
    </div>

   <?php

    if(isset($_POST['Signin'])){
        $query="SELECT * FROM `admin_login` WHERE `Admin_name` = '$_POST[Adminname]' AND `Admin_password` = '$_POST[Adminpassword]'";
        $result=mysqli_query($con,$query);
        if(mysqli_num_rows($result)==1){
            session_start();
            $_SESSION['AdminLoginId']=$_POST['Adminname'];
            header("location: Users.php");

        }
        else{
            echo"<script>alert('incorrect password');</script>";
        }
    }


?> 
</body>
</html>