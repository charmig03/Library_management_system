s<?php 
require 'includes/snippet.php';
	require 'includes/database connect.php';
include "includes/header.php"; 





	if (isset($_POST['submit'])) {
		$id = trim($_POST['del_btn']);
		$sql = "DELETE from students where studentId = '$id' ";
		$query = mysqli_query($conn, $sql);


		if ($query) {
			echo "<script>alert('Student Deleted!')</script>";
		}
	}

?>


<div class="container">
    <?php include "includes/home.php"; ?>
	<div>
		<br><br><br>
	</div>
	</div >
	<div class="container col-lg-11 ">
		<div class="container">
		  <div class="panel-heading">
		  	<div class="row">
		  	  <a href="addstudent.php"><button style = "background-color:#B0C4DE;"> Add Student</button></a>
			  <div>    
			  </div>
  
			</div>
		  </div>
		  <table class="table table-bordered">
		          <thead>
		               <tr>
		               	  <th>ID</th> 
		                  <th>Student Name</th>
		                  <th>Email</th>
		                
		                  <th>Username</th>
		                  <th>Password</th>
		                  <th>Status</th>
		                </tr>    
		          </thead>    
		          <?php 


// $result1 = mysqli_query($conn,"SELECT * FROM students");
// 		$limit = 10;
// 		$total_rows = mysqli_num_rows($result1);  
// 		$total_pages = ceil ($total_rows / $limit);
		
// 		if (!isset ($_GET['page']) ) { 
// 		  $page_number = 1;  
// 		} else {  
// 		  $page_number = $_GET['page'];      
// 		}    
// 		$initial_page = ($page_number-1) * $limit;
	 
// 	  $sql = "SELECT * FROM students
// 			  LIMIT $initial_page,$limit";

		          $sql = "SELECT * FROM students";
		          $query = mysqli_query($conn, $sql);
		          $counter = 1;
		          while ( $row = mysqli_fetch_assoc($query)) {        	
		           ?>
		          <tbody> 
		            <tr> 
		             <td><?php echo $counter++; ?></td>
		             <td><?php echo $row['name']; ?></td>
		             <td><?php echo $row['email']; ?></td>
		               
		             <td><?php echo $row['username']; ?></td>
		             <td><?php echo $row['password']; ?></td>
		             <td>
		             	<form action="viewstudents.php" method="post">
		             	<input type="hidden" value="<?php echo $row['studentId']; ?>" name="del_btn">
		             <button name="submit" class="btn btn-warning">DELETE</button>
		             </form> 
		         </td>
		            </tr> 
		           
		         </tbody> 
		         <?php } ?>
		   </table>
		 
	  </div>
	</div>
	<div class="mod modal fade" id="popUpWindow">
        	<div class="modal-dialog">
        		<div class="modal-content">
        			
        			<!-- header begins here -->
        			<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal">&times;</button>
        				<h3 class="modal-title"> Warning</h3>
        			</div>

        			
        			<div class="modal-body">
        				<p>Are you sure?</p>
        			</div>

        
        			<div class="modal-footer ">
        				<button   style="margin-left: 10px" class="close" data-dismiss="modal">
        					No
        				</button>&nbsp;
        				<button   class="close" data-dismiss="modal" data-toggle="modal" data-target="#info">
        					Yes
        				</button>
        			</div>
        		</div>
        	</div>
        </div>
        <div class="modal fade" id="info">
        	<div class="modal-dialog">
        		<div class="modal-content">
        			
        			<!-- header begins here -->
        			<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal">&times;</button>
        				<h3 class="modal-title"> Warning</h3>
        			</div>

        			<!-- body begins here -->
        			<div class="modal-body">
        				<p>Member deleted</p>
        			</div>

        		</div>
        	</div>
        </div>
</body>
</html>

<!-- <?php 
// echo "<center><table border=0><tr>";
// for($page_number = 1; $page_number<= $total_pages; $page_number++) {
//   echo '<a href = "viewstudents.php?page=' . $page_number . '"><button>' . $page_number . '</button> </a>';  
// }

// echo "<tr></table></center>";
?> -->


<style>
body {

  
  background-image: url("./images/32.jpg");


  
    background-size: cover;
    
    
    
    height: 100vh;
    padding:0;
    margin:0;

}
</style>