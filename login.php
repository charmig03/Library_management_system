<?php
session_start(); 


require 'includes/snippet.php';
require 'includes/database connect.php';
include "includes/header.php";


if(isset($_POST['submit'])){
	$username = sanitize(trim($_POST['username']));
	$password = sanitize(trim($_POST['password']));

	$sql_admin = "SELECT * from admin where username = '$username' and  password = '$password' ";
	$query = mysqli_query($conn, $sql_admin);
	if(mysqli_num_rows($query) > 0){
			
				while($row = mysqli_fetch_assoc($query)){
					$_SESSION['auth'] = true;
					$_SESSION['admin'] = $row['username'];		
					}
					if ($_SESSION['auth'] === true) {
				header("Location: admin.php");
				exit();
					}
	}
		
		else{
			$sql_stud = "SELECT * from students where username='$username' and password = '$password'";
				$query = mysqli_query($conn, $sql_stud);
				$row = mysqli_fetch_assoc($query);
				if(mysqli_num_rows($query) > 0){
					$_SESSION['student-username'] = $row['username'];
					$_SESSION['student-name'] = $row['name'];
						header("Location:studentportal.php");		
					}
	
			}

}
?>

<br>
<br>
<br>
<br>
<br>
<center>
<h2 style = "color:white;">LIBRARY MANAGEMENT SYSTEM </h2>
			<h2 style = "color:white;">LOGIN</h2>

			
				<form  role="form" method="post" action="login.php">
					
					<div class="form-group" >
						<label for="Username"></label>
							<input type="text"  name="username" placeholder="Username" id="username" required>
						</div>		
					</div>
					<div class="form-group" >
						<label for="Password"></label>
							<input type="password" name="password" placeholder="Password" id="password" required>
						</div>
		
					<div align="center";><button><a href="EmailOTP.php">forgot Password</a></div><br><br>
					<div align="center"; class="form-group">
							<input type="submit" name="submit" value="Submit">
								
							
						</div>
					</div>
		</div>
	</div>
	
</div>
</center>				 
</body>
</html>
<style>
	body{
		background-image: url('./images/photo.avif');
		background-repeat: no-repeat;
		background-size:cover;
		position: relative;
	}
</style>