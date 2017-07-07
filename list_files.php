<!DOCTYPE html>   

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
                    <pre> <a href='menu.php' style="text-decoration:none; font:italic 25pt Times;"> Home Page</a> <a style="color:darkblue; font:italic 35pt Times;font-weight:bold;margin-top:0px;text-align:center; text-decoration:none;">  &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;  &nbsp; &nbsp; &nbsp;     <?php echo 'List of All users Files '    ?></a> &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;     <a href='logout.php' style="text-decoration:none; font:italic 25pt Times;"> sign out</pre></a></p>
      
</body>  
</html>  

<?php
session_start();
            $user = $_SESSION['username'];
// Connect to the database
$dbLink = new mysqli('localhost','root', '', 'katuri');
if(mysqli_connect_errno()) {
    die("MySQL connection failed: ". mysqli_connect_error());
}

// Query for a list of all existing files
$sql = 'SELECT `id`, `name`, `mime`, `size`, `created` ,`userid` FROM `file` ';
$result = $dbLink->query($sql);

// Check if it was successfull
if($result) {
    // Make sure there are some files in there
    if($result->num_rows == 0) {
        echo '<p>There are no files in the database</p>';
    }
    else {
        // Print the top of a table
        echo '<table class="table table-bordered">
                <tr>
                    <td><b>File Name</b></td>
                    <td><b>Type</b></td>
                    <td><b>Size</b></td>
                    <td><b>Created</b></td>
                    <td><b>User</b></td>
                    <td><b>&nbsp;</b></td>
                </tr>';

        // Print each file
        while($row = $result->fetch_assoc()) {
            echo "
                <tr>
                    <td>{$row['name']}</td>
                    <td>{$row['mime']}</td>
                    <td>{$row['size']}</td>
                    <td>{$row['created']}</td>
                    <td>{$row['userid']}</td>
                    <td><a href='get_file.php?id={$row['id']}'>View</a></td>
                    <td><a href='comment.php?name={$row['name']}'>Comment</a></td>
                </tr>";
        }

        // Close table
        echo '</table>';
    }

    // Free the result
    $result->free();
}
else
{
    echo 'Error! SQL query failed:';
    echo "<pre>{$dbLink->error}</pre>";
}

// Close the mysql connection
$dbLink->close();
?>