<?php
$hostname ="localhost";
$username ="root";
$password ="";
$database ="login_register";

$conn = mysqli_connect($hostname, $username, $password, $database) or die("Database connection failed");

session_start();

error_reporting(0);

if(isset($_SESSION["Email"])){
    header("location: uploa.php");
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
          header("location: uploa.php");
      }else {
          echo "<script>alert('Login details is incorrect. please try again.');</script>";
      }
    
}



?>
