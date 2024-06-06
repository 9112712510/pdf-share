

<?php
/*session_start();
if(!isset($_SESSION['Email'])){

    echo "<script>
    alert('you have to login first.');
    window.location.href='homepage2.php';
    </script>";
    
   }*/


if (isset($_POST['submit'])) {

    
     
    // Validate the uploaded file
    $allowedExtensions = ['pdf','ppt','pptx'];
    $fileExtension = strtolower(pathinfo($_FILES['pptFile']['name'], PATHINFO_EXTENSION));

    if (!in_array($fileExtension, $allowedExtensions)) {
        echo "<script>alert('Only PPT files are allowed.');</script>";
        exit;
    }

    // Move the uploaded file to a desired location
    $targetDirectory = "pptstore/";
    $targetFilePath = $targetDirectory . $_FILES['pptFile']['name'];

    if (!move_uploaded_file($_FILES['pptFile']['tmp_name'], $targetFilePath)) {
        echo "<script> alert('Failed to upload the file.'); </script>";
        exit;
    }

    // Store the file path in the database
    $dbHost = 'localhost';
    $dbName = 'login_register';
    $dbUsername = 'root';
    $dbPassword = '';

    $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $name=$_POST["name"];
    $title=$_POST["title"];
    $description=$_POST["description"];
    $filePath = $conn->real_escape_string($targetFilePath);
    $sql = "INSERT INTO upload_pdf_file (pdf_file,name,title,description) VALUES ('$filePath','$name','$title','$description')";

    if ($conn->query($sql) === TRUE) 
    {
        echo "<script>
        alert('File uploaded successfully.');
    window.location.href='handle.html';
    </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}


?>
<html>
    <head>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
<div class="drag-area">
      <div class="icon"><i class="fas fa-cloud-upload-alt"></i></div>
      <header>select file & upload</header>
<form action="uploa.php" method="post" enctype="multipart/form-data">
<input class="button" type="text" name="name" placeholder="Enter your Name" required>
      
      <input class="button" type="text" name="title" placeholder="Title" required>
      <br><br>
      <textarea  class="button"  cols="25" rows="6" name="description" placeholder="Description"></textarea>
      <br><br>
    <input type="file" class="button" name="pptFile">
    <br><br>
    <input type="submit" class="button" name="submit"  value="Upload PPT">
</form>
</body>
</html>