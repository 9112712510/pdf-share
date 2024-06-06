<?php



$servername = "localhost";
$username = "root";;
$password = "";
$dbname = "login_register";

 $conn= mysqli_connect($servername,$username,$password,$dbname);

 $sql = "SELECT * FROM upload_pdf_file";
 //$all_ppt = $conn-> query($sql);
 $result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Document</title>
       <link rel="stylesheet" href="new1.css">
</head>
<body>
    <main>
        <?php
//while($row = mysqli_fetch_assoc( $all_ppt)){
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $pptFilePath = $row["pdf_file"];
?>
       <a href="open.php?id=<?php echo $row['id'];?>"><div class="card">
            <div class="image">
           <iframe src="<?php echo $row["pdf_file"];  ?>"  width="300" height="250"></iframe>
            </div>
            
            <div class="caption">
            <p class="ppt_title"><?php echo $row["title"];    ?></p>
                <p class="rate">
                    <i class="fa-regular fa-heart"></i>
                    <i class="fa-solid fa-download"></i>
                    <i class="fa-solid fa-share"></i>
                </p>
               <h1>uploaded by :</h1><p class="ppt_name"><?php echo $row["name"];   ?></p>
               <!-- <p class="ppt_title"><?php echo $row["title"];    ?></p>-->
                <!--<p class="ppt_description"><?php echo $row["description"];    ?></p>-->
            </div>
        </div></a>
        <?php

        }
    }else {
        echo "No PPT files found.";
    }
?>
        </main>
</body>
</html>