<?php 
require 'includes/snippet.php';
require 'includes/database connect.php';
include "includes/header.php";


if (isset($_POST['submit'])) {
	
	$name = sanitize(trim($_POST['name']));
	$username = sanitize(trim($_POST['username']));
	$password1 = sanitize(trim($_POST['password1']));
	$password2 = sanitize(trim($_POST['password2']));
	$email = sanitize(trim($_POST['email']));
				 


	if ($password1 == $password2) {
		
	$sql =
	 "INSERT into admin (adminName, password, username, email) values ('$name', '$password1', '$username', '$email')";

	
	
	$query = mysqli_query($conn, $sql);
	$error = false;

	if ($query) {
	$error = true;
	}
	else {
	echo "<script>alert('Admin not added!');
				</script>";	
	}
	}
	else {
		echo  "<script>alert('Password mismatched!')</script>";
	}
}
?>
<div class="container">
<?php include "includes/home.php"; ?>
<div  style="margin-top: 30px">
	<div >
		<?php if(isset($error)) { ?>
	<div class="alert alert-success alert-dismissable">
			  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			  <strong>Record Added </strong>
		</div>
		<?php } ?>
		<bt><br></bt>
		<center>
		<h2 style="text-align: center">ADD ADMIN</h2>

		<div class="container">
			<form class="form-horizontal" role="form" method="post" action="adduser.php">
			<div class="form-group">
					<label for="Name"></label>
					<div>
						<input type="text" name="name" placeholder="Enter Name" id="name" required>
					</div>		
			
				<div class="form-group">
					<label for="Username"></label>
					<div>
						<input type="text" name="username" placeholder="Enter Username" id="username" required>
					</div>		
				
				<div class="form-group">
					<label for="Password"></label>
					<div>
						<input type="password" name="password1" placeholder="Enter Password" id="password" required>
					</div>		
			
				<div class="form-group">
					<label for="Password"></label>
					<div>
						<input type="password"  name="password2" placeholder="Enter Password" id="password" required>
					</div>		
	  <div class="form-group">
		<label for="Password"></label>
		<div>
		  <input type="email" name="email" placeholder="Enter email" id="email" required>
		</div>
	  </div>
				
				<div class="form-group ">
					<div >
						<button type="submit" name="submit">
							Submit
						</button>
						
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
</div>
		</center>
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