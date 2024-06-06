<html>
    <head>
        <title>display</title>
    </head>
    <body>
        <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_register";

 $conn= mysqli_connect($servername,$username,$password,$dbname);
 $id=$_GET['id'];
$query=mysqli_query($conn,"SELECT * FROM upload_pdf_file where id='$id' ");

while($row=mysqli_fetch_array($query))
{
    ?>

<iframe src="<?php echo $row["pdf_file"];  ?>"  width="600" height="800"></iframe>
      <?php   } ?>

    </body>
</html>
