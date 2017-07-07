<!DOCTYPE html>
<?php
session_start();
$user=$_SESSION['username'];
?>
<html>
<head>
    <title>Upload File</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" >
    <script src="js/jquery.js"></script>
    <script src="css/bootstrap.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    
</head>
<body>
 
    <p style="display:inline;">
                    <pre> <a href='menu.php' style="text-decoration:none; font:italic 25pt Times;"> Home Page</a> <a style="color:darkblue; font:italic 35pt Times;font-weight:bold;margin-top:0px;text-align:center; text-decoration:none;">  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;     <?php echo 'Upload Files '    ?></a> &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;     <a href='logout.php' style="text-decoration:none; font:italic 25pt Times;"> sign out</pre></a></p>
        
    <form action="add_file.php" method="post" enctype="multipart/form-data">
        <input type="file" name="uploaded_file"><br><br>
        <input type="submit" value="Upload file">
    </form>
    
</body>
</html>