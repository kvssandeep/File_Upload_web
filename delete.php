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
                    <pre> <a href='menu.php' style="text-decoration:none; font:italic 25pt Times;"> Home Page</a> <a style="color:darkblue; font:italic 35pt Times;font-weight:bold;margin-top:0px;text-align:center; text-decoration:none;">  &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;     <?php echo 'List of My Files '    ?></a> &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;     <a href='logout.php' style="text-decoration:none; font:italic 25pt Times;"> sign out</pre></a></p>
      
</body>  
</html>  


		<?php include "db.php" ?>
		<table class="table table-bordered">
              <thead>
                <tr>
                  <th width="100px"> No</th>
				  <th>File Name</th>
                  <th>Type</th>
                  <th>Size</th>
               	  <th> Created </th>
                </tr>
              </thead>
             
			  <?php
            session_start();
            $user = $_SESSION['username'];
			    $no=1;
				$result = "SELECT * FROM file where userid='{$user}' ORDER BY id  ASC";
                $query = mysqli_query($con,$result);
				while($data = $query->fetch_object() ):
			  ?>
                <tr>
				  <td><?php echo $no;?></td>
                  <td><?php echo $data->name ?></td>
                  <td><?php echo $data->mime ?></td>
                    <td><?php echo $data->size ?></td>
				  <td><?php echo $data->created?></td>
				  <td>
                      <a href="deleteById.php?id=<?php echo $data->id ?> ">
				<button class="btn btn-danger" title="Click here to erase file."> Delete </button>
					</a>
					

				  </td>
                </tr>
			  <?php
				$no++;
				endwhile;
			  ?>
              </tbody>
		</table>
</div>	
</div>
</body>
</html>
