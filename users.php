<?php 
require 'includes/snippet.php';
require 'includes/database connect.php';
include "includes/header.php";


$result1 = mysqli_query($conn,"SELECT * FROM admin");
	 $limit = 5;
	 $total_rows = mysqli_num_rows($result1);  
	 $total_pages = ceil ($total_rows / $limit);
	 
	 if (!isset ($_GET['page']) ) { 
	   $page_number = 1;  
	 } else {  
	   $page_number = $_GET['page'];      
	 }    
	 $initial_page = ($page_number-1) * $limit;
  
   $sql = "SELECT * FROM admin
		   LIMIT $initial_page,$limit";

if(isset($_POST['del'])){

	$id = sanitize(trim($_POST['id']));


	$sql_del = "DELETE from admin where adminId = $id"; 
        $error = false;

	$result = mysqli_query($conn,$sql_del);
			if ($result)
			{
		      $error = true;
			}
 }
?>

<div>
    <?php include "includes/home.php"; ?>
	<div>
	</div>
	
	</div>
	<div class="container">
		  <div>
            <?php if(isset($error)===true) { ?>
            <?php } ?>
			<br>
			<br>
			<br>
			<br>

		  	<div class="row">
          <a href="adduser.php"><button align="center"  style = "background-color:#B0C4DE;">Add Admin</button></a>
		  		<div>
			  </div>
			</div>
		  </div>
		  <table class="table table-bordered">
 	<thead><br>
	 <tr>
			  <th>adminId</th>
			  <th>adminName</th>
			  <th>password</th>
			  <th>username</th>
			  <th>email</th>
			   <th>Delete</th>
	 </tr>
	</thead>

		  <?php 
	$sql = "SELECT * from admin";

	$query = mysqli_query($conn, $sql);
    $counter = 1;
	while($row=mysqli_fetch_array($query)){ ?>
	   <tbody>
	   <td> <?php echo $counter++ ?></td>
	   <td> <?php echo $row['adminName']?></td>
	   <td> <?php echo $row['password']?></td>
	   <td> <?php echo $row['username']?></td>	
	   <td> <?php echo $row['email']?></td>
	   <form method='post' action='users.php'>
	   <input type='hidden' value="<?php echo $row['adminId']; ?>" name='id'>
	   <td ><button class="btn btn-warning" name='del' type='submit' value='Delete'  onclick='return Delete()'>DELETE</button></td>
	   </form>
	   </tbody>
	
	<?php } ?>
	
		   </table>
		 
	  </div>	
	</div>

	<div class="mod modal fade" id="popUpWindow">
        	<div>
        		<div class="modal-content">
        			
        			<div>
        				<button type="button" class="close" data-dismiss="modal">&times;</button>
        				<h3> Warning</h3>
        			</div>

        			<div>
        				<button   style="margin-left: 10px" class="close" data-dismiss="modal">
        					No
        				</button>
        				<button class="close" data-dismiss="modal" data-toggle="modal" data-target="#info">
        					Yes
        				</button>
        			</div>
        		</div>
        	</div>
        </div>
   <div class="modal fade" id="info">
        	<div >
        		<div class="modal-content">
        			
        			<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal">&times;</button>
        				<h3 class="modal-title"> Warning</h3>
        			</div>

        			<div class="modal-body">
        				<p>Book deleted</p>
        			</div>

        		</div>
        	</div>
        </div>
        <div class="modal fade" id="update">
        	<div >
        		<div class="modal-content">
        			
        			

        			<div class="modal-body">
        				<form role="form" >
        					<div>
        					   <span class="input-group-addon">ID</span>
        					   <input type="Username" name="id" value="1" contenteditable="disabled">
        						
        					</div><br>
        					<div >
        					   <span>Username</span>
        					   <input type="Username"  name="id" value="1" contenteditable="disabled">
        						
        					</div><br>
        					<div>
        					   <span class="input-group-addon">Password</span>
        					   <input type="Username" name="id" value="1" >
        						
        					</div><br>

        				
        				</form>
        			</div>
        			<div >
        				<button data-target="alert">
        					UPDATE
        				</button>
        			</div>
        		</div>
        	</div>
        </div>


</script>
</body>
</html>

<?php 
echo "<center><table border=0><tr>";
for($page_number = 1; $page_number<= $total_pages; $page_number++) {
  echo '<a href = "users.php?page=' . $page_number . '"><button>' . $page_number . '</button> </a>';  
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