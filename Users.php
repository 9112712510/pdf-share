<?php

session_start();
if(!isset($_SESSION['AdminLoginId'])){
    header("location: adminlog.php");
}
@include 'conn.php';
?>

<?php
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($conn,"DELETE FROM upload_pdf_file WHERE id = $id");
    header('location: Adminpanel.php');
};


?>


<!DOCTYPE html>
<html class="a">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="sttyl.css">
    <title>Admin panel</title>
</head>
<body>
    

     <?php 
     
     if(isset($message)){
         foreach($message as $message){
             echo '<span class="message">'.$message.'</span>';
         }
     }
     ?>


    <?php
    $select = mysqli_query($conn,"SELECT * FROM upload_pdf_file");
        $row=mysqli_fetch_assoc($select);
        $_SESSION['row']=$row['row'];
    
    
    ?>

    <div class="candidate-display">

    <table class="candidate-display-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>PDF Name</th>
                <th>Description</th>
                <th colspan="2">action</th>
            </tr>
        </thead>

        <?php
        while($row = mysqli_fetch_assoc($select)){

        ?>

             <tr>  
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['title'];?></td>
                <td><?php echo $row['description'];?></td>
                <td><?php echo $row['pdf_file'];?></td>

                <td>
                <a href="adminupdate.php?edit=<?php echo $row['id'];?>" class="btn"> <i class="fas fa-edit"></i>view</a>
                <a href="Adminpanel.php?delete=<?php echo $row['id'];?>" class="btn"> <i class="fas fa-trash"></i>delete</a>
                </td>
            </tr>

            <?php }; ?>



    </table>

    </div>


    </div>

</body>
</html>