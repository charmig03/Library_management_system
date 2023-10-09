<?php
include "includes/header.php";


?>


<div class="container">
    <?php include "includes/home 2.php"; ?>
	<!-- navbar ends -->
	<!-- info alert -->
	<div>
<br><br><br>
	    <button>Borrow Books</button>
	</div>

	</div>

	<div class="container">
		<div>
		<br>
		  <div>
		  	<div>

			  <div>
			  <form method="post" action="borrowedbooks.php" enctype="multipart/form-data">
			  	
			  	</form>
			    
			  </div>
  
			</div>
		  </div>

		  <table class="table table-bordered">
		         <tr> 
					<th>ID</th>
					<th>BOOK</th>
					<th>AVAILABLE</th>
					<th>ISSUE</th>
				  </tr>    
					</thead>
					 <?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "libraryict";

// 	$result1 = mysqli_query($conn,"SELECT * FROM books");
// 	 $limit = 5;
// 	 $total_rows = mysqli_num_rows($result1);  
// 	 $total_pages = ceil ($total_rows / $limit);
	 
// 	 if (!isset ($_GET['page']) ) { 
// 	   $page_number = 1;  
// 	 } else {  
// 	   $page_number = $_GET['page'];      
// 	 }    
// 	 $initial_page = ($page_number-1) * $limit;
  
//    $sql = "SELECT * FROM books
// 		   LIMIT $initial_page,$limit";

	$conn = mysqli_connect($host, $user, $pass, $db);
					$sql = "SELECT * FROM books"; 	
					
					$query = mysqli_query($conn, $sql);
					$counter = 1;
						while($row = mysqli_fetch_array($query)){
							$_SESSION['book_Title'] = $row['bookTitle'];

							
							?>
							<tbody>
							<tr>
							<td><?php echo $counter++; ?></td>
							<td><?php echo $row['bookTitle'];?></td>
							<td><?php echo $row['available']; ?></td>
							
							  
							<td><a href="lend-student.php?bid=<?php echo $row['bookId'] ?>" id="show" class="show-in"><button class="btn btn-success">ISSUE 
	
							</button>
							<input type="hidden" class="book-id" value="<?php echo $row['bookId']; ?>">
							<input type="hidden" class="book-name" value="<?php echo $row['bookTitle']; ?>">
							<input type="hidden" class="purpose" value="show">
							</a></td>
							</tr>
							</tbody>
							<?php }
					
					 ?>
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

        			<!-- body begins here -->
        			<div class="modal-body">
        				<p> you want to delete this book?</p>
        			</div>

        			<!-- button -->
        			<div class="modal-footer ">
        				<button class="col-lg-4 col-sm-4 col-xs-6 col-md-4 btn btn-warning pull-right"  style="margin-left: 10px" class="close" data-dismiss="modal">
        					No
        				</button>&nbsp;
        				<button class="col-lg-4 col-sm-4 col-xs-6 col-md-4 btn btn-success pull-right"  class="close" data-dismiss="modal" data-toggle="modal" data-target="#info">
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
        				<p>Book deleted <span class="glyphicon glyphicon-ok"></span></p>
        			</div>

        		</div>
        	</div>
        </div>
		




<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>	
</body>
</html>

<!-- <?php 
// echo "<center><table border=0><tr>";
// for($page_number = 1; $page_number<= $total_pages; $page_number++) {
//   echo '<a href = "borrow-student.php?page=' . $page_number . '"><button>' . $page_number . '</button> </a>';  
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