
<!DOCTYPE html>   
<?php
session_start();
$user=$_SESSION['username'];
?>
<html lang="en">   
<head>   
<meta charset="utf-8">   
<title>Main Navigational Menu</title>   
<script src="js/jquery.js"></script>
    <script src="css/bootstrap.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>  
<body> 
    <p style="display:inline;">
        <a style="color:darkblue; font:italic 40pt Times;font-weight:bold;margin-top:0px;text-align:center; text-decoration:none;">
            <pre>    &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;             <?php echo 'welcome  '    .$user;?></a> &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;        <a href='logout.php' style="text-decoration:none; font:italic 25pt Times;"> sign out</pre></a></p>
    
<div class="container">  
<div class="row">  
<div class="span8">  
<ul class="nav nav-pills">      
<li><a href="index.php">upload file</a></li>  
<li><a href="listview.php">View my files </a></li>   
<li><a href="list_files.php">View everyones files</a></li>   
<li><a href="listdownload.php">download</a></li> 
    <li><a href="delete.php">delete</a></li> 
</ul> 
    
</div>  
</div>  
</div>  
</body>  
</html>  
