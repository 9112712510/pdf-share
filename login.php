<?php
$hostname ="localhost";
$username ="root";
$password ="";
$database ="login_register";

$conn = mysqli_connect($hostname, $username, $password, $database) or die("Database connection failed");

session_start();

error_reporting(0);

if(isset($_SESSION["Email"])){
    header("location: handle.html");
}

if(isset($_POST["signup"])){
    $full_name=mysqli_real_escape_string($conn, $_POST["signup_full_name"]);
    $Email=mysqli_real_escape_string($conn, $_POST["signup_Email"]);
    $password=mysqli_real_escape_string($conn, md5($_POST["signup_password"]));
    $cpassword=mysqli_real_escape_string($conn, md5($_POST["signup_cpassword"]));

    $check_Email = mysqli_num_rows(mysqli_query($conn,"SELECT Email FROM log WHERE Email='$Email'"));

    if($password !== $cpassword){
        echo "<script>alert('password did not match.');</script>";
     }elseif($check_Email > 0){
         echo "<script>alert('Email already exist.');</script>";
     }
         else{
        $sql = "INSERT INTO log (full_name, Email, password) VALUES ('$full_name', '$Email', '$password')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $_POST["signup_full_name"] ="" ;
            $_POST["signup_Email"] = "" ;
            $_POST["signup_password"] = "" ;
            $_POST["signup_cpassword"] = "" ;
            echo "<script>alert('user registration successfully.');</script>";
        }else{
            echo "<script>alert('user registration failed.');</script>";
        }
    }
}

if(isset($_POST["signin"])){
   $Email=mysqli_real_escape_string($conn, $_POST["Email"]);
   $password=mysqli_real_escape_string($conn, md5($_POST["password"]));
   

   $check_Email = mysqli_query($conn,"SELECT id FROM log WHERE Email='$Email' AND password='$password'");
       
      if (mysqli_num_rows($check_Email) > 0) {
          $row = mysqli_fetch_assoc($check_Email);
          $_SESSION["user_id"]= $row['id'];
          header("location: handle.html");
      }else {
          echo "<script>alert('Login details is incorrect. please try again.');</script>";
      }
    
}



?>





<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
        <title>Signin-Signup Form</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="container">
            <div class="signin-signup">
                <form action="" method="post" class="sign-in-form">
                    <h2 class="title">Sign in</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Email Address" name="Email" value="<?php echo $_POST["Email"]; ?>" required>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="password" value="<?php echo $_POST["password"]; ?>" required >
                    </div>
                    <input type="submit" value="Login" name="signin" class="btn">
                    <p class="social-text">or Sign in with social plattform</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </form>
                <form action="" method="post" class="sign-up-form" method="POST">
                    <h2 class="title">Sign up</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="full name" name="signup_full_name" value="<?php echo $_POST["signup_full_name"]; ?>" required>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="text" placeholder="Email" name="signup_Email" value="<?php echo $_POST["signup_Email"];?>" required >
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="signup_password" value="<?php echo $_POST["signup_password"];?>" required >
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Confirm Password" name="signup_cpassword" value="<?php echo $_POST["signup_cpassword"];?>" required >
                    </div>
                    <input type="submit" value="Sign up" class="btn" name="signup">
                    <p class="social-text">or Sign in with social plattform</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </form>
            </div>
            <div class="panels-container">
                <div class="panel left-panel">
                    <div class="content">
                        <h3>Member of Brand?</h3>
                        <p>lorem ipsum dolor sit amet consector</p>
                        <button class="btn" id="sign-in-btn">Sign in</button>
                    </div>
                    <img src="maker.svg" alt="" class="image">
                </div>
                <div class="panel right-panel">
                    <div class="content">
                        <h3>New to Brand?</h3>
                        <p>lorem ipsum dolor sit amet consector</p>
                        <button class="btn" id="sign-up-btn">Sign up</button>
                    </div>
                    <img src="press.svg" alt="" class="image">
                </div>
            </div>
        </div>
        <script src="app.js"></script>           
    </body>
</html>