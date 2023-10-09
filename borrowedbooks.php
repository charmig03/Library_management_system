<?php
require 'includes/database connect.php';
require 'includes/snippet.php';

require 'includes/header.php';

?>


<div class="container">
    <?php include "includes/home.php"; ?>

	<div style="margin-top:70px">

	    <h3>Borrow Books</h3>
	</div>
<br>
	</div>

	<div class="container">
		<div>
		  <div >
		  	<div class="row">

			  <div>
			      <form method="post" action="borrowedbooks.php" enctype="multipart/form-data">
			  		<div>
				      <span>
				        <button class="btn btn-success" name="search">Search</button> 
				      </span>
				      <input type="text" name="text">
			      </div>
			  	</form>
			    
			  </div>


			   <!-- <?php
                        // $conn = mysqli_connect("localhost", "root",  "", "libraryict");
                        // if(isset($_POST['bookId']))
                        // {
                        //     $id = $_POST['bookId'];
                        //     $query = "SELECT * FROM books WHERE bookId ='$id'";
                        //     $query_run = mysqli_query($conn, $query);

                        ?>  -->
			</div>
		  </div>

		  <table class="table table-bordered">
		  <thead>
					<tr> 
					<th>ID</th>
					<th>Book Name</th>
					 <th>Member Name</th>
				  </tr>    
					</thead>
					 <?php



					$sql = "SELECT * FROM borrow"; 	



					$result1 = mysqli_query($conn,"SELECT * FROM borrow");
                    $limit = 10;
                    $total_rows = mysqli_num_rows($result1);  
                    $total_pages = ceil ($total_rows / $limit);
                    
                    if (!isset ($_GET['page']) ) { 
                      $page_number = 1;  
                    } else {  
                      $page_number = $_GET['page'];      
                    }    
                    $initial_page = ($page_number-1) * $limit;
                 
                  $sql = "SELECT * FROM borrow
                          LIMIT $initial_page,$limit";



					
					$query = mysqli_query($conn, $sql);
					$counter =1;
						while($row = mysqli_fetch_array($query)){
							
							?>
							<tbody>
							<tr>
							<td><?php echo $counter++; ?></td>
							<td><?php echo $row['bookName'];?></td>
							 <td><?php echo $row['memberName']; ?></td>
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
        			
        			<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal">&times;</button>
        				<h3 class="modal-title"> Warning</h3>
        			</div>

        			<div class="modal-body">
        				<p>Are you sure you want to delete this book?</p>
        			</div>

        			<!-- button -->
        			<div class="modal-footer ">
        				<button style="margin-left: 10px" class="close" data-dismiss="modal">
        					No
        				</button>&nbsp;
        				<button  class="close" data-dismiss="modal" data-toggle="modal" data-target="#info">
        					Yes
        				</button>
        			</div>
        		</div>
        	</div>
        </div>
        <div class="modal fade" id="info">
        	<div class="modal-dialog">
        		<div class="modal-content">
        			
        			<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal">&times;</button>
        				<h3 class="modal-title"> Warning</h3>
        			</div>

        			<div class="modal-body">
        				<p>Book deleted <span class="glyphicon glyphicon-ok"></span></p>
        			</div>

        		</div>
        	</div>
        </div>
		
</body>
</html>

<?php 
echo "<center><table border=0><tr>";
for($page_number = 1; $page_number<= $total_pages; $page_number++) {
  echo '<a href = "borrowedbooks.php?page=' . $page_number . '"><button>' . $page_number . '</button> </a>';  
}

echo "<tr></table></center>";
?>

<style>
body {

  
  background-image: url("./images/32.jpg");


  
    background-size: cover;
    
    
    
    height: 100vh;
    padding:0;
    margin:0;

}
</style>