<?php
$serv="localhost";
$un="root";
$pass="";
$db="votingsystem";

$con=mysqli_connect($serv,$un,$pass,$db);

if($con)
{
    echo"Connection sucess";
}
?>