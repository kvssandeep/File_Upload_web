<?php

var_dump($_POST) ;	
	
// Make sure an ID was passed
if(isset($_POST['user']) && isset($_POST['name']) && isset($_POST['textval'])){
    // Get the ID
	$user= $_POST['user'];
	$name=$_POST['name'];
	$text=$_POST['textval'];
	
    // Make sure the ID is in fact a valid ID
    
     {
        // Connect to the database
        $dbLink = new mysqli('localhost', 'root', '', 'katuri');
        if(mysqli_connect_errno()) {
            die("MySQL connection failed: ". mysqli_connect_error());
        }

        // Fetch the file information
        $query = "insert into `comments`(`user`,`name`,`text`,`time`)
            values ('{$user}','{$name}','{$text}',NOW())";
			
			
        $result = $dbLink->query($query);

        if($result) {
            // Make sure the result is valid
           echo "Sucessfully added the comments!!";
            // Free the mysqli resources
			header("Location: comment.php?name={$name}");
			
            }
        else {
            echo "Error! Query failed: <pre>{$dbLink->error}</pre>";
        }
        @mysqli_close($dbLink);
    }
	
}
else {
    echo 'Error! No ID was passed.';
}
?>