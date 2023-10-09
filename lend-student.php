<?php 
require_once 'includes/database connect.php';
include "includes/header.php"; 


$name = '';
if(isset($_POST['submit'])){
	$name = trim($_POST['member']);
	$bid = trim($_GET['bid']);
	$bname = trim($_POST['bookname']);
	echo $bname;
	// exit(0);
	$bdate = $_POST['borrowDate'];
	$due = $_POST['dueDate'];

	$bqry = mysqli_query($conn,"SELECT * FROM books where bookId = $bid ");
	$bdata = mysqli_fetch_array($bqry);

	$sql = "INSERT INTO borrow (memberName, bookName, borrowDate, returnDate, bookId, borrowStatus) values('".$name."','".$bname."', '$bdate', '$due', $bid, 1)";
	// $result = $conn->query($sql);
	// $row = $result->fetch_assoc();
	$error = false;
	if($conn->query($sql) === TRUE){
		$error = true;
	}
	else {
		echo "
		<script>
		alert('Unsuccessful');
		</script>";
	}

}
	
?>

<h2>aaaaaa</h2>
<div class="container">
    <?php include "includes/home 2.php"; ?>
	<div class="container  col-lg-9 col-md-11 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-1 col-sm-offset-0 col-xs-offset-0  ">
		<div>
			 <?php if(isset($error)===true) { ?>
        <div class="alert alert-success alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Record Added Successfully!</strong>
            </div>
            <?php } ?>
			<p class="page-header" style="text-align: center"></p>

			<div>
				<form class="form-horizontal" role="form" action="#" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="Book Title" class="col-sm-2 control-label">BOOK TITLE</label>
						<div>
							<select name="bookname">
								<option>SELECT BOOK</option>
								<?php 
								$sql = "SELECT * FROM books";
								$query = mysqli_query($conn, $sql);
								while ($row = mysqli_fetch_assoc($query)) { ?>
                                <option value="<?php echo $row['bookTitle'] ?>" <?php echo isset($_GET['bid']) && $_GET['bid'] == $row['bookId'] ? "selected" : "" ?>><?php echo $row['bookTitle']; ?></option>
                                <?php	} ?>
								 ?>

							</select>
						</div>		
					</div>
					<div class="form-group">
						<label for="Book Title" class="col-sm-2 control-label">MEMBER NAME</label>
						<div>
							<input type="text" name="member" id="bookTitle">
						</div>		
					</div>		
					</div>
					<div class="form-group">
						<label for="Borrow Date" class="col-sm-2 control-label">BORROW DATE</label>
						<div>
             			 <input type="date"  name="borrowDate" id="brand">
						</div>		
					</div>
					<div class="form-group">
						<label for="Password" class="col-sm-2 control-label">RETURN DATE</label>
						<div  id="show_product">
              			<input type='date'  name='dueDate'>
						</div>		
					</div>
					

					
					<div>
						<div>
							<button align="center"; type="submit" name="submit">
								Submit
							</button>
							
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	
</div>


 <script>  
 $(document).ready(function(){  
      $('#brand').change(function(){  
           var brand_id = $(this).val();  
           $.ajax({
                url:"load_data.php",  
                method:"POST",  
                data:{brand_id:brand_id},  
                success:function(data){  
                     $('#show_product').html(data);  
                }  
           });  
      });  
 });  
 </script>
</body>
</html>

<style>
body {

  
  background-image: url("./images/33.jpg");


  
    background-size: cover;
    
    
    
    height: 100vh;
    padding:0;
    margin:0;

}
</style>