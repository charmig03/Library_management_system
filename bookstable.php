<?php 
require 'includes/snippet.php';
require 'includes/database connect.php';
include "includes/header.php"; 




if(isset($_POST['del'])){

	$id = sanitize(trim($_POST['id']));

	$sql_del = "DELETE from books where BookId = $id"; 
	$error = false;
	$result = mysqli_query($conn,$sql_del);
			if ($result)
			{
			$error = true;
			}
 }
?>


<div class="container">
    <?php include "includes/home.php"; ?>
	<div>

		<span class="glyphicon glyphicon-book"></span>
	    <strong>Books</strong> Table
	</div>


	</div>
	<div class="container">
		<div>
		  <div class="panel-heading">
		  	 <?php if(isset($error)===true) { ?>
        <div class="alert alert-success alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Record Deleted Successfully!</strong>
            </div>
            <?php } ?>
			<br>
			<br>
			<br>
		  	<div class="row">
		  	  <a href="addbook.php" ><button style = "background-color:#B0C4DE;"> Add Book</button></a>
			  <div>
			  </div>
  
			</div>
		  </div>

		  <table class="table table-bordered">
		
	 <thead>
	 <tr>
		 <th>BookId</th>
		 <th>memberName</th>	
			  <th>bookTitle</th>
			  <th>author</th>
			  <th>bookCopies</th>
			  <th>publisherName</th>
			  <th>available</th>
			   <th>Delete</th>
	 </tr>
</thead>

  <?php 

$result1 = mysqli_query($conn,"SELECT * FROM books");
	 $limit = 5;
	 $total_rows = mysqli_num_rows($result1);  
	 $total_pages = ceil ($total_rows / $limit);
	 
	 if (!isset ($_GET['page']) ) { 
	   $page_number = 1;  
	 } else {  
	   $page_number = $_GET['page'];      
	 }    
	 $initial_page = ($page_number-1) * $limit;
  
   $sql = "SELECT * FROM books
		   LIMIT $initial_page,$limit";
if(isset($_POST['search'])){
	
	$text = sanitize(trim($_POST['text']));


	 $sql = "SELECT * FROM books where BookId = $text ";


	 $query = mysqli_query($conn, $sql);

	 

	 while($row=mysqli_fetch_array($query)){ ?>
		<tbody>
			
		<td><?php echo $row['bookId']; ?></td>
		<td><?php echo $row['memberName']; ?></td>
		<td><?php echo $row['bookTitle']; ?></td>
		<td><?php echo $row['author']; ?></td>	
		<td><?php echo $row['bookCopies']; ?></td>
		<td><?php echo $row['publisherName']; ?></td>
		<td><?php echo $row['available']; ?></td>
		<form method='post' action='bookstable.php'>
		<input type='hidden' value="<?php echo $row['bookId']; ?>" name='id'>
		<td><button name='del' type='submit' value='Delete' class='btn btn-warning' onclick='return Delete()'>DELETE</button></td>
		</form>
		</tbody>
	<?php  }
 }
 else{
	$sql2 = "SELECT * from books";

	$query2 = mysqli_query($conn, $sql2); 
	$counter = 1;
	while ($row = mysqli_fetch_array($query2)) { ?>
	<tbody>
		<td><?php echo $counter++; ?></td>
		<td><?php echo $row['memberName']; ?></td>
		<td><?php echo $row['bookTitle']; ?></td>
		<td><?php echo $row['author']; ?></td>	
		<td><?php echo $row['bookCopies']; ?></td>
		<td><?php echo $row['publisherName']; ?></td>
		<td><?php echo $row['available']; ?></td>
		<form method='post' action='bookstable.php'>
		<input type='hidden' value="<?php echo $row['bookId']; ?>" name='id'>
		<td><button name='del' type='submit' value='Delete' class='btn btn-warning' onclick='return Delete()'>DELETE</button></td>
		</form>
		</tbody>
	
<?php 	}
	
 } 

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
        				<p>Are you sure you want to delete this book?</p>
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
</body>
</html>


<?php 
echo "<center><table border=0><tr>";
for($page_number = 1; $page_number<= $total_pages; $page_number++) {
  echo '<a href = "bookstable.php?page=' . $page_number . '"><button>' . $page_number . '</button> </a>';  
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