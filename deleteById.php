<?php 
include "db.php"; 

$id = $_GET['id']; 

mysqli_query($con,"DELETE FROM file where id = '$id'"); 

header("Location: delete.php"); 




