<!DOCTYPE html>
<html lang="en">   
<head>   
<meta charset="utf-8">   
<title>Commenta page</title>   
<script src="js/jquery.js"></script>
    <script src="css/bootstrap.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>  
<body> 
    <p style="display:inline;">
                    <pre> <a href='list_files.php' style="text-decoration:none; font:italic 25pt Times;"> back</a> <a style="color:darkblue; font:italic 35pt Times;font-weight:bold;margin-top:0px;text-align:center; text-decoration:none;">  &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;     <?php echo 'Comments page '    ?></a> &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;     <a href='logout.php' style="text-decoration:none; font:italic 25pt Times;"> sign out</pre></a></p>
      
</body>  
</html>  
<?php
session_start();
	$user=$_SESSION['username'];
// Make sure an ID was passed
if(isset($_GET['name'])) {
    // Get the ID
    $name= $_GET['name'];
    // Make sure the ID is in fact a valid ID
        // Connect to the database
        $dbLink = new mysqli('localhost', 'root', '', 'katuri');
        if(mysqli_connect_errno()) {
            die("MySQL connection failed: ". mysqli_connect_error());
        }

        // Fetch the file information
        $query = "
            SELECT `id`, `name`, `mime`, `size`, `created` ,`userid`
            FROM `file`
            WHERE name = '{$name}'";
        $result = $dbLink->query($query);

        if($result) {
            // Make sure the result is valid
           
		// Make sure there are some files in there
		if($result->num_rows == 0) {
        echo '<p>There are no files in the database</p>';
			}
		else {
        // Print the top of a table
		      
        echo " 		
		<form action='getcomment.php' method='post'>
		      <table width='100%'>
                <tr>
                    <td><b>Name</b></td>
                    <td><b>Mime</b></td>
                    <td><b>Size (bytes)</b></td>
                    <td><b>Created</b></td>
					<td><b>User</b></td>
                    <td><b>&nbsp;</b></td>
				   
                </tr>";

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
					</a>
                </tr>
				
				
				";
				
        }
		echo '</table>';
		echo "<h2> Add comments to the file </h2>";
		
		echo "<textarea name='textval' rows='8' cols='20' style='margin: 0px; width: 367px; height: 178px;'> </textarea>";
			 echo "<br>";
			 echo "<input type='hidden' name='name' value='$name' ></input>
			 <input type='hidden' name='user' value={$user}></input>
			 
			 <button>Submit</button>
				</form>";

        // Close table
        
    }
	$query2 = "
            SELECT `user`, `text`,`time`
            FROM `comments`
            WHERE name = '{$name}'";
        $result2 = $dbLink->query($query2);

        if($result2) {
            // Make sure the result is valid
           
		// Make sure there are some files in there
		if($result2->num_rows == 0) {
        echo '<p>No comments yet. Be the first to comment :) </p>
		      <a href="menu.php">Click here to go to home page</a> ';
			}
			else
			{
				echo "<table width='100%'>
                <tr>
                    <td><b>Username</b></td>
                    <td><b>Comments</b></td>	
					<td><b>Time</b></td>	
                </tr>";
				while($row = $result2->fetch_assoc()) {
				echo "
                <tr>
                    <td>{$row['user']}</td>
                    <td>{$row['text']}</td>
					<td>{$row['time']}</td>
					</a>
                </tr>
				
				
				";
				
				}
			echo '</table>';
			echo "<a href='menu.php'>Click here to go to home</a>";
			}
		}
	
	
            // Free the mysqli resources
            @mysqli_free_result($result);
        }
        else {
            echo "Error! Query failed: <pre>{$dbLink->error}</pre>";
        }
        @mysqli_close($dbLink);
    
}
?>
<link rel="stylesheet" href="style.css" />
